# Laravel Project README

## Table of Contents

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)

## Introduction

This is a Laravel project that serves [brief description of your project]. It allows users to [key features or functionalities].

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.0
- Composer
- MySQL or MariaDB
- Node.js and NPM (for front-end assets) (app.js and app.css tailwind)

## Installation

1. **Clone the Repository**

   Open your terminal and run the following command:

   ```bash
   git clone https://github.com/rudrasama/laravel-blog.git
   cd laravel-blog
   ```

2. **Install Dependencies**

   Install the PHP dependencies using Composer:

   ```bash
   composer install
   ```

   Install the Node.js dependencies:

   ```bash
   npm install
   ```

3. **Copy the Environment File**

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

## Configuration

### Setting Up MySQL Connection

1. Open the `.env` file in your project root directory.

2. Update the database connection settings to match your MySQL configuration. Here’s an example configuration:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

   - **DB_CONNECTION**: The type of database connection. Set it to `mysql`.
   - **DB_HOST**: The hostname of your MySQL server (usually `127.0.0.1` for local development).
   - **DB_PORT**: The port your MySQL server is running on (default is `3306`).
   - **DB_DATABASE**: The name of the database you want to use for the application.
   - **DB_USERNAME**: Your MySQL username.
   - **DB_PASSWORD**: Your MySQL password.

3. **Generate Application Key**

   Run the following command to generate the application key:

   ```bash
   php artisan key:generate
   ```

4. **Run Migrations**

   If your application uses a database, run the migrations to set up the necessary tables:

   ```bash
   php artisan migrate
   ```

## Running the Application

To run the application locally, use the built-in PHP server:

```bash
php artisan serve
```

You can access the application in your browser at `http://localhost:8000`.

