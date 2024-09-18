# ZPPSU E-Marketplace

The ZPPSU E-Marketplace holds huge significance within the Zamboanga 
Peninsula Polytechnic State University (ZPPSU) community, offering an extensive 
number of benefits across various dimensions. First and foremost, it encourages student entrepreneurship by offering a 
customized platform where students can use their academic projects, creative abilities, 
and specialized knowledge to develop marketable goods and services. 

## Built with the TALL Stack

This project is built using the TALL stack:
- **Tailwind CSS** for the frontend styling.
- **Alpine.js** for lightweight JavaScript interactions.
- **Laravel** as the backend framework.
- **Livewire** for dynamic interfaces without leaving the comfort of Laravel.

## Requirements

Before setting up the project, ensure you have the following installed:

- PHP >= 7.4
- Composer
- Node.js and npm
- Laravel CLI (optional but recommended)

## Installation

Follow these steps to set up the project:

1. **Clone the repository:**
   ```bash
   https://github.com/phantomDev11/ZPPSU_E-Marketplace.git
   cd ZPPSU_E-Marketplace
   ```

2. **Install PHP dependencies:**
   The vendor directory, which contains PHP dependencies, is not included in the repository. You need to install these dependencies using Composer:
   ```bash
   composer install
   ```

4. **Install Node.js dependencies:**
   The node_modules directory, which contains Node.js dependencies, is also not included in the repository. You need to install these dependencies using npm:
   ```bash
   npm install
   ```

6. **Set up the environment:**
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Generate the application key:
     ```bash
     php artisan key:generate
     ```

7. **Configure the `.env` file:**
   - Update the `.env` file with your database and other necessary configurations.

8. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

9. **Build assets (if applicable):**
   ```bash
   npm run dev
   ```
   - For production build:
     ```bash
     npm run production
     ```

10. **Serve the application:**
   ```bash
   php artisan serve
   ```
   - The application will be accessible at `http://localhost:8000`.

## Additional Commands

- **Running tests:**
  ```bash
  php artisan test
  ```

- **Running the development server with hot reloading (if using Laravel Mix):**
  ```bash
  npm run watch
  ```
