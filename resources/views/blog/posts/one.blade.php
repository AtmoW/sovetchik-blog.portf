@extends('layouts.app')

@section('content')
@php /** @var \App\Models\Blog\BlogPost $post */ @endphp

    <section class="post-solo">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('blog.posts.index')}}">Статьи</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Категория</a></li>
                    <li class="breadcrumb-item"><a href="#">Автор</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                </ol>
            </nav>
                    <div class="post__content">
                        <img class="post__img" src="{{asset('images/post.png')}}" alt="">
                        <div class="post__title">{{$post->title}}</div>
                        <div class="post__text">
                            <p>{{$post->text}}</p>
                        </div>
                        <div class="post__feedback feedback">
                            <div class="feedback__icons">
                                <div class="feedback__like"><a href=""><img src="{{asset('images/like.svg')}} "
                                                                            alt=""></a><span>100.000</span>
                                </div>
                                <div class="feedback__stars"><a href=""><img src="{{asset('images/star.svg')}}"
                                                                             alt=""></a><span>100.000</span>
                                </div>
                                <div class="feedback__whatch"><a href=""><img src="{{asset('images/whatches.svg')}}"
                                                                              alt=""></a><span>{{$post->watches}}</span></div>
                            </div>
                            <div class="feedback__author">
                                <a href="">Перейти к автору</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
