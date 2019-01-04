<aside class="right-sidebar">
    <div class="search-widget shadow-sm my-4 p-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search For ..." aria-label="search" aria-describedby="search">
            <div class="input-group-append">
                <i class="input-group-text fa fa-search" id="search"></i>
            </div>
        </div>
    </div>
    <div class="widget shadow-sm">
        <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   <a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a> 
                    <span class="badge badge-dark badge-pill">{{ $category->posts->count() }}</span>
                </li>
            @endforeach
            
        </ul>
    </div>
</aside>