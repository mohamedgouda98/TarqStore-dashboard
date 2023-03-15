<?php

namespace App\Http\Interfaces;

interface BlogInterface
{
    public function index($blogDataTable);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
