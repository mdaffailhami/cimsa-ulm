<?php

namespace App\Http\Controllers;

use App\Http\Resources\Training\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function api()
    {
        $trainings = Training::all();

        return response()->json([
            'data' => TrainingResource::collection($trainings)
        ]);
    }
}
