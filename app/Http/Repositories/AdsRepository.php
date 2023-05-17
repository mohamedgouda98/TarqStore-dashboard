<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\AdsInterface;
use App\Http\Trait\ImageUploader;
use App\Models\Ads;

class AdsRepository implements AdsInterface
{
    use ImageUploader;

    public function create()
    {
        return view('Ads.create');
    }

    public function store($request)
    {
        $imageName = $this->uploadImage($request->file('image'), 'ads');
        Ads::create([
            'image' => $imageName,
            'position' => $request->position,
            'url' => $request->url
        ]);

        return redirect(route('admin.ads.create'));
    }
}
