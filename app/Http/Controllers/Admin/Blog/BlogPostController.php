<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogPostRequest;
use App\Models\Blog\BlogPost;
use App\Repositories\Blog\BlogCategoryRepository;
use App\Repositories\Blog\BlogPostRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends BaseController
{

    private $blogPostRepository;
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * @param string $sort
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getAllWithPaginate();


        return view('admin.blog.posts.index', compact(['posts']));
    }

    public function notPublished()
    {
        $posts = $this->blogPostRepository->getAllWithPaginate(false);


        return view('admin.blog.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('admin.blog.posts.create.index', compact(['post', 'categoryList']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogPostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostRequest $request)
    {
        $data=$request->all();

        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $data['user_id'] = \Auth::user()->id;
        $data['image_path'] = '123';

        $item = new BlogPost($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.blog.posts.index')
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка при сохранении'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
