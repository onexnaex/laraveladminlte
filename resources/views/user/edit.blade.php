@extends('layouts.main')
@section('main')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add {{$title}}</h3>
        </div>
        @foreach ($user as $rowuser )
        <form action="{{route('user.update',$rowuser->id)}}" role="form" method="post">
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
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="input your name" value="{{old('name',$rowuser->name)}}">    
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="input your email" value="{{old('email',$rowuser->email)}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="submit" class="btn btn-primary">
                <a href="{{route('user')}}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
        @endforeach
    </div>
</div>

@endsection