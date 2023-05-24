<?php

namespace App\Http\Interfaces;

interface AdsInterface
{
    public function index($adsDataTable);
    public function create();
    public function store($request);
}
