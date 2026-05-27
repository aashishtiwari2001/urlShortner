URL Shortener Management System

This project is a multi-company URL shortener management system with role-based access control.

Roles and Permissions


1. Super Admin

The Super Admin has full control of the system.

Super Admin Features
Create new companies
Create company admins
View all companies
View all shortened URLs from every company
View reports such as:
Total users in each company
Total URLs created by each company
Total hit counts (click counts) of all URLs


2. Company Admin

Each company has its own Admin who manages users and URLs inside that company.

Admin Features
Create short URLs
View all URLs created by:
The admin
Company members
Create new admins for the same company
Add new members to the company
Manage company users


3. Member

Members are normal users inside a company.

Member Features
Create short URLs
View only their own created URLs
Main Modules
Company Management
Super Admin can create and manage companies.
Each company can have multiple admins and members.
User Management
Role-based users:
Super Admin
Admin
Member
Admin can add users inside their company.
URL Shortener
Users can generate short URLs.
Every short URL redirects to the original URL.
Hit count is tracked whenever a short URL is opened.
Reports Dashboard

Reports available for Super Admin:

Total companies
Total users per company
Total URLs per company
Total URL hits/clicks



🚀 How to Run this Project
Follow these simple steps to run the project on your computer:

Clone the project:
git clone [https://github.com/aashishtiwari2001/urlShortner.git](https://github.com/aashishtiwari2001/urlShortner.git)

Install vendor folder:
composer install

Setup Environment File:
Copy .env.example and rename it to .env.

Connect Database:
Open the .env file, add your database details, and import the SQL file sent in the email.

Start the Project:
php artisan serve
(Now open [http://127.0.0.1:8000/login](http://127.0.0.1:8000) in your browser)