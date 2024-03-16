<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getAll() {
        $comments = new Comment();
        $data = $comments->with('posts')->get();

        return response()->json(
            [
                'status'=> 200,
                'message'=> 'Successfully get all comments!',
                'data'=> $data
            ], 200
        );
    }
}
