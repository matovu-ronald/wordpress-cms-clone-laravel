<aside class="right-sidebar">
    <div class="search-widget">

    </div>
    <div class="widget">
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   <a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a> 
                    <span class="badge badge-dark badge-pill">{{ $category->posts->count() }}</span>
                </li>
            @endforeach
            
        </ul>
    </div>
</aside>