@csrf

@foreach((new \App\Models\Blog)->translatableAttributes as $key =>  $value)
    @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
        <div class="form-group mb-3">
            <label>Blog {{$key}} {{$lang}}</label>
            @if($value == 'string')
                <input type="text" name="{{$key}}_{{$lang}}" class="form-control" value="{{old($key . '_' . $lang, (isset($blog)) ? $blog->getTranslation($key,$lang) : '')}}">
            @else
                <textarea name="{{$key}}_{{$lang}}" class="form-control"> {{old($key . '_' . $lang, (isset($blog)) ? $blog->getTranslation($key,$lang) : '')}} </textarea>
            @endif
            @error($key.'_'.$lang)
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    @endforeach
@endforeach

<div class="form-group mb-3">
    <label>Main Image</label>
    <input type="file" name="main_image" class="form-control">
    @error('main_image')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Status</label><br>
    <input type="radio" name="status" value="active" @if(old('status', isset($blog) ? $blog->status == 'active' : '')) checked @endif> active
    <input type="radio" name="status" value="not_active" @if(old('status', isset($blog) ? $blog->status == 'not_active' : '')) checked @endif> not active
    @error('status')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label>Category</label><br>
    <select name="blog_category_id">
        @foreach($blogCategories as $blogCategory)
            <option value="{{$blogCategory->id}}" @if(old('blog_category_id' , isset($blog) && $blogCategory->id == $blog->category_id)) selected @endif>{{$blogCategory->name}}</option>
        @endforeach
    </select>
    @error('Category')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>




<button type="submit" class="btn btn-primary mt-3">Save</button>

