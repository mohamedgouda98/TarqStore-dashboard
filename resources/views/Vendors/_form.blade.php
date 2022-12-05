    @csrf
    <div class="form-group mb-3">
        <label>Vendor name</label>
        <input type="text" name="name" class="form-control" value="{{old('name', $vendor->name ?? '')}}">
        @error('name')
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

    <button type="submit" class="btn btn-primary mt-3">Save</button>

