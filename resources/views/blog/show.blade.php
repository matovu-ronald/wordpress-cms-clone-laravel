@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item shadow-sm">
                    @if ($post->imageUrl)
                        <div class="post-item-image">
                            <img class="img-fluid" src="{{ $post->imageUrl }}" alt="{{ $post->title }}">
                        </div>
                    @endif
                    <div class="post-item-body">
                        <div class="post-item-title py-2 px-4">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="post-item-content py-2 px-4">
                            {!! $post->bodyHtml !!}
                        </div>
                        <div class="post-item-underline my-3"></div>
                        <div class="post-item-meta d-flex">
                            <div class="pull-left">
                                <ul class="d-flex justify-content-between">
                                    <li><i class="fa fa-user"></i> <a href="#">{{ $post->author->name }}</a></li>
                                    <li><i class="fa fa-clock-o"></i> <a href="#">{{ $post->date }}</a></li>
                                    <li><i class="fa fa-tags"></i> <a href="#">Blog</a></li>
                                    <li><i class="fa fa-comments"></i> <a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                        
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                @include('blog.sidebar')
            </div>
        </div>
    </div>
@endsection