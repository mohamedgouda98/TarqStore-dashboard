<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\BlogInterface;
use App\Http\Services\LocalizationService;
use App\Http\Trait\ImageUploader;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BlogRepository implements BlogInterface
{
    use ImageUploader;

    private $blogModel;
    private $localizationService;

    public function __construct(Blog $blog, LocalizationService $localizationService)
    {
        $this->blogModel = $blog;
        $this->localizationService = $localizationService;
    }

    public function index($blogDataTable)
    {
        $data = Blog::first();
        dd($data->first_name);
        return $blogDataTable->render('blogs.index');
    }

    public function create()
    {
        $blogCategories = BlogCategory::get();
        return view('Blogs.create', compact('blogCategories'));
    }

    public function store($request)
    {
        $localizationList =  $this->localizationService::getLocalizationList($this->blogModel, $request);
        $image = $this->uploadImage($request->main_image, 'blogs/images');
        $this->blogModel::create(array_merge($localizationList, [
            'status' => $request->status,
            'category_id' => $request->blog_category_id,
            'main_image' => $image,
            'admin_id'=> 1
        ])
        );
        Alert::toast('Blog Created');
        return redirect(route('admin.blog.index'));
    }

    public function edit($id)
    {
//        $x = Storage::disk('s3')->delete('blogs/images/18AJAaj3jwq2I8epF1SSjYaWTSmG6UyAyZykqHwv.jpg');
//        blogs/images/mnUj7sOhirZRwnZ7QErMtIeCSOulXE6pn2tcqWxR.png
//        dd($x);
        $blog = $this->blogModel::find($id);
        $blogCategories = BlogCategory::get();
        return ($blog) ? view('Blogs.edit', compact('blog', 'blogCategories'))  : redirect(route('admin.blog.index'));
    }

    public function update($request)
    {
        $localizationList =  $this->localizationService::getLocalizationList($this->blogModel, $request);

        $blog = $this->blogModel::findOrFail($request->id);

        if($request->hasFile('main_image'))
        {
            $image = $this->uploadImage($request->main_image, 'blogs/images', $blog->main_image);
        }
        $blog->update(
            array_merge($localizationList, [
                'status' => $request->status,
                'category_id' => $request->blog_category_id,
                'main_image' => $image ?? $blog->main_image,
                'admin_id'=> 1
            ])
        );
        Alert::toast('Blog Updated');
        return redirect(route('admin.blog.index'));
    }

    public function delete($request)
    {
        $blog = $this->blogModel::findOrFail($request->id);
        $blog->delete();
        return 1;
    }
}
