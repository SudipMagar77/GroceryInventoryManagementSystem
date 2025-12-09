<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #000 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        🏪 Inventory Management System
                    </h1>
                    <p class="lead mb-4">
                        Streamline your inventory management with our powerful and easy-to-use system. 
                        Track products, manage suppliers, and monitor stock levels all in one place.
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg px-4 me-md-2">
                                <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4 me-md-2">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row mt-5 mt-lg-0">
                        <div class="col-md-6 mb-4">
                            <div class="feature-card p-4 text-center">
                                <i class="fas fa-boxes fa-3x mb-3"></i>
                                <h5>Product Management</h5>
                                <p class="small">Easily add, edit, and track your products</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="feature-card p-4 text-center">
                                <i class="fas fa-tags fa-3x mb-3"></i>
                                <h5>Categories</h5>
                                <p class="small">Organize products with categories</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="feature-card p-4 text-center">
                                <i class="fas fa-truck fa-3x mb-3"></i>
                                <h5>Supplier Tracking</h5>
                                <p class="small">Manage your suppliers and contacts</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="feature-card p-4 text-center">
                                <i class="fas fa-chart-line fa-3x mb-3"></i>
                                <h5>Dashboard Analytics</h5>
                                <p class="small">Get insights with beautiful charts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>