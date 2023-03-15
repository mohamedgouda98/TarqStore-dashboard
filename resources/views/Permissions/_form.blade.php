@csrf

    <div class="form-group mb-3">
        <label>Permission</label>
        <input type="text" required name="name" class="form-control" value="{{old('name', $role->name ?? '')}}">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>


<button type="submit" class="btn btn-primary mt-3">Save</button>

