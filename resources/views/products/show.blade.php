@extends('layouts.app')

@section('title', $product->name)

@section('actions')
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="fas fa-box me-2"></i>Product Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID:</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><strong>{{ $product->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>SKU:</th>
                        <td>{{ $product->sku ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td>{{ $product->description ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td>Rs {{ number_format($product->price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Quantity:</th>
                        <td>
                            <span class="badge {{ $product->quantity > $product->min_stock ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->quantity }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Minimum Stock:</th>
                        <td>{{ $product->min_stock }}</td>
                    </tr>
                    <tr>
                        <th>Stock Status:</th>
                        <td>
                            @if($product->quantity > $product->min_stock)
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Low Stock</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i>Additional Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Category:</th>
                        <td>
                            <span class="badge bg-secondary">{{ $product->category->name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Supplier:</th>
                        <td>{{ $product->supplier->name }}</td>
                    </tr>
                    <tr>
                        <th>Expiry Date:</th>
                        <td>
                            @if($product->expiry_date)
                                @if($product->expiry_date->isPast())
                                    <span class="badge bg-danger">Expired on {{ $product->expiry_date->format('M d, Y') }}</span>
                                @else
                                    {{ $product->expiry_date->format('M d, Y') }}
                                    <small class="text-muted">({{ $product->expiry_date->diffForHumans() }})</small>
                                @endif
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{ $product->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At:</th>
                        <td>{{ $product->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Supplier Info -->
        <div class="card shadow mt-4">
            <div class="card-header bg-warning">
                <h5 class="mb-0"><i class="fas fa-truck me-2"></i>Supplier Information</h5>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $product->supplier->name }}</p>
                <p><strong>Email:</strong> {{ $product->supplier->email }}</p>
                <p><strong>Phone:</strong> {{ $product->supplier->phone }}</p>
                <p><strong>Contact:</strong> {{ $product->supplier->contact_person ?? 'N/A' }}</p>
                <a href="{{ route('suppliers.show', $product->supplier->id) }}" class="btn btn-outline-primary btn-sm">
                    View Supplier Details
                </a>
            </div>
        </div>
    </div>
</div>
@endsection