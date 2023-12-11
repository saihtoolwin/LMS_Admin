<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaCategory;
use App\Models\PostImage;
use Illuminate\Support\Facades\Validator;

class MediaCategoryController extends Controller
{
    public function index()
    {
        $categories = MediaCategory::latest()->get();
        // $postImages = PostImage::all();
        return view('media.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:media_categories,name',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mediaCategory = new MediaCategory();
        $mediaCategory->name = $request->name;
        $mediaCategory->save();
        return redirect()
            ->back()
            ->with('success', 'Category created successfully');
    }

    public function show(MediaCategory $mediaCategory, $id)
    {
        $posts = MediaCategory::find($id)->load('posts');
        return view('media.show', compact('posts'));
    }

    public function edit(MediaCategory $mediaCategory, $id)
    {
        $mediaCategory = MediaCategory::find($id);

        return view('media.edit', compact('mediaCategory'));
    }

    public function update(Request $request, MediaCategory $mediaCategory, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:media_categories,name',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mediaCategory = MediaCategory::find($id);
        if (!$mediaCategory) {
            return redirect()
                ->back()
                ->with('error', 'Category not found');
        }

        $mediaCategory->name = $request->name;
        $mediaCategory->save();
        return redirect()
            ->route('mediacategories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(MediaCategory $mediaCategory, $id)
    {
        $mediaCategory = MediaCategory::find($id);
        $mediaCategory->delete();
        return redirect()->back();
    }
}
