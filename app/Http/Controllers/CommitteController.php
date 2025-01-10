<?php

namespace App\Http\Controllers;

use App\Http\Resources\Committe\CommitteDetailResource;
use App\Http\Resources\Committe\CommitteResource;
use App\Models\Committe;
use Illuminate\Http\Request;

class CommitteController extends Controller
{
    public function api()
    {
        $committes = Committe::all();

        return response()->json([
            "data" => CommitteResource::collection($committes)
        ]);
    }

    public function api_detail($name)
    {
        $committe = Committe::where('name', $name)->first();

        return response()->json([
            "data" => new CommitteDetailResource($committe)
        ]);
    }
}
