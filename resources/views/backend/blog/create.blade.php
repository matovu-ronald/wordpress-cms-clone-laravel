@extends('layouts.backend.app')

@section('title', 'My Laravel Blog | Create New Post')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blog <small>Create New Post</small>
    </h1>
    <ol class="breadcrumb">
        <li> <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
        <li class="active">Add New Post</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <!-- /.box-header -->
                <div class="box-body">
                    @foreach (Alert::all() as $alert)
                        <div class="alert alert-success">{{ $alert }}</div>
                    @endforeach
                    <form action="{{ route('backend.blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">Title</label>
                            <input type="text" id="title" value="{{ old('title') }}" name="title" class="form-control" placeholder="Title">
                            @if ($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            <label for="slug">Slug</label>
                            <input type="text" value="{{ old('slug') }}" id="slug" name="slug" class="form-control" placeholder="Slug">
                            @if ($errors->has('slug'))
                                <span class="help-block">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">Image</label>
                            <input type="file" id="image" value="{{ old('image') }}" name="image" placeholder="Image">
                            @if ($errors->has('image'))
                                <span class="help-block">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control" id="category" placeholder="Choose Category">
                               
                                @foreach( App\Category::all() as $category )
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="help-block">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                            <label for="excerpt">Excerpt</label>
                            <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="8" placeholder="Excerpt">{{ old('excerpt') }}</textarea>
                            @if ($errors->has('excerpt'))
                                <span class="help-block">{{ $errors->first('excerpt') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                            <label for="body">Body</label>
                            <textarea name="body" class="form-control" id="body" cols="30" rows="8" placeholder="Body">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <span class="help-block">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                            <label for="published">Published</label>
                            <input type="datetime" value="{{  old('published_at') }}" name="published_at" class="form-control" id="published" placeholder="Y-m-d H:i:s">
                            @if ($errors->has('published_at'))
                                <span class="help-block">{{ $errors->first('published_at') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Create New Post</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
<!-- ./row -->
</section>
<!-- /.content -->
@endsection

