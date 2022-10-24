@extends('layouts.dash')
@section('content')
    <br>
    <div class="container">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Employees</h1>
                <a href="{{ url('employee/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Add new
                    employee</a>
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
                    <form action="{{ url('update-employee/' . $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="company_id" id="company" class="form-control">
                            <option value="">-- Select Company--
                            </option>
                            @foreach ($company as $cateitem)
                            <option value="{{ $cateitem->id }}"
                                {{ $employee->company_id == $cateitem->id ? 'selected' : '' }}>
                                {{ $cateitem->name }}</option>
                        @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Branch</label>
                            <input type="text" class="form-control" id="branch" name="branch" value="{{ $employee->branch }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">department</label>
                            <input type="text" class="form-control" id="department" name="department" value="{{ $employee->department }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
