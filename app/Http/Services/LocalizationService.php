<?php
namespace App\Http\Services;


use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocalizationService
{

    public static function getLocalizationList(Model $model, $request)
    {
        $localizationList =[];
        $translatable = (new $model)->translatableAttributes;

        foreach ($translatable as $key => $value)
        {
           foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
           {
               $localizationList[$key][$lang] = $request->input($key . '_' . $lang);
           }
        }

        return $localizationList;
    }

    public static function getLocalizationValidation($translatable)
    {
        $validationList=[];
        foreach ($translatable as $key => $value)
        {
            foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
            {
                $validationList[$key . '_' . $lang] = ['required'];
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
                $valuesList[] = ['name' => $value , 'data' => $value . '.' . $lang , 'title' => $value . ' ' .$lang];
            }
        }

        return $valuesList;
    }

}
