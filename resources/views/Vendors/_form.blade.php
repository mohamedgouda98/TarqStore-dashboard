@csrf

@foreach((new \App\Models\BlogCategory)->translatable as $value)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        <div class="form-group mb-3">
            <label>Blog Category {{$value}} {{$lang}}</label>
            <input type="text" name="{{$value}}_{{$lang}}" class="form-control" value="{{old($value . '_' . $lang, (isset($vendor)) ? $vendor->getTranslation($value,$lang) : '')}}">
            @error($value.'_'.$lang)
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    @endforeach
@endforeach

    <div class="form-group mb-3">
        <label>Vendor email</label>
        <input type="email" name="email" class="form-control" id="sEmail" aria-describedby="emailHelp1" value="{{old('email', $vendor->email ?? '')}}">
        <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label>Vendor phone</label>
        <input type="text" name="phone" class="form-control" value="{{old('phone', $vendor->phone ?? '')}}">
        @error('phone')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

<div class="form-group mb-3">
    <label>Vendor Password</label>
    <input type="text" name="password" class="form-control" value="{{old('password', $vendor->phone ?? '')}}">
    @error('password')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

    <button type="submit" class="btn btn-primary mt-3">Save</button>

