@extends('layouts.app')

@section('content')

    <section class="popular">
        <div class="container">
            <div class="row justify-content-between">
                <div class="title">{{$sortType}}</div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Сортировка
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('blog.posts.index')}}">Просматриваемые</a>
                        <a class="dropdown-item" href="{{route('blog.posts.new')}}">Новые</a>
                    </div>
                </div>
            </div>
            <div class="popular__inner row">
                @foreach($posts as $post)
                    @php /** @var \App\Models\Blog\BlogPost $post */ @endphp
                    <div class="popular__post post">
                        <div class="row justify-content-between">
                            <div class="col-8">
                                <div class="post__title">
                                    <a href="{{route('blog.posts.show', $post->slug)}}" class="post__title-a"
                                       title="{{$post->title}}">
                                        @if(mb_strlen($post->title)>17){{mb_strimwidth($post->title,0,17)}}...</a>
                                        @else{{$post->title}}
                                        @endif
                                    </a>
                                </div>
                            </div>

                            <div class="col-4 post_date"><p>{{\Illuminate\Support\Carbon::parse($post->published_at)->format('d-m-yy | H:m') }}</p></div>
                        </div>
                        <div class="post__sep"></div>
                        <div class="post__text"><p>{{$post->excerpt}}</p><img src="{{asset('images/post.png')}}" alt="">
                        </div>
                        <div class="post__sep"></div>
                        <div class="post__feedback">
                            <div class="feedback__like"><img src="{{asset('images/like-gray.svg')}}" alt=""><span>100.000</span>
                            </div>
                            <div class="feedback__stars"><img src="{{asset('images/star-gray.svg')}}" alt=""><span>100.000</span>
                            </div>
                            <div class="feedback__whatch"><img src="{{asset('images/whatches-gray.svg')}}"
                                                               alt=""><span>{{$post->watches}}</span></div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="row justify-content-center">
            @if($posts->total() > $posts->count())
                <br>
                <div class="row justify-content-center">
                    {{$posts->links()}}
                </div>
            @endif
        </div>
    </section>
@endsection
