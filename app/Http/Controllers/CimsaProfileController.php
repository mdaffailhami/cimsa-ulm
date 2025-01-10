<?php

namespace App\Http\Controllers;

use App\Http\Resources\CimsaProfileResource;
use App\Http\Resources\SocialMediaResource;
use App\Models\CimsaProfile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class CimsaProfileController extends Controller
{
    public function api()
    {
        return response()->json(
            [
                "profile" => CimsaProfileResource::collection(CimsaProfile::all()),
                "social_media" => SocialMediaResource::collection(SocialMedia::all())
            ]
        );
    }
}
