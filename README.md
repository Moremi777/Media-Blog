Media Blog Website
Overview

The Media Blog Website was my first project in full-stack web development. It marked the beginning of my journey in building and managing web applications. This project provided essential experience in both front-end and back-end development.
Features

    User Authentication: Secure login and registration system.
    Post Creation: Users can create, edit, and delete blog posts.
    Comment System: Users can comment on posts.
    Responsive Design: Optimized for various devices and screen sizes.

Technologies Used

    Front-end: HTML, CSS, JavaScript
    Back-end: PHP
    Database: MySQL
    Server: Apache

Setup Instructions
Prerequisites

    Apache Server
    PHP
    MySQL

Installation Steps

    Clone the Repository

    sh

git clone https://github.com/YourUsername/media-blog-website.git

Navigate to the Project Directory

sh

cd media-blog-website

Set Up the Database

    Create a MySQL database named media_blog.
    Import the database schema from database/schema.sql.

sql

CREATE DATABASE media_blog;
USE media_blog;
SOURCE path/to/schema.sql;

Configure Database Connection

    Update the config.php file with your database credentials.

php

    <?php
    $host = 'localhost';
    $db = 'media_blog';
    $user = 'your_username';
    $pass = 'your_password';

    Start Apache Server
    Ensure your Apache server is running and serving your project directory.

    Access the Application
    Open your web browser and navigate to http://localhost/media-blog-website.

Functionality

    Home Page: Displays a list of recent blog posts.
    Post Details: View the full content of a post and its comments.
    User Dashboard: Manage user-created posts.
    Admin Panel: Administrative controls for managing posts and users.

Contributions

Contributions are welcome! Feel free to fork the repository and submit pull requests.
License

This project is licensed under the MIT License.
