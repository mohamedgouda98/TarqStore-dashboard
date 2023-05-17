<?php

namespace App\Http\Interfaces;

interface SettingsInterface
{
    public function index($settingsDataTable);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
