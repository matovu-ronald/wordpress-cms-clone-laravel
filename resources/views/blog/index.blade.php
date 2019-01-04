@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (! $posts->count())
                    <div class="alert alert-warning">
                        No Posts Found
                    </div>
                @else
                    @if (isset($categoryName))
                        <div class="alert alert-info">
                            <p>Category: <span class="font-weight-bolder">{{ $categoryName }}</span></p>
                        </div>
                    @endif
                    @if (isset($authorName))
                        <div class="alert alert-info">
                            <p>Author: <span class="font-weight-bolder">{{ $authorName }}</span></p>
                        </div>
                    @endif
                    @foreach ($posts as $post)
                        <article class="post-item mb-5 shadow-sm">
                            @if ($post->imageUrl)
                                <div class="post-item-image">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        <img src="{{ $post->imageUrl }}" class="img-fluid" alt="{{ $post->title }}">
                                    </a>
                                </div>
                            @endif
                            <div class="post-item-body">
                                <div class="post-item-title px-4 py-2">
                                    <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                </div>
                                <div class="post-item-content px-4 py-2">
                                    {!! $post->excerptHtml !!}
                                </div>
                                <div class="post-item-underline my-3"></div>
                                <div class="post-item-meta d-flex">
                                    <div class="pull-left">
                                        <ul class="d-flex justify-content-between">
                                            <li><i class="fa fa-user"></i> <a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a></li>
                                            <li><i class="fa fa-clock-o"></i> {{ $post->date }} </li>
                                            <li><i class="fa fa-folder"></i> <a href="{{ route('category.show', $post->category->slug ) }}">{{ $post->category->title }}</a></li>
                                            <li><i class="fa fa-comments"></i> <a href="#">4 Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('blog.show', $post->slug) }}">Continue Reading &raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endif
                
                <nav class="">
                    {{ $posts->links() }}
                </nav>
                
            </div>
            <div class="col-md-4">
                @include('blog.sidebar')
            </div>
        </div>
    </div>
@endsection