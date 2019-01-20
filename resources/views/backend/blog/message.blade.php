@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@elseif(session('trash-message'))
   <div class="alert alert-danger">
       <?php list($message, $postId) = session('trash-message') ?>
       {!! Form::open(['method' => 'PUT', 'route' => ['backend.blog.restore', $postId]]) !!}
           {{ $message }} <button class="btn btn-info d-inline rounded-0 shadow-lg" type="submit"> <span class="fa fa-undo"></span> Undo</button>
       {!! Form::close() !!}
   </div>
@endif