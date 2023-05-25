<?php

namespace App\Http\Interfaces;

interface SliderInterface
{

    public function create();
    public function store($request);
    public function getModelData($model);

}
