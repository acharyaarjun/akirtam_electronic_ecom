@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="com-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Products</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addProductModal">Add Product</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Stock</th>
                                    <th>Origial Cost</th>
                                    <th>Discounted Cost</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product_title }}</td>
                                        <?php
                                        $categorytitle = \App\Models\Category::where('id', $item->category_id)
                                            ->where('deleted_at', null)
                                            ->limit(1)
                                            ->first();
                                        
                                        // dd($item->category->category_title);
                                        
                                        ?>
                                        {{-- <td>{{ $categorytitle->category_title }}</td> --}}
                                        <td>{{ $item->category->category_title }}</td>
                                        <td>
                                            @if ($item->product_image != null)
                                                <img src="{{ asset('uploads/product/' . $item->product_image) }}"
                                                    class="img-responsive img-fluid" width="150" height="150" />
                                            @else
                                                <span class="text-danger">Image not available</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->product_stock }}</td>
                                        <td>$ {{ $item->orginal_cost }}</td>
                                        <td>$ {{ $item->discounted_cost }}</td>
                                        <td>
                                            @if ($item->status == 'active')
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">Hidden</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
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

    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModalLabel"><b>Add Product</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.postAddProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="title">Product Title*</label>
                                    <input type="text" class="form-control" id="title" name="product_title"
                                        placeholder="Enter Category Title" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="image">Product Image*</label>
                                    <input type="file" class="form-control" id="image" name="product_image"
                                        placeholder="Enter Category Title" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="category_id">Category*</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">-----------Choose Category-----------</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="status">Status*</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Hidden</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="stock">Stock*</label>
                                    <input type="number" name="stock" id="stock" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="orginal_cost">Orginal Cost*</label>
                                    <input type="number" name="orginal_cost" id="orginal_cost" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="discounted_cost">Discounted Cost*</label>
                                    <input type="number" name="discounted_cost" id="discounted_cost"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="product_description">Description</label>
                                    <textarea name="product_description" id="product_description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
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
