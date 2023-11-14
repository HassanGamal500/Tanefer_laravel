<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;

use App\Http\Resources\Admin\SeoResources;
use App\Models\MainPageSeo;
use App\Services\StoreFileService;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class MainSeoPagesController extends Controller
{
    public function index()
    {
        $pages = MainPageSeo::all();

        return response()->json([ 'message' =>'success','status' => 200,'data'=> SeoResources::collection($pages) ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_name' => 'required|min:1|max:500',
            'seo_title' => 'nullable|min:1|max:500',
            'seo_description' => 'nullable|min:1|max:500',
            'featured_image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'slug' => 'nullable|string|max:500|unique:main_page_seos,slug',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        MainPageSeo::create([
            'page_name' => $request->page_name,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'slug' => Str::slug($request->page_name),
            'featured_image' => $request->hasFile('featured_image') ? StoreFileService::SaveFile('seo/'.$request->page_name, $request->featured_image) : null,
        ]);

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function show($id) {
        $page = MainPageSeo::findOrFail($id);
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> new SeoResources( $page )
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'page_name' => 'nullable|min:1|max:500',
            'seo_title' => 'nullable|min:1|max:500',
            'seo_description' => 'nullable|min:1|max:500',
            'featured_image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'slug' => [
                'nullable',
                'string',
                'max:500',
                Rule::unique('main_page_seos', 'slug')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $page = MainPageSeo::findOrFail($id);

        $page->page_name = $request->page_name;
        $page->seo_title = $request->seo_title;
        $page->seo_description = $request->seo_description;
        $page->slug = $request->has('slug') && $request->slug !== $page->slug ? $request->slug : Str::slug($request->page_name);

        if($request->hasFile('featured_image')) {
            $page->featured_image = StoreFileService::SaveFile('seo/'.$request->page_name, $request->featured_image);
        }

        $page->update();

        return response()->json(['message' =>'operation updated successfully', 'status' => 200]);
    }

}
