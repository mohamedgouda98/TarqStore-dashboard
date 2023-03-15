@csrf

@foreach((new \App\Models\Coupon)->translatable as $value)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        <div class="form-group mb-3">
            <label>Category {{$value}} {{$lang}}</label>
            <input type="text" name="{{$value}}_{{$lang}}" class="form-control" value="{{old($value . '_' . $lang, (isset($category)) ? $category->getTranslation($value,$lang) : '')}}">
            @error($value.'_'.$lang)
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    @endforeach
@endforeach


<button type="submit" class="btn btn-primary mt-3">Save</button>

