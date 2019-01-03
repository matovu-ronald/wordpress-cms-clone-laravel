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
                        <div class="post-item-body p-4">
                            <div class="post-item-title py-2">
                                <h2>{{ $post->title }}</h2>
                            </div>
                            <div class="post-item-content">
                                {!! $post->excerpt !!}
                            </div>
                            <div class="post-item-underline my-3"></div>
                            <div class="post-item-meta d-flex justify-content-between">
                                <div class="">
                                    <ul class="d-flex justify-content-between">
                                        <li><i class="fa fa-user"></i> <a href="#">Admin</a></li>
                                        <li><i class="fa fa-clock-o"></i> <a href="#">February 12, 2016</a></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Blog</a></li>
                                        <li><i class="fa fa-comments"></i> <a href="#">4 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="">
                                    <a href="#">Continue Reading &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
                
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection