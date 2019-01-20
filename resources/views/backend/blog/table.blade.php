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
                    <a onclick="event.preventDefault(); document.getElementById('delete-post-form').submit();" href="{{ route('backend.blog.destroy', $post->id) }}" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash-o"></i>
                    </a>
                    <form id="delete-post-form" action="{{ route('backend.blog.destroy', $post->id) }}" method="post" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
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