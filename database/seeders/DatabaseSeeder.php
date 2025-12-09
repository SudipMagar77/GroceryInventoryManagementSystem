<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Users
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@inventory.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@inventory.com',
            'password' => Hash::make('manager123'),
            'email_verified_at' => now(),
        ]);

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

        // Success message
        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('👤 Admin Login: admin@inventory.com / password123');
        $this->command->info('👤 Manager Login: manager@inventory.com / manager123');
        $this->command->info('📊 Products: 4 items');
        $this->command->info('🏷️  Categories: 5 categories');
        $this->command->info('🏢 Suppliers: 3 suppliers');
    }
}