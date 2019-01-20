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
                    <a title="Restore Post" href="{{ route('backend.blog.restore', $post->id) }}" class="btn btn-xs btn-default"
                       onclick="event.preventDefault(); document.getElementById('restore-post-form').submit();"
                    >
                        <i class="fa fa-undo"></i>
                    </a>
                    <a title="Delete Post Permanently" onclick="event.preventDefault(); document.getElementById('delete-post-form').submit();" href="{{ route('backend.blog.force.destroy', $post->id) }}" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                    <form id="restore-post-form" method="post" action="{{ route('backend.blog.restore', $post->id) }}"  style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                    <form id="delete-post-form" action="{{ route('backend.blog.force.destroy', $post->id) }}" method="post" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                <td> {{ $post->title }} </td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>
                    <abbr title="{{ $post->dateFormatted(true) }}" > {{ $post->dateFormatted() }} </abbr>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>