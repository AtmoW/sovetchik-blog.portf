@extends('layouts.app')

@section('content')

    <section class="popular">
    <div class="container">
        <div class="popular__inner row">
            @foreach($posts as $post)
                @php /** @var \App\Models\Blog\BlogPost $post */ @endphp
                <div class="popular__post post">
                    <div class="post__title">
                        @if(mb_strlen($post->title)>17)
                        <a href="one.html" class="post__title-a" title="{{$post->title}}" >{{mb_strimwidth($post->title,0,17)}}...</a>
                        @else
                            <a href="one.html" class="post__title-a" title="{{$post->title}}">{{$post->title}}</a>
                        @endif
                    </div>
                    <div class="post__sep"></div>
                    <div class="post__text">{{$post->excerpt}}</p>
                        <img src="{{asset('images/post.png')}}" alt=""></div>
                    <div class="post__sep"></div>
                    <div class="post__feedback">
                        <div class="feedback__like"><img src="{{asset('images/like-gray.svg')}}" alt=""><span>100.000</span>
                        </div>
                        <div class="feedback__stars"><img src="{{asset('images/star-gray.svg')}}" alt=""><span>100.000</span>
                        </div>
                        <div class="feedback__whatch"><img src="{{asset('images/whatches-gray.svg')}}"
                                                           alt=""><span>100.000</span></div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
    </section>
@endsection
