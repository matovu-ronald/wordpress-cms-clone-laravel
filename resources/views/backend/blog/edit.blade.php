@extends('layouts.backend.app')

@section('title', 'My Laravel Blog | Edit Post')

@include('backend.blog.style')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
            Blog <small>Edit Post</small>
        </h1>
        <ol class="breadcrumb">
            <li> <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
            <li class="active">Edit Post</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('backend.blog.update', $post->id) }}" id="post-form" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.blog.form')
        <!-- ./row -->
        </form>
    </section>
    <!-- /.content -->
@endsection


@include('backend.blog.script')