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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>company id</th>
                                    <th>branch</th>
                                    <th>department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employee as $item)
                                    <tr>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->company_id }}</td>
                                        <td>{{ $item->branch }}</td>
                                        <td>{{ $item->department }}</td>
                              <td>
                                            <a href="{{ url('edit-employee/' . $item->id) }}"><i class="fas fa-pen"></i></a>
                                            <a href="{{ url('delete-employee/' . $item->id) }}"
                                                class="btn btn-danger sm" title="Delete Data" id="delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                </tr>
                                    </tr>
                                @empty

                                    <h4>no employee found</h4>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
