<?php

namespace App\Http\Controllers\FrontendApi;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return response()->json(
            [
                'code' => 200,
                'success' => true,
                'count' => $posts->count(),
                'posts' => $posts,
                'data' => 'Your all Posts',
            ],
            200,
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'media_category_id' => 'required|exists:media_categories,id',
            'status' => 'required|min:1|max:3',
            'description' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'code' => 422,
                    'success' => false,
                    'error' => $validator->errors(),
                    'data' => 'Validation errors',
                ],
                422,
            );
        }

        $files = $request->file('images');
        $images = '';

        foreach ($files as $file) {
            $imageName = uniqid() . '_' . $file->getClientOriginalName();
            $images .= $imageName . ',';
            $file->move(public_path() . '/img/posts', $imageName);
        }

        $images = trim($images, ',');

        $featureFile = $request->file('featured_image');
        $featuredImage = uniqid() . '_' . $featureFile->getClientOriginalName();
        $featureFile->move(public_path() . '/img/posts', $featuredImage);

        $post = new Post();
        $post->title = $request->title;
        $post->media_category_id = $request->media_category_id;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->featured_image = $featuredImage;
        $post->images = $images;
        $post->save();

        return response()->json(
            [
                'code' => 201,
                'success' => true,
                'data' => 'Post created Successfully',
            ],
            201,
        );
    }

    public function show($id)
    {
        // $image = PostImage::where('post_id',$id)->get('image');

        $post = Post::find($id)->load('postImages');

        if ($post) {
            return response()->json(
                [
                    'code' => 200,
                    'success' => true,
                    'post' => $post,
                    // 'images'=> $image,
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'code' => 404,
                    'success' => false,
                    'data' => 'Post not found',
                ],
                404,
            );
        }
    }

    public function getPostbyMedia($id)
    {
        $posts = Post::where('media_category_id', $id)->get();

        if ($posts->count() > 0) {
            return response()->json(
                [
                    'code' => 200,
                    'success' => true,
                    'count' => $posts->count(),
                    'post' => $posts,
                    'data' => 'Your all post of MediaCategory id ' . $id,
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'code' => 404,
                    'success' => false,
                    'data' => 'Post not found for MediaCategory id ' . $id,
                ],
                404,
            );
        }
    }
    public function PostbyMediaName($name)
    {
        $posts = Post::whereHas('mediaCategory', function ($query) use ($name) {
            $query->where('name', $name);
        })->get();

        return response()->json(
            [
                'code' => 200,
                'success' => true,
                'count' => $posts->count(),
                'post' => $posts,
                'data' => 'Your all post of MediaCategory name ' . $name,
            ],
            200,
        );
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'media_category_id' => 'required|exists:media_categories,id',
            'status' => 'required|min:1|max:3',
            'description' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'code' => 422,
                    'success' => false,
                    'errors' => $validator->errors(),
                    'data' => 'Validation errors',
                ],
                422,
            );
        }

        $post = Post::findorFail($id);

        if ($request->hasFile('featured_image')) {
            $featureFile = $request->file('featured_image');
            $featuredImage = uniqid() . '_' . $featureFile->getClientOriginalName();
            $featureFile->move(public_path() . '/img/posts', $featuredImage);
            $post->featured_image = $featuredImage;
        }

        if ($request->hasFile('images')) {
            $images = '';
            foreach ($request->file('images') as $file) {
                $imageName = uniqid() . '_' . $file->getClientOriginalName();
                $images .= $imageName . ',';
                $file->move(public_path() . '/img/posts', $imageName);
            }
            $images = trim($images, ',');
            $post->images = $images;
        }

        $post->title = $request->title;
        $post->media_category_id = $request->media_category_id;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->save();

        return response()->json(
            [
                'code' => 201,
                'success' => true,
                'post' => $post,
                'data' => 'Post created successfully',
            ],
            201,
        );
    }

    public function destroy($id)
    {
        $post = Post::findorFail($id);
        if ($post) {
            $post->delete();
            return response()->json(
                [
                    'code' => 200,
                    'success' => true,
                    'data' => 'Post deleted successfully',
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'code' => 404,
                    'success' => false,
                    'data' => 'Post not found',
                ],
                404,
            );
        }
    }
}
