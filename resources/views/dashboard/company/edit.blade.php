@extends('layouts.dash')
@section('content')
    <br>
    <div class="container">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Companies</h1>
                <a href="{{ url('company/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Add new
                    company</a>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('update-company/' . $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Branch</label>
                            <input type="text" class="form-control" id="branch" name="branch" value={{ $company->branch }}>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">department</label>
                            <input type="text" class="form-control" id="department" name="department" value={{ $company->department }}>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">website</label>
                            <input type="text" class="form-control" id="website" name="website" value={{ $company->website }}>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
