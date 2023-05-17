@csrf

<div class="form-group mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{old('name', (isset($setting)) ? $setting->name : '')}}">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Type</label>
    <select onchange="updateInput(this.value)" class="form-control" name="type">
        <option @if(old('type') == 'text') selected @endif value="text">Text</option>
        <option @if(old('type') == 'number') selected @endif value="number">Number</option>
        <option @if(old('type') == 'email') selected @endif value="email">Email</option>
        <option @if(old('type') == 'address') selected @endif value="address">Address</option>
        <option @if(old('type') == 'file') selected @endif value="file">File</option>
    </select>
</div>

<div class="form-group mb-3 inputs-list">
    <label>Value</label>
    <input id="valueInput" type="{{old('type', 'text')}}" name="value" class="form-control" value="{{old('value', (isset($setting)) ? $setting->value : '')}}">
    @error('value')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<button type="submit" class="btn btn-primary mt-3">Save</button>

