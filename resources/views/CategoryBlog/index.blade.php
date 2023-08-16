@extends('layouts.main')
@section('main')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List {{$title}}</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                  
                    <a href="{{route('CategoryBlog.create')}}" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
                
                </div>
              </div>
        </div>
        <div class="card-body">
               

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

           

            {{ $dataTable->table() }}
        </div>
    </div>
</div>



@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush