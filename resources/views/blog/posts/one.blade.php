@extends('layouts.app')

@section('content')
@php /** @var \App\Models\Blog\BlogPost $post */ @endphp

    <section class="post">
        <div class="container">
                    <div class="post__content">
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
                                                                              alt=""></a><span>100.000</span></div>
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
