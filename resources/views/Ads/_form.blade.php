@csrf

<div class="form-group mb-3">
    <label> Image</label>
    <input type="file" name="image" class="form-control">
    @error('image')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Status</label><br>
    <input type="text" name="url" class="form-control" value="{{old('url', isset($ads) ? $ads->url : '')}}">
    @error('status')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>Position</label><br>
    <input type="number" name="position" class="form-control" value="{{old('position', isset($ads) ? $ads->position : '')}}">
    @error('position')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<button type="submit" class="btn btn-primary mt-3">Save</button>

