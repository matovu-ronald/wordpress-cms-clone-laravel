@extends('layouts.backend.app')

@section('title', 'My Laravel Blog | All Posts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blog <small>Display All Blog Posts</small>
    </h1>
    <ol class="breadcrumb">
        <li> <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
        <li class="active">All Posts</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-left">
                        <a href="{{ route('backend.blog.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add New Post</a>
                    </div>
                </div>
            <!-- /.box-header -->
                <div class="box-body ">
                    @if (! $posts->count())
                        <div class="alert alert-danger text-center">
                            <strong>No records Found</strong>
                        </div>
                    @else 
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                        <tr>
                                            <th>Actions</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('backend.blog.destroy', $post->id) }}" class="btn btn-xs btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                                <td> {{ $post->title }} </td>
                                                <td>{{ $post->category->title }}</td>
                                                <td>{{ $post->author->name }}</td>
                                                <td>
                                                <abbr title="{{ $post->dateFormatted(true) }}" > {{ $post->dateFormatted() }} </abbr>
                                                {!! $post->publicationLabel() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                                </table>
                        </div>
                    @endif
                    <div class="box-footer clearfix">
                        {{ $posts->links() }}
                    </div>
                    <div class="pull-right">
                        <small>{{ $postCount }} {{ str_plural('Item', $postCount) }}</small>
                    </div>
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

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
