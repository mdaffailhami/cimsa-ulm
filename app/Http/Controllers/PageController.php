<?php

namespace App\Http\Controllers;

use App\Http\Resources\Page\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function api($uri)
    {
        $page = Page::whereUri($uri);
        $data = new PageResource($page);

        return response()->json($data);
    }
}
