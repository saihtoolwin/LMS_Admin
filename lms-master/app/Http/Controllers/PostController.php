<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Models\MediaCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->paginate(10)
            ->load(['mediaCategory', 'postImages']);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $mediacategories = MediaCategory::all();
        return view('post.create', compact('mediacategories'));
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
            return redirect()
                ->route('posts.create')
                ->withErrors($validator)
                ->withInput()
                ->with('success', 'Fail to create post');
        }

        $featureFile = $request->file('featured_image');
        $featuredImage = uniqid() . '_' . $featureFile->getClientOriginalName();
        $featureFile->move(public_path('/img/posts'), $featuredImage);
        $featureFilePath = public_path('/img/posts/') . $featuredImage;
        Image::make($featureFilePath)
            ->resize(500, 300)
            ->save($featureFilePath, 70);
        $base64FeatureImage = base64_encode(file_get_contents($featureFilePath));
        $size = filesize($featureFilePath);
        if ($size > 2000000) {
            return redirect()
                ->route('posts.create')
                ->withInput()
                ->with('error', 'Featured image exceeds 2MB limit');
        }

        $post = new Post();
        $post->title = $request->title;
        $post->media_category_id = $request->media_category_id;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->featured_image = $base64FeatureImage;

        $post->save();

        $files = $request->file('images');
        foreach ($files as $file) {
            $imageName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/img/posts', $imageName);
            $filePath = public_path() . '/img/posts/' . $imageName;

            Image::make($filePath)
                ->resize(500, 300)
                ->save($filePath, 70);
            $base64Image = base64_encode(file_get_contents($filePath));

            $postImage = new PostImage();
            $postImage->post_id = $post->id;
            $postImage->image = $base64Image;
            $postImage->save();
        }

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        $post->load('mediaCategory');
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $post->load('mediaCategory');
        $categories = MediaCategory::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'media_category_id' => 'required|exists:media_categories,id',
            'status' => 'required|min:1|max:3',
            'description' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('posts.edit', $id)
                ->withErrors($validator)
                ->withInput()
                ->with('success', 'Fail to update post');
        }

        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->media_category_id = $request->media_category_id;
        $post->status = $request->status;
        $post->description = $request->description;

        if ($request->hasFile('featured_image')) {
            $oldFeaturedImage = public_path('/img/posts/') . $post->featured_image;
            if (file_exists($oldFeaturedImage)) {
                // unlink($oldFeaturedImage);
                $post->featured_image->delete();
            }

            $featureFile = $request->file('featured_image');
            $featuredImage = uniqid() . '_' . $featureFile->getClientOriginalName();
            $featureFile->move(public_path('/img/posts'), $featuredImage);
            $featureFilePath = public_path('/img/posts/') . $featuredImage;
            Image::make($featureFilePath)
                ->resize(500, 300)
                ->save($featureFilePath, 70);

            $base64FeatureImage = base64_encode(file_get_contents($featureFilePath));
            $size = filesize($featureFilePath);

            if ($size > 2000000) {
                return redirect()
                    ->route('posts.edit', $id)
                    ->withInput()
                    ->with('error', 'Featured image exceeds 2MB limit');
            }

            $post->featured_image = $base64FeatureImage;
        }

        $post->save();

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            PostImage::where('post_id', $post->id)->delete();

            foreach ($files as $file) {
                $imageName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path() . '/img/posts', $imageName);
                $filePath = public_path() . '/img/posts/' . $imageName;

                Image::make($filePath)
                    ->resize(500, 300)
                    ->save($filePath, 70);
                $base64Image = base64_encode(file_get_contents($filePath));

                $postImage = new PostImage();
                $postImage->post_id = $post->id;
                $postImage->image = $base64Image;
                $postImage->save();
            }
        }

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->back()
            ->with('success', 'Post deleted successfully');
    }
}
