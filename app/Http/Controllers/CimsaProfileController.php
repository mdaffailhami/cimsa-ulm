<?php

namespace App\Http\Controllers;

use App\Http\Resources\CimsaProfileResource;
use App\Http\Resources\SocialMediaResource;
use App\Models\CimsaProfile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = CimsaProfile::with('galleries')->get();
        $social_medias = SocialMedia::get();

        return view('pages.admin.cimsa-profile', compact('profiles', 'social_medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            if ($request->data) {
                foreach ($request->data as $profile) {
                    $profile_model = CimsaProfile::findOrFail($profile['id']);

                    if ($profile_model->type === 'text') {
                        $profile_model->text_content = $profile['value'];
                    } else if ($profile_model->type === 'long-text') {
                        $profile_model->long_text_content = $profile['value'];
                    } else if ($profile_model->type === 'image') {
                        $galleries = [$profile['value']]; // turn value into array so it can be processed with syncGalleries method
                        $profile_model->syncGalleries($galleries);
                    } else {
                        $profile_model->syncGalleries($profile['values']);
                    }

                    $profile_model->save();
                }
            }

            if ($request->social_medias) {
                $this->syncSocialMedia($request->social_medias);
            }

            DB::commit();

            // Redirect back
            return back()
                ->with('success', 'Berhasil mengubah profil.');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error updating profile: ' . $th->getMessage());

            return back()->with(['error' => 'Server Internal Error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function syncSocialMedia($social_medias)
    {
        // Optionally, delete social_medias that are no longer in the request
        $soial_media_ids = array_filter(array_column($social_medias, 'id'));
        SocialMedia::whereNotIn('id', $soial_media_ids)->delete();

        foreach ($social_medias as $soial_media) {
            $data = [
                'platform' => $soial_media['platform'],
                'url' => $soial_media['url'],
            ];

            if (!empty($soial_media['id'])) {
                // Update existing activity
                SocialMedia::where('id', $soial_media['id'])->update($data);
            } else {
                // Create new activity
                SocialMedia::create($data);
            }
        }
    }
}
