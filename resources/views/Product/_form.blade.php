@csrf

@foreach((new \App\Models\Product)->translatableAttributes as $key =>  $value)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        <div class="form-group mb-3">
            <label>Product {{$key}} {{$lang}}</label>
            @if($value == 'string')
            <input type="text" name="{{$key}}_{{$lang}}" class="form-control" value="{{old($key . '_' . $lang, (isset($category)) ? $category->getTranslation($key,$lang) : '')}}">
            @else
                <textarea name="{{$key}}_{{$lang}}" class="form-control"> {{old($key . '_' . $lang, (isset($category)) ? $category->getTranslation($key,$lang) : '')}} </textarea>
            @endif
            @error($key.'_'.$lang)
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    @endforeach
@endforeach

@foreach(\App\Http\Services\ProductAttributeService::getProductAttributes() as $attribute)
    <label>{{$attribute->name}}</label>
    @if($attribute->data_type == "string")
       <input type="text" name="{{$attribute->name}}" class="form-control" value="{{old($attribute->name)}}">
   @endif
    @error($attribute->name)
    <p class="text-danger">{{$message}}</p>
    @enderror
@endforeach

<button type="submit" class="btn btn-primary mt-3">Save</button>

