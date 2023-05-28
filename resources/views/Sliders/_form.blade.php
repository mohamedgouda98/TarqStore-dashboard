@csrf
<div class="form-group mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @error('image')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>URL </label>
    <input type="text" name="url" class="form-control" value="{{old('url', (isset($slider)) ? $slider->url : '')}}">
    @error('url')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Position</label>
    <input type="number" name="position" class="form-control" value="{{old('position', (isset($slider)) ? $slider->position : '')}}">
    @error('position')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>Model</label><br>
    <select onchange="getModelData(this.value)" name="model" class="form-control">
        <option hidden>Select Model</option>
        <option value="Category" @if(old('model' , isset($slider) && $slider->id == $slider->model)) @endif>Category</option>
        <option value="Product" @if(old('model' , isset($slider) && $slider->id == $slider->model)) @endif>Product</option>
    </select>
    @error('model')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Show in Home</label><br>
    <input type="radio" name="show_in_home" value="true"> True
    <input type="radio" name="show_in_home" value="false"> False
    @error('model')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>Model ID</label><br>
    <select name="model_id" id="model_id" class="form-control">
    </select>
    @error('model')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>



<button type="submit" class="btn btn-primary mt-3">Save</button>

