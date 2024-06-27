# Scriptoria

## Prerequisites

Before you begin, ensure you have the following software installed on your local development environment:

- **PHP** >= 8.2 (with necessary extensions)
- **Composer**
- **Node.js** & npm/yarn
- **Git**
- A database server (e.g., MySQL, PostgreSQL, SQLite)

## Installation Steps

### 1. Clone the Repository
First, clone the Laravel application repository from GitHub to your local machine.

```bash
git clone <repository-url>
cd <repository-directory>
```
### 2. Install Dependencies
2.1 Composer Dependencies
Install the PHP dependencies using Composer. 
```bash
composer install
```

2.2 Node.js Dependencies
Install the Node.js dependencies using npm.

```bash
npm install
```

### 3. Environment Configuration
3.1 Create .env File
Create a copy of the .env.example file and rename it to .env.

```bash
cp .env.example .env
```

3.2 Generate Application Key
Generate the application key. This key is used by Laravel to encrypt sensitive data.

```bash
php artisan key:generate
```
3.3 Configure Environment Variables
Open the .env file and configure your environment variables (e.g., database credentials, application URL).

### 4. Database Setup
Run the database migrations to create the necessary tables.

```bash
php artisan migrate --seed
```

### 5. Build Frontend Assets
Compile the frontend assets (CSS, JavaScript, etc.) using npm.

```bash
npm run dev
```

### 6. Serve the Application
Start the Laravel development server.

```bash
php artisan serve
```
By default, the application will be accessible at http://localhost:8000.
