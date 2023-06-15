@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Manage Product</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Image xa hai</td>
                                    <td>Smart Watch</td>
                                    <td>
                                        <span class="text-success">Active</span>
                                    </td>
                                    <td>20 May, 2023</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Image xa hai</td>
                                    <td>Smart Watch</td>
                                    <td>
                                        <span class="text-danger">Hidden</span>
                                    </td>
                                    <td>20 May, 2023</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
