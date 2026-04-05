# KLYMB

Welcome to **KLYMB**, a comprehensive gym management platform. This application is designed to handle everything a climbing gym needs: from managing high-quality pro-shop products and diverse membership plans to a robust administrative backend for full facility control.

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
