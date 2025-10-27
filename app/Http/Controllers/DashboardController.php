<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();
        
        $lowStockProducts = Product::whereColumn('quantity', '<=', 'min_stock')->count();
        $totalInventoryValue = Product::get()->sum(function($product) {
    return $product->price * $product->quantity;
});
        
        $recentProducts = Product::with(['category', 'supplier'])
            ->latest()
            ->take(5)
            ->get();

        $stockData = [
            'total' => $totalProducts,
            'low_stock' => $lowStockProducts,
            'good_stock' => $totalProducts - $lowStockProducts,
        ];

        return view('dashboard', compact(
            'totalProducts', 
            'totalCategories', 
            'totalSuppliers',
            'lowStockProducts',
            'totalInventoryValue',
            'recentProducts',
            'stockData'
        ));
    }
}