<?php
namespace App\Http\Services;


use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocalizationService
{

    public static function getLocalizationList(Model $model, $request)
    {
        $localizationList =[];
        $translatable = (new $model)->translatable;

        foreach ($translatable as $value)
        {
           foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
           {
               $localizationList[$value][$lang] = $request->input($value . '_' . $lang);
           }
        }

        return $localizationList;
    }

    public static function getLocalizationValidation($translatable)
    {
        $validationList=[];
        foreach ($translatable as $value)
        {
            foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
            {
                $validationList[$value . '_' . $lang] = ['required'];
            }
        }

        return $validationList;
    }

    public static function getLocalizationDatatable($translatable)
    {
        $valuesList=[];
        foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        {
            foreach ($translatable as $value)
            {
                $valuesList[] = ['name' => $value . '.' . $lang , 'data' => $value . '.' . $lang , 'title' => $value . ' ' .$lang];
            }
        }

        return $valuesList;
    }

}
