<?php

namespace App\Http\Interfaces;

interface PermissionInterface
{
    public function index($rolesDataTable);
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
}
