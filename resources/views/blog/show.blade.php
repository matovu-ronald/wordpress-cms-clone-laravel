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
                                    <li><i class="fa fa-user"></i> <a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a></li>
                                    <li><i class="fa fa-clock-o"></i> <a href="#">{{ $post->date }}</a></li>
                                    <li><i class="fa fa-tags"></i> <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->title }}</a></li>
                                    <li><i class="fa fa-comments"></i> <a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                        
                        </div>
                    </div>
                </article>
                <article class="post-author shadow-sm my-5">
                    <div class="post-author-media d-flex flex-row p-4">
                        <div class="justify-content-start pr-3">
                            <a href="{{ route('author', $post->author->slug ) }}">
                                <img class="img-fluid rounded-circle" src="/img/author.jpg" alt="{{ $post->author->name }}">
                            </a>
                        </div>
                        <div class="post-author-media-body justify-content-end">
                            <h4 class="post-author-media-title">
                                <a href="{{ route('author', $post->author->slug ) }}">{{ $post->author->name }}</a>
                            </h4>
                            <div class="post-author-media-count">
                                <a href="#">
                                    <i class="fa fa-clone"></i>
                                    {{ $post->author->posts()->published()->count() }} {{ str_plural('Post', $post->author->posts()->published()->count()) }}
                                </a>
                            </div>
                            <p>
                                {!! $post->author->bio_html !!}
                            </p>
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