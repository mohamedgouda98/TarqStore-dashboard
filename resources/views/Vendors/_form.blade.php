@csrf
    <div class="form-group mb-3">
        <label>Vendor name en</label>
        <input type="text" name="name_en" class="form-control" value="{{old('name_en', $vendor->name_en ?? '')}}">
        @error('name_en')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label>Vendor name ar</label>
        <input type="text" name="name_ar" class="form-control" value="{{old('name_ar', $vendor->name_ar?? '')}}">
        @error('name_ar')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
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

