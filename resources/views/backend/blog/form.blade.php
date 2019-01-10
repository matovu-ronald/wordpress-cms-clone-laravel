<div class="row">
        <div class="col-xs-9">
            <div class="box">
            <!-- /.box-header -->
                <div class="box-body">
                    @foreach (Alert::all() as $alert)
                        <div class="alert alert-success">{{ $alert }}</div>
                    @endforeach
                    
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
                    
                        
                        <div class="form-group excerpt {{ $errors->has('excerpt') ? 'has-error' : '' }}">
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
                        
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Create New Post</button>
                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-xs-3">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Publish</h3>
                </div>
                <div class="box-body">
                    <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                        <label for="published_at">Published</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" id="published_at" value="{{  old('published_at') }}" name="published_at" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                        {{-- <input type="datetime" value="{{  old('published_at') }}" name="published_at" class="form-control" id="published_at" placeholder="Y-m-d H:i:s"> --}}
                        @if ($errors->has('published_at'))
                            <span class="help-block">{{ $errors->first('published_at') }}</span>
                        @endif
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        <button class="btn" id="draft-btn"> <i class="fa fa-save"></i> Save Draft</button>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Publish</button>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Categories
                    </h3>
                </div>
                <div class="box-body">
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
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Feature Image</h3>
                </div>
                <div class="box-body text-center">
                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img data-src="https://via.placeholder.com/200x150.png?text=No+Image" alt="Post Image Upload">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span> <input type="file" id="image" value="{{ old('image') }}" name="image" placeholder="Image"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>

                        @if ($errors->has('image'))
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>