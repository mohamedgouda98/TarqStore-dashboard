<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\AdsInterface;
use App\Http\Trait\ImageUploader;
use App\Models\Ads;

class AdsRepository implements AdsInterface
{
    use ImageUploader;

    private $adsModel;

    public function __construct(Ads $ads)
       {
           $this->adsModel = $ads;
       }

       public function index($adsDataTable)
       {
        return $adsDataTable->render('ads.index');

       }
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
