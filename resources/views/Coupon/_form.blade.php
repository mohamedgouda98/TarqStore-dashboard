@csrf

@foreach((new \App\Models\Category)->translatable as $value)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        <div class="form-group mb-3">
            <label>Category {{$value}} {{$lang}}</label>
            <input type="text" name="{{$value}}_{{$lang}}" class="form-control" value="{{old($value . '_' . $lang, (isset($coupon)) ? $coupon->getTranslation($value,$lang) : '')}}">
            @error($value.'_'.$lang)
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    @endforeach
@endforeach


<div class="form-group mb-3">
    <label>Code</label><br>
    <input type="text" name="code" class="form-control" value="{{old('code', isset($coupon)?$coupon->code : '')}}">
</div>

<div class="form-group mb-3">
    <label>Type</label><br>
    <input type="radio" name="type" value="percent" @if(old('type', isset($coupon) ? $coupon->type == 'percent' : '')) checked @endif> percent
    <input type="radio" name="type" value="amount" @if(old('type', isset($coupon) ? $coupon->type == 'amount' : '')) checked @endif>amount
    @error('type')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>Value</label><br>
    <input type="number" step="0.01" name="value" class="form-control" value="{{old('value', isset($coupon)?$coupon->value : '')}}">
    @error('value')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label>usage limit</label><br>
    <input type="number" name="usage_limit" class="form-control" value="{{old('usage_limit', isset($coupon)?$coupon->usage_limit : '')}}">
    @error('usage_limit')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>usage limit per user</label><br>
    <input type="number" name="usage_limit_per_user" class="form-control" value="{{old('usage_limit_per_user', isset($coupon)?$coupon->usage_limit_per_user : '')}}">
    @error('usage_limit_per_user')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>discount limit</label><br>
    <input type="number" step="0.01" name="discount_limit" class="form-control" value="{{old('discount_limit', isset($coupon)?$coupon->discount_limit : '')}}">
    @error('discount_limit')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Expire date</label><br>
    <input type="date" name="expire_date" class="form-control" value="{{old('expire_date', isset($coupon)?$coupon->expire_date:'')}}" >
    @error('expire_date')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>



<button type="submit" class="btn btn-primary mt-3">Save</button>

