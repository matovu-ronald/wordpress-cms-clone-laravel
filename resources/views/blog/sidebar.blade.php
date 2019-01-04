<aside class="right-sidebar">
    <div class="search-widget shadow-sm my-4 p-4">
        <div class="input-group">
            <input type="text" class="form-control rounded-0" placeholder="Search For ..." aria-label="search" aria-describedby="search">
            <div class="input-group-append ">
                <i class="input-group-text rounded-0 fa fa-search" id="search"></i>
            </div>
        </div>
    </div>
    <div class="widget shadow-sm my-4">
        <div class="widget-heading p-3 border-bottom">
            <h4>Categories</h4>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   <a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a> 
                    <span class="badge badge-dark badge-pill">{{ $category->posts->count() }}</span>
                </li>
            @endforeach
            
        </ul>
    </div>
    <div class="widget shadow-sm">
        <div class="widget-heading p-3 border-bottom">
            <h4>Popular Posts</h4>
        </div>
        <div class="widget-body p-3">
            <ul class="popular-posts">
                @foreach ($popularPosts as $popularPost)
                    <li class="">
                        @if ($popularPost->image_thumb_url)
                            <div class="post-image">
                                <a href="{{ route('blog.show', $popularPost->slug ) }}">
                                    <img class="img-fluid" src="{{ $popularPost->image_thumb_url }}" alt="{{ $popularPost->title }}">
                                </a>
                            </div>
                        @endif
                        <div class="post-body">
                            <h6><a href="{{ route('blog.show', $popularPost->slug ) }}">{{ $popularPost->title }} <i class="fa fa-eye"></i> {{ $popularPost->view_count }} </a></h6>
                            <div class="post-meta">
                                <span>{{ $popularPost->date }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
                
            </ul>
        </div>
    </div>
</aside>