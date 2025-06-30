# Restaurant Inventory & Purchasing Management

This directory contains a simplified PHP-based web application that demonstrates basic inventory management features for a restaurant. It is not a production-ready implementation, but it illustrates how the core concepts might be structured in PHP.

## Features
- Add new products with a name, quantity and unit price
- List all products with current stock levels
- Update product quantities
- Record purchase history

## Usage
1. Start a PHP development server in this folder:
   ```bash
   php -S localhost:8000
   ```
2. Open `http://localhost:8000/index.php` in your browser.

Data is stored in a simple SQLite database file (`database.sqlite`) created automatically on first run.
