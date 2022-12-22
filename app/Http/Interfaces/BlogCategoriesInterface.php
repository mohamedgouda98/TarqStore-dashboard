<?php

namespace App\Http\Interfaces;

interface BlogCategoriesInterface
{
    public function index($blogCategoriesDataTable);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
