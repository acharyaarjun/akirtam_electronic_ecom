@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="com-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class=""><b>Edit Product - {{ $product->product_title }}</b></h2>
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
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="title">Product Title*</label>
                                                <input type="text"
                                                    class="form-control @error('product_title') is-invalid @enderror"
                                                    id="title" name="product_title" placeholder="Enter Category Title"
                                                    value="{{ $product->product_title }}" required />

                                                @error('product_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">Product Image<span
                                                        class="text-danger">*</span></label>
                                                <input type="file"
                                                    class="form-control  @error('product_image') is-invalid @enderror"
                                                    id="image" name="product_image" placeholder="product image" />
                                                @if ($product->product_image != null)
                                                    <img src="{{ asset('uploads/product/' . $product->product_image) }}"
                                                        class="img-responsive img-fluid" width="150" height="150" />
                                                @else
                                                    <span class="text-danger">Image not available</span>
                                                @endif
                                                @error('product_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_id">Category*</label>
                                                <select name="category_id" id="category_id"
                                                    class="form-control @error('category_id') is-invalid @enderror"
                                                    required>
                                                    <option value="" class="text-center">Choose Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" <?php if ($product->category_id == $category->id) {
                                                            echo 'selected';
                                                        } ?>>
                                                            {{ $category->category_title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status<span class="text-danger">*</span></label>
                                                <select name="status" id="status"
                                                    class="form-control  @error('status') is-invalid @enderror" required>
                                                    <option value="active" <?php if ($product->status == 'active') {
                                                        echo 'selected';
                                                    } ?>>🟢</option>
                                                    <option value="inactive"<?php if ($product->status == 'inactive') {
                                                        echo 'selected';
                                                    } ?>>🔴</option>
                                                </select>
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="product_stock">Stock<span class="text-danger">*</span></label>
                                                <input type="number" name="product_stock" id="product_stock"
                                                    class="form-control @error('product_stock') is-invalid @enderror"
                                                    value="{{ $product->product_stock }}" required />
                                                @error('product_stock')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="orginal_cost">Orginal Cost<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="orginal_cost" id="orginal_cost"
                                                    class="form-control @error('orginal_cost') is-invalid @enderror"
                                                    value="{{ $product->orginal_cost }}" required />
                                                @error('orginal_cost')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label for="discounted_cost">Discounted Cost<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="discounted_cost" id="discounted_cost"
                                                    class="form-control @error('discounted_cost') is-invalid @enderror"
                                                    value="{{ $product->discounted_cost }}" required />
                                                @error('discounted_cost')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label for="product_description">Description</label>
                                                <textarea name="product_description" id="product_description" cols="30" rows="10"
                                                    class="form-control  @error('product_description') is-invalid @enderror">{{ $product->product_description }}</textarea>
                                                @error('product_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Save changes">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
