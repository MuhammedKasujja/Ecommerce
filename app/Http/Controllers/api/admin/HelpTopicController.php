<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\HelpTopic;
use Illuminate\Http\Request;

class HelpTopicController extends Controller
{
    public function add_new()
    {

        return view('admin-views.help-topics.add-new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer'   => 'required',
        ], [
            'question.required' => 'Question name is required!',
            'answer.required'   => 'Question answer is required!',

        ]);
        $helps = new HelpTopic;
        $helps->question = $request->question;
        $helps->answer = $request->answer;
        $helps->save();

        return $this->sendResponse(message: 'FAQ added successfully!');
    }
    public function status($id)
    {

        $helps = HelpTopic::findOrFail($id);
        if ($helps->status == 1) {
            $helps->update(["status" => 0]);
        } else {
            $helps->update(["status" => 1]);
        }
        return $this->sendResponse(message: 'Status Change');
    }
    public function edit($id)
    {
        $helps = HelpTopic::findOrFail($id);
        return $this->sendResponse(payload: $helps);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer'   => 'required',
        ], [
            'question.required' => 'Question name is required!',
            'answer.required'   => 'Question answer is required!',

        ]);
        $helps = HelpTopic::find($id);
        $helps->question = $request->question;
        $helps->answer = $request->answer;
        $helps->ranking = $request->ranking;
        $helps->update();
        return $this->sendResponse(message: 'FAQ Update successfully!');
    }

    function list()
    {
        $helps = HelpTopic::latest()->get();
        return $this->sendResponse(payload: $helps);
    }

    public function destroy(Request $request)
    {

        $helps = HelpTopic::find($request->id);
        $helps->delete();
        return $this->sendResponse(message: 'Help topic deleted');
    }
}
