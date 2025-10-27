<?php
namespace Database\Seeders;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Categories
        $categories = [
            ['name' => 'Fruits', 'description' => 'Fresh fruits'],
            ['name' => 'Vegetables', 'description' => 'Fresh vegetables'],
            ['name' => 'Dairy', 'description' => 'Milk and dairy products'],
            ['name' => 'Meat', 'description' => 'Fresh meat products'],
            ['name' => 'Beverages', 'description' => 'Drinks and beverages'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create Suppliers
        $suppliers = [
            [
                'name' => 'Fresh Foods Ltd',
                'email' => 'contact@freshfoods.com',
                'phone' => '+1-555-0101',
                'address' => '123 Food Street, City, State',
                'contact_person' => 'John Smith'
            ],
            [
                'name' => 'Quality Meats Inc',
                'email' => 'sales@qualitymeats.com',
                'phone' => '+1-555-0102',
                'address' => '456 Meat Avenue, City, State',
                'contact_person' => 'Sarah Johnson'
            ],
            [
                'name' => 'Dairy Delights',
                'email' => 'info@dairydelights.com',
                'phone' => '+1-555-0103',
                'address' => '789 Dairy Road, City, State',
                'contact_person' => 'Mike Davis'
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        // Create Products
        $products = [
            [
                'name' => 'Apple',
                'description' => 'Fresh red apples',
                'price' => 2.99,
                'quantity' => 50,
                'min_stock' => 10,
                'category_id' => 1,
                'supplier_id' => 1,
                'sku' => 'FRUIT-001',
                'expiry_date' => now()->addDays(30),
            ],
            [
                'name' => 'Milk',
                'description' => 'Whole milk 1L',
                'price' => 3.49,
                'quantity' => 20,
                'min_stock' => 5,
                'category_id' => 3,
                'supplier_id' => 3,
                'sku' => 'DAIRY-001',
                'expiry_date' => now()->addDays(7),
            ],
            [
                'name' => 'Chicken Breast',
                'description' => 'Fresh chicken breast',
                'price' => 8.99,
                'quantity' => 15,
                'min_stock' => 8,
                'category_id' => 4,
                'supplier_id' => 2,
                'sku' => 'MEAT-001',
                'expiry_date' => now()->addDays(5),
            ],
            [
                'name' => 'Orange Juice',
                'description' => 'Fresh orange juice 1L',
                'price' => 4.99,
                'quantity' => 25,
                'min_stock' => 10,
                'category_id' => 5,
                'supplier_id' => 1,
                'sku' => 'BEV-001',
                'expiry_date' => now()->addDays(14),
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}