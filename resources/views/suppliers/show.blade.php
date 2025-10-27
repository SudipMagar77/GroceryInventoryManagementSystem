@extends('layouts.app')

@section('title', $supplier->name)

@section('actions')
    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="fas fa-truck me-2"></i>Supplier Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID:</th>
                        <td>{{ $supplier->id }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><strong>{{ $supplier->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $supplier->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $supplier->phone }}</td>
                    </tr>
                    <tr>
                        <th>Contact Person:</th>
                        <td>{{ $supplier->contact_person ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{{ $supplier->address }}</td>
                    </tr>
                    <tr>
                        <th>Products Count:</th>
                        <td>
                            <span class="badge bg-primary">{{ $supplier->products->count() }} products</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{ $supplier->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-boxes me-2"></i>Products from this Supplier</h4>
            </div>
            <div class="card-body">
                @if($products->count() > 0)
                    <div class="list-group">
                        @foreach($products as $product)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $product->name }}</h6>
                                <small class="text-muted">Rs {{ number_format($product->price, 2) }}</small>
                            </div>
                            <p class="mb-1">
                                Category: <span class="badge bg-secondary">{{ $product->category->name }}</span>
                            </p>
                            <p class="mb-1">Quantity: {{ $product->quantity }}</p>
                            <small class="text-muted">SKU: {{ $product->sku ?? 'N/A' }}</small>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No products from this supplier yet.</p>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection