<h1>📦 Product CRUD System (Laravel 8 + XAMPP)</h1>

<h2>🛠 Tech Stack</h2>
- XAMPP v3.3.0<br>
- Laravel Framework 8.83.29<br>
- Node v22.22.2<br>
- MySQL (phpMyAdmin)<br>

<hr>

<h2>🚀 Setup Instructions</h2>

<h3>1. Create Database</h3>
Open: <br>
<a href="http://localhost/phpmyadmin/">http://localhost/phpmyadmin/</a><br><br>

Create database:<br>
<code>productsystem</code><br>

<hr>

<h3>2. Install Dependencies</h3>
<pre>
composer install
npm install
</pre>

<hr>

<h3>3. Environment Setup</h3>

Update <code>.env</code>:<br>
<pre>
DB_DATABASE=productsystem
DB_USERNAME=root
DB_PASSWORD=
</pre>

<hr>

<h3>4. Run Migration + Seeder</h3>
<pre>
php artisan migrate
php artisan db:seed
</pre>

<hr>

<h3>5. Build Frontend Assets</h3>
<pre>
npm run dev
</pre>

<hr>

<h3>6. Start Server</h3>
<pre>
php artisan serve
</pre>

<hr>

<h2>📡 API Documentation</h2>

<h3>Base URL</h3>
<code>http://localhost:8000</code>

<hr>

<h3>🟢 GET /products</h3>

<strong>Response:</strong>
<pre>
[
  {
    "id": 1,
    "name": "iPhone",
    "category_id": 1,
    "price": 5000,
    "stock": 10,
    "enabled": true,
    "description": "Apple phone",
    "category": {
      "id": 1,
      "name": "Electronics"
    }
  }
]
</pre>

<hr>

<h3>➕ POST /products</h3>

<strong>Request Body:</strong>
<pre>
{
  "name": "iPhone 15",
  "category_id": 1,
  "description": "Apple latest phone",
  "price": 5999.00,
  "stock": 5,
  "enabled": true
}
</pre>

<strong>Response:</strong>
<pre>
{
  "id": 2,
  "name": "iPhone 15",
  "category_id": 1,
  "price": 5999.00,
  "stock": 5,
  "enabled": true,
  "description": "Apple latest phone"
}
</pre>

<hr>

<h3>✏️ PUT /products/{id}</h3>

<strong>Request Body:</strong>
<pre>
{
  "name": "iPhone 15 Pro",
  "category_id": 1,
  "description": "Updated model",
  "price": 6500,
  "stock": 8,
  "enabled": false
}
</pre>

<strong>Response:</strong>
<pre>
{
  "message": "Updated successfully"
}
</pre>

<hr>

<h3>❌ DELETE /products/{id}</h3>

<strong>Response:</strong>
<pre>
{
  "message": "Deleted successfully"
}
</pre>

<hr>

<h3>🧺 POST /products/bulk-delete</h3>

<strong>Request Body:</strong>
<pre>
{
  "ids": [1, 2, 3]
}
</pre>

<strong>Response:</strong>
<pre>
{
  "message": "Bulk deleted successfully"
}
</pre>

<hr>

<h2>⚠️ Notes</h2>
- Soft delete enabled for products<br>
- Category is required (foreign key)<br>
- Enabled field is boolean (true/false)<br>

<hr>

<h2>🚀 Available Commands</h2>
<pre>
php artisan migrate
php artisan db:seed
npm run dev
php artisan serve
</pre>
