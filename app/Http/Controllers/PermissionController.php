<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PermissionInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public $permissionInterface;
    public function __construct(PermissionInterface $permissionInterface)
    {
        $this->permissionInterface = $permissionInterface;
    }

    public function index($blogCategoriesDataTable)
    {
        return $this->permissionInterface->index($blogCategoriesDataTable);
    }

    public function create()
    {
        return $this->permissionInterface->create();
    }

    public function store(Request $request)
    {
        return $this->permissionInterface->store($request);
    }

    public function edit($id)
    {
        return $this->permissionInterface->edit($id);
    }

    public function update( $request)
    {
        return $this->permissionInterface->update($request);
    }

    public function delete( $request)
    {
        return $this->permissionInterface->delete($request);
    }

}
