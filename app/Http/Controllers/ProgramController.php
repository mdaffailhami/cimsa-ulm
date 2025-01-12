<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function api()
    {
        $programs = Program::all();

        return response()->json([
            'data' => ProgramResource::collection($programs)
        ]);
    }
}
