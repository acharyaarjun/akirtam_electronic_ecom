@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Manage Category</h2>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addCategoryModal">Add Category</button>
                            </div>
                        </div>
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

    <!-- Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCategoryModalLabel"><b>Add Category</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group mb-2">
                            <label for="title">Category Title*</label>
                            <input type="text" class="form-control" id="title" name="category_title"
                                placeholder="Enter Category Title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="image">Category Image*</label>
                            <input type="file" class="form-control" id="image" name="category_image"
                                placeholder="Enter Category Title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="status">Status*</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="hidden">Hidden</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="category_description">Description</label>
                            <textarea name="category_description" id="category_description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save changes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
