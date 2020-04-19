<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Http\Controllers\Blog\BaseController;
use Illuminate\Http\Request;
use App\Repositories\Blog\BlogPostRepository;
use App\Events\Blog\PostHasViewed;

class BlogPostController extends BaseController
{
    /**
     * @var BlogPostRepository;
     */
    private $blogPostRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $posts = $this->blogPostRepository->getNewWithPaginate();
        $sortType = "Новые";

        return view('blog.posts.index',compact('posts','sortType'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getPopularWithPaginate();'sortType';
        $sortType = "Просматриваемые";

        return view('blog.posts.index',compact('posts','sortType'));

    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $post = $this->blogPostRepository->getOne($slug);
        event(new PostHasViewed($post));
        return view('blog.posts.one',compact('post'));
    }
}
