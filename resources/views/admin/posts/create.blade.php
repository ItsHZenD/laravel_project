@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <label for="">Company</label>
                            <select name="company" class="form-control"></select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
