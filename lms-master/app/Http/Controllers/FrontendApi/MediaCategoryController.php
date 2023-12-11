<?php

namespace App\Http\Controllers\FrontendApi;

use Illuminate\Http\Request;
use App\Models\MediaCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MediaCategoryController extends Controller
{
    public function index()
    {
        $categories = MediaCategory::get();
        // $categories = MediaCategory::get()->load('posts');

        return response()->json(
            [
                'code' => 200,
                'success' => true,
                'categories' => $categories,
                'data' => 'Get All Media Categories',
            ],
            200,
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'code' => 422,
                    'success' => false,
                    'error' => $validator->errors(),
                    'message' => 'Media Category created fail',
                ],
                422,
            );
        }

        $category = new MediaCategory();
        $category->name = $request->name;
        $category->save();
        return response()->json(
            [
                'code' => 201,
                'success' => true,
                'category' => $category,
                'data' => 'Media Category create successfully',
            ],
            201,
        );
    }

    public function show($id)
    {
        $category = MediaCategory::findOrFail($id);
        return response()->json(
            [
                'code' => 200,
                'success' => true,
                'category' => $category,
            ],
            200,
        );
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'code' => 422,
                    'success' => false,
                    'error' => $validator->errors(),
                    'message' => 'Media Category updated fail',
                ],
                422,
            );
        }

        $category = MediaCategory::find($id);
        $category->name = $request->name;
        $category->save();
        return response()->json(
            [
                'code' => 200,
                'success' => true,
                'category' => $category,
                'data' => 'Media Category updated successfully',
            ],
            200,
        );
    }

    public function destroy($id)
    {
        $category = MediaCategory::find($id);
        $category->delete();
        return response()->json(
            [
                'code' => 200,
                'success' => true,
                'data' => 'Category delete successfully',
            ],
            200,
        );
    }
}
