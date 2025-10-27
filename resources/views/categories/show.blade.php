@extends('layouts.app')

@section('title', $category->name)

@section('actions')
    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="fas fa-tag me-2"></i>Category Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID:</th>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><strong>{{ $category->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td>{{ $category->description ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Products Count:</th>
                        <td>
                            <span class="badge bg-primary">{{ $category->products->count() }} products</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{ $category->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At:</th>
                        <td>{{ $category->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-boxes me-2"></i>Products in this Category</h4>
            </div>
            <div class="card-body">
                @if($category->products->count() > 0)
                    <div class="list-group">
                        @foreach($category->products as $product)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $product->name }}</h6>
                                <small class="text-muted">${{ number_format($product->price, 2) }}</small>
                            </div>
                            <p class="mb-1">Quantity: {{ $product->quantity }}</p>
                            <small class="text-muted">SKU: {{ $product->sku ?? 'N/A' }}</small>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No products in this category yet.</p>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection