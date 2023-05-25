<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SliderInterface;
use Illuminate\Http\Request;
use LaravelIdea\BladeLoops\_BladeLoop;

class SliderController extends Controller
{
    public $sliderInterface;

    public function __construct(SliderInterface $sliderInterface)
    {
        $this->sliderInterface = $sliderInterface;
    }

    public function create()
    {
        return $this->sliderInterface->create();
    }

    public function store(Request $request)
    {
        return $this->sliderInterface->store($request);
    }

    public function getModelData($model)
    {
        return $this->sliderInterface->getModelData($model);
    }


}
