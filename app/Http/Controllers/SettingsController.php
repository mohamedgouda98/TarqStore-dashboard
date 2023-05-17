<?php

namespace App\Http\Controllers;

use App\DataTables\SettingsDataTable;
use App\Http\Interfaces\SettingsInterface;
use App\Http\Requests\Settings\SettingDeleteRequest;
use App\Http\Requests\Settings\SettingUpdateRequest;
use App\Http\Requests\Settings\SettingCreateRequest;

class SettingsController extends Controller
{
    public $settingsInterface;

    public function __construct(SettingsInterface $settingsInterface)
    {
        $this->settingsInterface = $settingsInterface;
    }

    public function index(SettingsDataTable $blogCategoriesDataTable)
    {
        return $this->settingsInterface->index($blogCategoriesDataTable);
    }

    public function create()
    {
        return $this->settingsInterface->create();
    }

    public function store(SettingCreateRequest $request)
    {
        return $this->settingsInterface->store($request);
    }

    public function edit($id)
    {
        return $this->settingsInterface->edit($id);
    }

    public function update(SettingUpdateRequest $request)
    {
        return $this->settingsInterface->update($request);
    }

    public function delete(SettingDeleteRequest $request)
    {
        return $this->settingsInterface->delete($request);
    }
}
