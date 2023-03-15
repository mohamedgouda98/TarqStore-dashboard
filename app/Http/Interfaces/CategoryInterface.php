<?php

namespace App\Http\Interfaces;

interface CategoryInterface
{
    public function index($categoriesDataTable);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
