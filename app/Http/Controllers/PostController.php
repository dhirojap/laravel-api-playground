<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getAll() {
        $posts = Post::get();

        return response()->json(
            [
                'status'=> 200,
                'message'=> 'Successfully get all posts!',
                'data'=> $posts
            ], 200
        );
    }

    public function getOne(Request $request) {
        $postId = $request->route('postId');
        // $post = DB::table('posts')->where('id', $postId)->get();
        $post = Post::with('comments')->where('id', $postId)->first();

        return response()->json(
            [
                'status'=> 200,
                'message'=> 'Successfully get a post!',
                'data'=> $post
            ], 200
        );
    }

    public function postOne(Request $request) {
        $title = $request->title;
        $description = $request->description;

        DB::table('posts')->insert([
            'title'=> $title,
            'description'=> $description
        ]);

        return response()->json(
            [
                'status'=> 201,
                'message'=> 'Successfully post a post!',
                'data'=> null
            ], 201
        );
    }

    public function updateOne(Request $request) {
        $postId = $request->route('postId');
        $title = $request->title;
        $description = $request->description;

        DB::table('posts')->where('id', $postId)->update([
            'title'=> $title,
            'description'=> $description
        ]);

        return response()->json(
            [
                'status'=> 200,
                'message'=> 'Successfully update a post!',
                'data'=> null
            ], 200
        );
    }

    public function deleteOne(Request $request) {
        $postId = $request->route('postId');

        // DB::table('posts')->where('id', $postId)->delete();
        Post::where('id', $postId)->delete();

        return response()->json(
            [
                'status'=> 200,
                'message'=> 'Successfully delete a post',
                'data'=> null
            ], 200
        );
    }
}
