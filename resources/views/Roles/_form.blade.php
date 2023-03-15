@csrf

    <div class="form-group mb-3">
        <label>Role</label>
        <input type="text" required name="name" class="form-control" value="{{old('name', $role->name ?? '')}}">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    @foreach($permissions as $permission)
        <div class="form-group mb-3">
            <label>{{$permission->name}}</label>
            <input type="checkbox" name="permission_ids[]" class="form-control" value="{{old('permission_ids', $permission->id)}}">
            @error('permission_ids')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    @endforeach


<button type="submit" class="btn btn-primary mt-3">Save</button>

