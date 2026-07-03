# KLYMB

**KLYMB** is a Laravel 12 web application built as an online pro-shop for a climbing gym, paired with a full administrative backend. Visitors can browse and filter climbing gear, register and log in, manage a shopping cart, check out, and track their order history. A static membership info page is also included, though membership plans/subscriptions are not yet functionally implemented (the routes are scaffolded for future work).

## ✨ Features

- **Shop** — product catalog with filtering by category, brand, and price range, plus sorting options
- **Cart & Checkout** — add/update/remove cart items, checkout with shipping details, order creation
- **Order history** — authenticated users can view their past orders
- **Custom authentication** — registration, login, logout, and email-based account verification (activation code sent via email)
- **Roles** — `user`, `member`, `admin`, enforced via route middleware (the `member` role currently has no dedicated features)
- **Admin panel** — dashboard with stats, product/category/brand/badge management (with image uploads), user management (search, filter, ban/unban), order management, contact message inbox with email replies, and an activity log audit trail
- **Contact form** — public/authenticated contact form with admin reply-by-email functionality

## 🧱 Tech Stack

- **Backend**: Laravel 12, PHP ^8.2
- **Frontend**: Blade, Tailwind CSS 4, Flowbite, Vite
- **Database**: MySQL (configurable via `.env`; SQLite is the default in `.env.example`)

---

## 🛠️ Quick Start (Terminal)

After cloning the repository, execute the following commands in order:

### 1. Install Dependencies & Setup
```bash
# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Create the environment file
cp .env.example .env

# Generate the application encryption key
php artisan key:generate

# Create a symbolic link from public/storage to storage/app/public
php artisan storage:link
```

### 2. Storage Link & Assets
To properly display uploaded images for products and memberships, you must create a symbolic link.

**Important Note:** If the `public/storage` folder already exists but images aren't showing, you might need to delete that folder manually before running the command. After linking, make sure to re-paste your product images into the storage folder if they were lost.

```bash
# Delete existing link (if broken) and create a new one
php artisan storage:link
```

### 3. Environment & Database Setup
In your `.env` file, update the following lines to match your local development environment:
```bash
# Database connection settings
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=klymb
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Mail Configuration (Contact Form)
To enable the contact form and email notifications in KLYMB, you need to configure your SMTP settings in the `.env` file.

```bash
# Mail Settings in .env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_specific_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@klymb.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 5. Database Migration & Seeding
Before running the migrations, ensure you have created an empty database named `klymb` (or the name you specified in your `.env` file) in your MySQL server.

Once the database is ready, execute the following command to build the table structure and populate it with climbing equipment, brands, and administrative accounts:

```bash
# Run migrations and seed the platform with gear data
php artisan migrate --seed
```

### 6. Running the Platform
To get the KLYMB platform fully operational, you need to run both the backend server and the frontend asset compiler. Open two separate terminal windows:

**Terminal 1 (Backend - Laravel):**
```bash
# Start the local PHP development server
php artisan serve
```

**Terminal 2 (Frontend - Vite):**

```bash
# Start the Vite asset watcher (keep this running for UI changes)
npm run dev
```

---

## 🔑 Access Credentials

You can use these pre-defined accounts to log in and explore the KLYMB platform:

| Role      | Email | Password |
|:----------| :--- | :--- |
| **Admin** | `admin@gmail.com` | `admin` |
| **User**  | `user@gmail.com` | `user` |

---

### 7. Documentation
Detailed technical documentation, including the project's logic and architecture, can be found in the `public` folder.

```bash
# Location of the documentation file
public/documentation.pdf
```
