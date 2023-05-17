<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\SettingsInterface;
use App\Http\Trait\ImageUploader;
use App\Models\Setting;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsRepository implements SettingsInterface
{
    use ImageUploader;
    private $settingModel;

    public function __construct(Setting $setting)
    {
        $this->settingModel = $setting;
    }


    public function index($settingsDataTable)
    {
        return $settingsDataTable->render('Settings.index');
    }

    public function create()
    {
        return view('Settings.create');
    }

    public function store($request)
    {

        if($request->type == 'file')
        {
           $value = $this->uploadImage($request->value, 'settings');
        }
        $this->settingModel::create([
            'name' => $request->name,
            'value' => ($value) ?? $request->value,
            'type' => $request->type,
        ]);
        Alert::toast('Settings Created');
        return redirect(route('admin.setting.index'));
    }

    public function edit($id)
    {
        $setting = $this->settingModel::find($id);
        return ($setting) ? view('Settings.edit', compact('setting'))  : redirect(route('admin.settings.index'));
    }

    public function update($request)
    {
        $category = $this->settingModel::findOrFail($request->id);


        $category->update([
            'name' => $request->name,
            'value' => $request->value,
            'type' => $request->type,
        ]);

        Alert::toast('Settings Updated');

        return redirect(route('admin.setting.index'));
    }

    public function delete($request)
    {
        $blogCategory = $this->settingModel::findOrFail($request->id);
        $blogCategory->delete();
        return 1;
    }
}
