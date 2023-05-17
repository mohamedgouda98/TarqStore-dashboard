<?php

namespace App\Http\Interfaces;

interface ProductInterface
{
    public function index($ProductsDataTable);
    public function show($id);
    public function import();
    public function importSheet($request);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
