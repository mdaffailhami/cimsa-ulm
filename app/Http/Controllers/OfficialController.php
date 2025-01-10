<?php

namespace App\Http\Controllers;

use App\Http\Resources\Official\OfficialResource;
use App\Models\Official;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    public function api()
    {
        $officials = Official::all();

        return response()->json([
            'data' => OfficialResource::collection($officials)
        ]);
    }

    public function api_detail() {}
}
