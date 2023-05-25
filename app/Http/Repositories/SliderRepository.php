<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\SliderInterface;
use App\Http\Trait\ImageUploader;
use App\Models\Product;
use App\Models\Slider;

class SliderRepository implements SliderInterface
{
    use ImageUploader;
    public function create()
    {
        return view('Sliders.create');
    }

    public function store($request)
    {
        $image = $this->uploadImage($request->file('image'), 'sliders');
        Slider::create([
            'image' => $image,
            'url' => $request->url,
            'position' => $request->position,
            'model' => $request->model,
            'model_id' => $request->model_id,
        ]);
    }

    public function getModelData($model)
    {
        $model = "App\\Models\\" . $model;
        return $model::get(['id', 'name']);
    }
}
