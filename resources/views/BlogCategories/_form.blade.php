@csrf

@foreach((new \App\Models\BlogCategory)->translatable as $value)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        <div class="form-group mb-3">
            <label>Blog Category {{$value}} {{$lang}}</label>
            <input type="text" name="{{$value}}_{{$lang}}" class="form-control" value="{{old($value . '_' . $lang, $blogCategory->{$value.'_'.$lang} ?? '')}}">
            @error($value.'_'.$lang)
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    @endforeach
@endforeach

    <button type="submit" class="btn btn-primary mt-3">Save</button>

