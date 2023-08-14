@extends('layouts.main')
@section('main')
@foreach ($user as $rowuser )
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show {{$title}}</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td style="width: 30%;text-align:right;">ID</td>
                    <td>{{$rowuser->id}}</td>
                </tr>
                <tr>
                    <td style="width: 30%;text-align:right;">Name</td>
                    <td>{{$rowuser->name}}</td>
                </tr>
                <tr>
                    <td style="width: 30%;text-align:right;">Email</td>
                    <td>{{$rowuser->email}}</td>
                </tr>
            </table>  
        </div>
        <div class="card-footer">
            <a href="{{route('user')}}" class="btn btn-warning">Back</a>
        </div>
    </div>
</div>

@endforeach

@endsection