<?php

namespace App\Http\Controllers\api\admin;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Translation;

class BrandController extends Controller
{
    public function add_new()
    {
        $brands = Brand::latest()->paginate(Helpers::pagination_limit());
        return $this->sendResponse(payload: $brands);
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->image = ImageManager::upload('brand/', 'png', $request->file('image'));
        $brand->status = 1;
        $brand->save();

        // foreach ($request->lang as $index => $key) {
        //     if ($request->name[$index] && $key != 'en') {
        //         Translation::updateOrInsert(
        //             [
        //                 'translationable_type'  => 'App\Models\Brand',
        //                 'translationable_id'    => $brand->id,
        //                 'locale'                => $key,
        //                 'key'                   => 'name'
        //             ],
        //             ['value'                 => $request->name[$index]]
        //         );
        //     }
        // }
        return $this->sendResponse(message: 'Brand added successfully!');
    }

    function list(Request $request)
    {
        $query_param = [];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $brands = Brand::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->Where('name', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $brands = new Brand();
        }
        $brands = $brands->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return $this->sendResponse(payload: $brands);
    }

    public function edit($id)
    {
        $brand = Brand::where(['id' => $id])->withoutGlobalScopes()->first();
        return $this->sendResponse(payload: $brand);
    }

    public function update(Request $request, $id)
    {

        $brand = Brand::find($id);
        $brand->name = $request->name[array_search('en', $request->lang)];
        if ($request->has('image')) {
            $brand->image = ImageManager::update('brand/', $brand['image'], 'png', $request->file('image'));
        }
        $brand->save();
        foreach ($request->lang as $index => $key) {
            if ($request->name[$index] && $key != 'en') {
                Translation::updateOrInsert(
                    [
                        'translationable_type' => 'App\Models\Brand',
                        'translationable_id' => $brand->id,
                        'locale' => $key,
                        'key' => 'name'
                    ],
                    ['value' => $request->name[$index]]
                );
            }
        }

        return $this->sendResponse(message: 'Brand updated successfully!');
    }

    public function delete(Request $request)
    {
        $translation = Translation::where('translationable_type', 'App\Models\Brand')
            ->where('translationable_id', $request->id);
        $translation->delete();
        $brand = Brand::find($request->id);
        ImageManager::delete('/brand/' . $brand['image']);
        $brand->delete();
        return $this->sendResponse(message: 'Brand deleted successfully!');
    }
}
