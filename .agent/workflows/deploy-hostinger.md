---
description: Deploying Laravel to Hostinger Shared Hosting
---

This guide provides the steps to deploy your Laravel application to Hostinger Shared Hosting.

### 1. Pre-deployment (Local)

1.  **Build Assets**: If you are using Vite, run the build command locally:
    ```bash
    npm run build
    ```
2.  **Zip the Project**: Create a zip file of your project. **Exclude** the following folders:
    - `node_modules`
    - `vendor`
    - `storage` (except for the `framework` structure)
    - `.git`
    - `.env`

### 2. Prepare Hostinger (hPanel)

1.  **Create Database**:
    - Go to **Databases** -> **Management**.
    - Create a new MySQL database and user. Note down the **DB Name**, **Username**, and **Password**.
2.  **Set PHP Version**:
    - Go to **Advanced** -> **PHP Configuration**.
    - Ensure the PHP version is **8.2** or higher (Laravel 11+ requirement).
3.  **Enable SSH (Optional but recommended)**:
    - Go to **Advanced** -> **SSH Access** and enable it.

### 3. Upload and Extract

1.  **Upload Zip**:
    - Go to **Files** -> **File Manager**.
    - Navigate to your domain's folder (e.g., `domains/yourdomain.com/`).
    - Upload your zip file.
2.  **Extract**:
    - Extract the zip file in the domain's root folder.
3.  **Delete Zip**: Remove the zip file after extraction.

### 4. Configure Environment

1.  **Create .env**:
    - Duplicate `.env.example` to `.env` in the File Manager.
    - Update the database credentials:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_hostinger_db_name
        DB_USERNAME=your_hostinger_db_user
        DB_PASSWORD=your_hostinger_db_password
        ```
    - Set `APP_ENV=production` and `APP_DEBUG=false`.
    - Generate an app key (via SSH `php artisan key:generate` or locally and copy it).

### 5. Pointing to Public

On shared hosting, the web server looks for `public_html`. There are two ways to handle this:

**Option A: The .htaccess Way (Recommended for simplicity)**
Create a `.htaccess` file in the **root** of your domain folder (where your `composer.json` is) with this content:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

**Option B: The Symbolic Link Way**
Delete the default `public_html` folder and create a symbolic link (requires SSH):

```bash
ln -s public public_html
```

### 6. Final Steps (via SSH)

Connect via SSH and run these commands in your project root:

1.  **Install Dependencies**:
    ```bash
    composer install --no-dev --optimize-autoloader
    ```
2.  **Run Migrations**:
    ```bash
    php artisan migrate --force
    ```
3.  **Link Storage**:
    ```bash
    php artisan storage:link
    ```
4.  **Run Seeders (Optional)**:
    If you need to populate your database with initial data:

    ```bash
    # Run the main DatabaseSeeder
    php artisan db:seed --force

    # Or run a specific seeder class
    php artisan db:seed --class=PageContentSeeder --force
    ```

    > [!IMPORTANT]
    > Di production (Hostinger), Anda **wajib** menambahkan flag `--force` agar perintah dijalankan tanpa konfirmasi interaktif.

5.  **Optimize**:
    ```bash
    php artisan optimize
    ```

### Support Note

If you don't have SSH access, you must run `composer install` locally and include the `vendor` folder in your zip file.
