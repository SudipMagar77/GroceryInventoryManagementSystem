@extends('layouts.app')

@section('title', 'Products')
@section('actions')
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Product
    </a>
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Expiry Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="{{ $product->isLowStock ? 'table-warning' : '' }}">
                        <td>{{ $product->id }}</td>
                        <td>
                            <strong>{{ $product->name }}</strong>
                            @if($product->sku)
                                <br><small class="text-muted">SKU: {{ $product->sku }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $product->category->name }}</span>
                        </td>
                        <td>{{ $product->supplier->name }}</td>
                        <td>Rs{{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="badge {{ $product->quantity > $product->min_stock ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->quantity }}
                            </span>
                        </td>
                        <td>
                            @if($product->quantity > $product->min_stock)
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Low Stock</span>
                            @endif
                        </td>
                        <td>
                            @if($product->expiry_date)
                                @if($product->expiry_date->isPast())
                                    <span class="badge bg-danger">Expired</span>
                                @elseif($product->expiry_date->diffInDays(now()) <= 7)
                                    <span class="badge bg-warning">{{ $product->expiry_date->format('M d') }}</span>
                                @else
                                    <span class="text-muted">{{ $product->expiry_date->format('M d, Y') }}</span>
                                @endif
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No products found. <a href="{{ route('products.create') }}">Create the first one!</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection