@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <article class="post-item mb-5 shadow-sm">
                        @if ($post->imageUrl)
                            <div class="post-item-image">
                                <a href="#">
                                    <img src="{{ $post->imageUrl }}" class="img-fluid" alt="{{ $post->title }}">
                                </a>
                            </div>
                        @endif
                        <div class="post-item-body">
                            <div class="post-item-title px-4 py-2">
                                <h2>{{ $post->title }}</h2>
                            </div>
                            <div class="post-item-content px-4 py-2">
                                {!! $post->excerpt !!}
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
                                <div class="pull-right">
                                    <a href="#">Continue Reading &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
                <nav>
                    {{ $posts->links() }}
                </nav>
                
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection