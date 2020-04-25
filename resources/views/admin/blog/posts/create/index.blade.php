@extends('layouts.app')

@section('content')
    <div class="container">
        @php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp

        @if($errors->any())
            <div class="row justify-content-center">
                <div class="dol-md-11">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        {{$errors->first()}}
                    </div>
                </div>
            </div>
        @endif
        <form method="POST" action="{{route('admin.blog.posts.store', $post->id)}}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.blog.posts.create.includes.main')
                </div>
                <div class="col-md-3">
                    @include('admin.blog.posts.create.includes.option')
                </div>
            </div>
        </form>
    </div>
@endsection
