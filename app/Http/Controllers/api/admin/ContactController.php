<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'mobile_number.required' => 'Mobile Number is Empty!',
            'subject.required' => ' Subject is Empty!',
            'message.required' => 'Message is Empty!',

        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile_number = $request->mobile_number;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return $this->sendResponse(message: 'Message Sent Successfully');
    }

    public function list(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $contacts = Contact::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%")
                        ->orWhere('email', 'like', "%{$value}%")
                        ->orWhere('mobile_number', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $contacts = new Contact();
        }
        $contacts = $contacts->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return $this->sendResponse(payload: $contacts);
    }

    public function view($id)
    {
        $contact = Contact::findOrFail($id);
        return $this->sendResponse(payload: $contact);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->feedback = $request->feedback;
        $contact->seen = 1;
        $contact->update();
        return $this->sendResponse(message: 'Feedback  Update successfully!');
    }

    public function destroy(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->delete();

        return $this->sendResponse(message: 'Data deleted');
    }

    public function send_mail(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $data = array('body' => $request['mail_body']);
        Mail::send('email-templates.customer-message', $data, function ($message) use ($contact, $request) {
            $message->to($contact['email'], BusinessSetting::where(['type' => 'company_name'])->first()->value)
                ->subject($request['subject']);
        });

        Contact::where(['id' => $id])->update([
            'reply' => json_encode([
                'subject' => $request['subject'],
                'body' => $request['mail_body']
            ])
        ]);

        return $this->sendResponse(message: 'Mail sent successfully!');
    }
}
