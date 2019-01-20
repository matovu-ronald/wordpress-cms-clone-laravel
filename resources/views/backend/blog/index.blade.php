@extends('layouts.backend.app')

@section('title', 'My Laravel Blog | All Posts')

@section('style')
    <style type="text/css">
        .selectd-status {
            font-weight: bold;
            color: #0b6ba2;
        }
    </style>
@endsection

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
                    <div class="pull-right" style="padding: 7px 0;">
                        @php($links = [])
                        @foreach($statusList as $key => $value)
                            @if($value)
                                @php( $selected = Request::get('status') == $key ? 'selectd-status' : '' )
                                @php(
                                    $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})" . "</a>"
                                )
                            @endif
                        @endforeach
                        {!! implode(' | ' , $links ) !!}

                    </div>
                </div>
            <!-- /.box-header -->
                <div class="box-body ">
                    @include('backend.blog.message')
                    @if (! $posts->count())
                        <div class="alert alert-danger text-center">
                            <strong>No records Found</strong>
                        </div>
                    @else 
                        @if($onlyTrashed)
                            @include('backend.blog.trash-table')
                        @else
                            @include('backend.blog.table')
                        @endif

                    @endif
                    <div class="box-footer clearfix">
                        {{ $posts->appends( Request::query() )->render() }}
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
