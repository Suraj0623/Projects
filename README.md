# E-commerce Platform

A simple eCommerce platform built with PHP, covering essential functionalities like product browsing, cart management, secure checkout, and order processing.

## Features

- **User Authentication**: Register, login, and manage user profiles.
- **Product Management**: Admin panel to add, edit, and delete products with categories.
- **Shopping Cart**: Add items, update quantities, and remove items.
- **Checkout Process**: Secure order placement with payment gateway integration.
- **Order Management**: View order status and manage orders for both customers and admin.
- **Responsive Design**: Optimized for both mobile and desktop.

## Tech Stack

- **Backend**: PHP 8
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Database**: MySQL
- **Session Management**: PHP Sessions

## Getting Started

### Prerequisites

- PHP 8+
- MySQL
- A web server (Apache )

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/ecommerce-platform.git
    cd ecommerce-platform
    ```

2. Set up your environment:
    - Create a `.env` file (or use `config.php`) for database and payment gateway configuration.

3. Import the database:
    - Use the provided `database.sql` file to set up tables in MySQL.

4. Configure the server:
    - Point your server's document root to the `public` directory.
    - Make sure to enable rewrite rules if you're using Apache.

5. Start the application:
    - Use a local server like XAMPP, MAMP, or the PHP built-in server:
    ```bash
    php -S localhost:8000
    ```

### Project Structure

- **`/public`**: Publicly accessible files, including entry points for the application.
- **`/src`**: Core application logic, including models, controllers, and helpers.
- **`/views`**: HTML and PHP templates for the frontend.
- **`/config`**: Configuration files (e.g., database connection).
- **`/scripts`**: JavaScript and CSS files.

## Usage

- Navigate to the project URL, register, and start exploring the store.
- Admin users can log in to access product and order management features.

## Running Tests

To test, ensure `PHPUnit` is installed:
```bash
vendor/bin/phpunit
