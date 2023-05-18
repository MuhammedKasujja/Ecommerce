<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Translation;
use Brian2694\Toastr\Facades\Toastr;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $attributes = Attribute::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->Where('name', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $attributes = new Attribute();
        }
        $attributes = $attributes->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return $this->sendResponse(payload: compact('attributes', 'search'));
    }

    public function store(Request $request)
    {
        $attribute = new Attribute;
        $attribute->name = $request->name[array_search('en', $request->lang)];
        $attribute->save();
        foreach ($request->lang as $index => $key) {
            if ($request->name[$index] && $key != 'en') {
                Translation::updateOrInsert(
                    [
                        'translationable_type' => 'App\Models\Attribute',
                        'translationable_id' => $attribute->id,
                        'locale' => $key,
                        'key' => 'name'
                    ],
                    ['value' => $request->name[$index]]
                );
            }
        }
        Toastr::success('Attribute added successfully!');
        return $this->sendResponse(message: 'Attribute added successfully!');
    }

    public function edit($id)
    {
        $attribute = Attribute::withoutGlobalScope('translate')->where('id', $id)->first();
        return $this->sendResponse(payload: compact('attribute'));
    }

    public function update(Request $request)
    {
        $attribute = Attribute::find($request->id);
        $attribute->name = $request->name[array_search('en', $request->lang)];
        $attribute->save();

        foreach ($request->lang as $index => $key) {
            if ($request->name[$index] && $key != 'en') {
                Translation::updateOrInsert(
                    [
                        'translationable_type' => 'App\Models\Attribute',
                        'translationable_id' => $attribute->id,
                        'locale' => $key,
                        'key' => 'name'
                    ],
                    ['value' => $request->name[$index]]
                );
            }
        }
        Toastr::success('Attribute updated successfully!');
        return $this->sendResponse(message: 'Attribute updated successfully!');
    }

    public function delete(Request $request)
    {
        $translation = Translation::where('translationable_type', 'App\Models\Attribute')
            ->where('translationable_id', $request->id);
        $translation->delete();
        Attribute::destroy($request->id);
        return $this->sendResponse(message: 'Attribute deleted successfully!');
    }

    public function fetch(Request $request)
    {
        $data = Attribute::orderBy('id', 'desc')->get();
        return $this->sendResponse(payload: $data);
    }
}
