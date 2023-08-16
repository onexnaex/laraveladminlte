@extends('layouts.main')
@section('main')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add {{$title}}</h3>
        </div>
        @foreach ($categoryBlog as $rowcategoryblog )
        <form action="{{route('CategoryBlog.update',$rowcategoryblog->id)}}" role="form" method="post">
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
                    <label for="name">Category</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="input your Category" value="{{old('category_name',$rowcategoryblog->category_name)}}">    
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