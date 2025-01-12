<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostDetailResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function api(Request $request)
    {

        $pagination_limit = $request->limit ? (int)$request->limit : 3;

        if ($request->category) {
            $posts = Post::whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->category);
            })->paginate($pagination_limit);
        } else {
            $posts = Post::paginate($pagination_limit);
        }

        return response()->json([
            "data" => PostResource::collection($posts),
            "pagination" => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'next_page_url' => $posts->nextPageUrl(),
                'prev_page_url' => $posts->previousPageUrl(),
            ]
        ]);
    }

    public function apiDetail($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return response()->json([
            "data" => new PostDetailResource($post)
        ]);
    }
}
