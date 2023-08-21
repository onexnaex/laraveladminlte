@extends('layouts.main')
@section('main')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add {{$title}}</h3>
        </div>
        @foreach ($articleBlog as $rowarticleBlog )
        <form action="{{route('ArticleBlog.update',$rowarticleBlog->id)}}" role="form" method="post">
            @csrf <!-- {{ csrf_field() }} -->
            @method('PUT')
            <div class="card-body">
                @if ($errors->any())
                <div class="row">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Whoops! There were some problems with your input.</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="input your title" value="{{old('title',$rowarticleBlog->title)}}">    
                </div>
                
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{old('description',$rowarticleBlog->description)}}</textarea>   
                </div>

                
                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="fk_category" id="fk_category"  class="form-control" value="{{old('fk_category',$rowarticleBlog->fk_category)}}">
                        @foreach ($category as $rowcategory )
                            <option value="{{$rowcategory->id}}">{{$rowcategory->category_name}}</option>
                        @endforeach
                    </select>   
                </div>

                <div class="form-group">
                    <label for="name">Cover</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" value="{{old('thumbnail',$rowarticleBlog->thumbnail)}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="submit" class="btn btn-primary">
                <a href="{{route('CategoryBlog')}}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
        @endforeach
    </div>
</div>

@endsection