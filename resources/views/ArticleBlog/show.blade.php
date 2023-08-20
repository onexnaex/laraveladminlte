@extends('layouts.main')
@section('main')

@foreach ($categoryBlog as $rowcategoryblog )
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show {{$title}}</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td style="width: 30%;text-align:right;">ID</td>
                    <td>{{$rowcategoryblog->id}}</td>
                </tr>
                <tr>
                    <td style="width: 30%;text-align:right;">Category</td>
                    <td>{{$rowcategoryblog->category_name}}</td>
                </tr>
            </table>  
        </div>
        <div class="card-footer">
            <a href="{{route('CategoryBlog')}}" class="btn btn-warning">Back</a>
        </div>
    </div>
</div>

@endforeach

@endsection