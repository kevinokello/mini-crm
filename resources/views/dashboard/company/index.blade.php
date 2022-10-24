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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>branch</th>
                                    <th>department</th>
                                    <th>website</th>
                                    <th>logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($company as $item)
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->branch }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->website }}</td>

                                        <td>
                                            <img src="{{ asset('uploads/company/' . $item->logo) }}"
                                                width="50px" height="40px" alt="Img">
                                        </td>
                                        <td>
                                            <a href="{{ url('edit-company/' . $item->id) }}"><i class="fas fa-pen"></i></a>
                                            <a href="{{ url('delete-company/' . $item->id) }}"
                                                class="btn btn-danger sm" title="Delete Data" id="delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
