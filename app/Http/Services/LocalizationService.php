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

    public static function getLocalizationDatatable($translatable, $withText = true)
    {
        $valuesList=[];
        foreach (LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        {
            foreach ($translatable as $key => $value)
            {
                if($withText == false && $value == 'text')
                {
                    continue;
                }

                $valuesList[] = ['name' => $key , 'data' => $key . '.' . $lang , 'title' => $key . ' ' .$lang];
            }
        }

        return $valuesList;
    }

}
