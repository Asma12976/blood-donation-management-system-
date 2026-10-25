# DonorSphere — Blood Donation Management System

> **Donate Blood, Save Life.**

DonorSphere is a web-based Blood Donation Management System built with PHP, MySQL, HTML, and CSS, with Bootstrap for the dashboards. It connects blood donors with patients in need and provides an admin panel to manage blood stock, donors, patients, and blood requests.

The system has three types of users:

| Role | Purpose |
|---|---|
| Donor | Registers, logs in, manages their profile, checks donation eligibility, submits donation requests, views donation history, and contacts support. |
| Patient | Registers, logs in, requests blood, and tracks request status (Pending, Approved, or Rejected). |
| Admin | Logs in to a dashboard showing blood stock by group, total donors, requests, and approvals. |

---

## Table of Contents

1. [Features](#features)
2. [Tech Stack](#tech-stack)
3. [Project Structure](#project-structure)
4. [Database](#database)
5. [Installation and Setup](#installation-and-setup)
6. [How It Works](#how-it-works)
7. [Current Status and Known Issues](#current-status-and-known-issues)
8. [Security Recommendations](#security-recommendations)
9. [Roadmap](#roadmap)
10. [License](#license)

---

## Features

### Public Website

- Landing page with a hero section, the "Donate Blood, Save Life" message, a showcase of donors (name, gender, and blood group), and a Get Involved section featuring Donate Blood, Volunteer Team, and Spread Awareness.
- About Us page with the project mission and three information cards: Donate Blood, Request Blood, and Safe and Secure.
- Contact Us form that stores messages in the database and links them to the logged-in user when available.
- Responsive navigation with Home, About Us, Contact Us, Donor, Patient, and Admin.
- Role selection page (`admin_user_option.php`) where users can choose User or Admin entry.

### Donor Module

- Donor registration with full name, email, contact number, age, gender, blood group, address, message, and password.
  - Creates records in `users` and `blood_donor`.
  - If the email already exists in `users`, only the donor profile is added.
  - Duplicate donor registration is blocked.
- Donor login with password verification using `password_verify()` and session-based authentication.
- Forgot Password feature to reset passwords through email, with passwords stored as hashes.
- Donor dashboard displaying:
  - Welcome message with the donor's name.
  - Blood group and last donation date.
  - Donation eligibility status.
  - Eligibility rule: a donor can donate again 56 days after their last donation. The Make a Donation link is disabled when the donor is not eligible.
- Edit Profile to update name, contact number, age, gender, blood group, and message. Email is read-only.
- Make a Donation to submit a donation request with units, donation type (Whole Blood, Plasma, or Platelets), and a message. The donor must be at least 18 years old, and the request starts with Pending status.
- Donation History showing request date, blood type, units, donation type, status, message, and a Report link.
- Support Request form that saves donor messages in `support_requests`.
- Sidebar navigation with Dashboard, Profile, Donation History, Notifications, Make a Donation, and Logout.

### Patient Module

- Patient dashboard with a welcome message and request counters:
  - Total requests
  - Pending requests
  - Approved requests
- Sidebar navigation with Dashboard, Profile, Request Blood, Request History, Notifications, and Logout.

### Admin Module

- Admin login with credentials checked against the `admin` table using session-based authentication.
- Admin dashboard featuring:
  - Blood stock cards for all eight blood groups: A+, B+, O+, AB+, A-, B-, O-, and AB-.
  - Summary cards for Total Donors, Total Requests, Approved Requests, and Total Blood Units (ml).
  - Sidebar navigation for Home, Donor, Patient, Donations, Blood Requests, Request History, and Blood Stock.
- Admin template fragments (`header.php` and `leftbar.php`) for a fuller BloodBank and Donor Management System administration area, including:
  - Add and manage blood groups.
  - Donor list.
  - Manage Contact Us queries.
  - Manage pages.
  - Update contact information.
  - Manage blood requests.
  - Search blood requests.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, and minimal JavaScript |
| UI Libraries | Bootstrap 5.3.3, Bootstrap Icons, Font Awesome 6, and Google Fonts (Poppins), loaded through CDN |
| Backend | PHP with MySQLi and sessions |
| Database | MySQL or MariaDB |
| Server | Apache through XAMPP, WAMP, or Laragon |

---

## Project Structure

```text
DonorSphere/
├── landing_page.php
├── about_us.php
├── contact_us.php
├── admin_user_option.php
├── donar.php
│
├── db_cofig.php
│
├── donor_register.php
├── donor_login.php
├── donor_forget_password.php
├── donor_dashboard.php
├── donor_profile.php
├── make_a_donation.php
├── donation_history.php
├── contact_support.php
├── bdonor.php
│
├── patient_dashboard.php
│
├── admin_login.php
├── admin_dashboard.php
├── header.php
├── leftbar.php
│
└── images/
```

### Main Files

| File | Purpose |
|---|---|
| `landing_page.php` | Home page |
| `about_us.php` | About page |
| `contact_us.php` | Contact form |
| `admin_user_option.php` | User and Admin role selection |
| `db_cofig.php` | Shared database connection |
| `donor_register.php` | Donor registration |
| `donor_login.php` | Donor login |
| `donor_forget_password.php` | Password reset |
| `donor_dashboard.php` | Donor dashboard and eligibility status |
| `donor_profile.php` | Donor profile management |
| `make_a_donation.php` | Submit donation requests |
| `donation_history.php` | View donor request history |
| `contact_support.php` | Submit support requests |
| `patient_dashboard.php` | Patient dashboard and request counters |
| `admin_login.php` | Admin login |
| `admin_dashboard.php` | Admin dashboard with blood stock and summary cards |
| `header.php` | Admin header fragment |
| `leftbar.php` | Admin sidebar fragment |

**Pages referenced by links but not yet present in the project:**

`patient_register.php`, `patient_login.php`, `patient_profile.php`, `request_blood.php`, `request_history.php`, `patient_notifications.php`, `notification.php`, `logout.php`, `report.php`, `update_profile.php`, `sign_up.php`, `support.php`, `admin/index.php`, and admin management pages referenced in `leftbar.php`, such as `dashboard.php`, `add-bloodgroup.php`, `manage-bloodgroup.php`, and `donor-list.php`.

---

## Database

The database name currently used in the code is `blood donation`, including the space.

The following tables are inferred from SQL queries in the project code. Adjust column types and relationships to match the actual implementation.

| Table | Columns Used in Code |
|---|---|
| `users` | `id`, `fullname`, `email`, `password` |
| `blood_donor` | `donor_id`, `sign_up_id`, `name`, `email`, `contact_no`, `age`, `gender`, `blood_group`, `address`, `message`, `password`, `date_registered` |
| `donation_history` | `donor_id`, `donation_date` |
| `blood_donation_requests` | `request_id`, `donor_id`, `blood_group`, `units`, `donation_type`, `message`, `status`, `date_requested` |
| `patients` | `patient_id`, `full_name`, `email`, `blood_group`, `date_registered` |
| `blood_request` | `email`, `status` (Pending, Approved, or Rejected), and request details |
| `contact_us` | `user_id` (nullable), `name`, `phone`, `email`, `message` |
| `support_requests` | `user_email`, `message` |
| `admin` | `username`, `password` |

### Starter SQL

The following SQL provides a starting point for a database schema. Review the relationships and column names against the existing PHP files before using it.

```sql
CREATE DATABASE IF NOT EXISTS `blood donation`
CHARACTER SET utf8mb4;

USE `blood donation`;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE blood_donor (
    donor_id INT AUTO_INCREMENT PRIMARY KEY,
    sign_up_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    contact_no VARCHAR(20),
    age INT,
    gender ENUM('Male', 'Female', 'Other'),
    blood_group ENUM(
        'A+', 'A-', 'B+', 'B-',
        'O+', 'O-', 'AB+', 'AB-'
    ) NOT NULL,
    address VARCHAR(255),
    message TEXT,
    password VARCHAR(255) NOT NULL,
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sign_up_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);

CREATE TABLE donation_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_id INT NOT NULL,
    donation_date DATE NOT NULL,
    FOREIGN KEY (donor_id)
        REFERENCES blood_donor(donor_id)
        ON DELETE CASCADE
);

CREATE TABLE blood_donation_requests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    donor_id INT NOT NULL,
    blood_group VARCHAR(3) NOT NULL,
    units INT NOT NULL,
    donation_type ENUM(
        'Whole Blood', 'Plasma', 'Platelets'
    ) NOT NULL,
    message TEXT,
    status ENUM(
        'Pending', 'Approved', 'Rejected'
    ) DEFAULT 'Pending',
    date_requested TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (donor_id)
        REFERENCES blood_donor(donor_id)
        ON DELETE CASCADE
);

CREATE TABLE patients (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    blood_group VARCHAR(3),
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE blood_request (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(120) NOT NULL,
    blood_group VARCHAR(3),
    units INT,
    status ENUM(
        'Pending', 'Approved', 'Rejected'
    ) DEFAULT 'Pending',
    date_requested TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE contact_us (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    name VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(120),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(120) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

**Important:** This is starter SQL, not a verified export of the existing database. The project files may expect additional columns or different relationships. In particular, check the patient request structure and the `sign_up_id` relationship before running this script on an existing database.

---

## Installation and Setup

### Prerequisites

- XAMPP, WAMP, or Laragon with PHP 7.4+ or PHP 8.x and MySQL.
- A modern web browser.

### Steps

1. Copy the project into your local web root. For XAMPP, use:

   ```text
   C:\xampp\htdocs\DonorSphere\
   ```

2. Add an `images/` folder containing the logos, banners, and background images used by the pages. Example filenames include `injection-removebg-preview.png`, `banner3.jpg`, and `blood.jpeg`.

3. Open the XAMPP Control Panel and start Apache and MySQL.

4. Open phpMyAdmin at [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

5. Create a database named exactly `blood donation`, then run the starter SQL after checking it against your PHP files.

6. Check the database connection settings. The current project uses settings similar to these:

   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "blood donation";
   ```

   Use these credentials only for a local development environment. Configure secure database credentials for deployment.

7. Create an admin account. The following example uses a placeholder password and must not be used as a production credential:

   ```sql
   INSERT INTO admin (username, password)
   VALUES ('admin', 'your_password');
   ```

   The current admin login implementation may compare plain-text passwords. Update it to use `password_hash()` and `password_verify()` before using this account.

8. Open the application in your browser:

   - Home page: `http://localhost/DonorSphere/landing_page.php`
   - Donor registration: `http://localhost/DonorSphere/donor_register.php`
   - Donor login: `http://localhost/DonorSphere/donor_login.php`
   - Admin login: `http://localhost/DonorSphere/admin_login.php`

---

## How It Works

### Donor Journey

```text
Register
   |
   v
Login
   |
   v
Dashboard
   |
   v
Check Donation Eligibility
   |
   v
Make a Donation
   |
   v
Request Status: Pending
   |
   v
View Donation History
```

### Donation Eligibility Logic

The donor dashboard uses a 56-day interval after the last donation to determine eligibility.

```text
Check Last Donation Date
          |
          v
Donation recorded?
     /         \
   No           Yes
   |             |
   v             v
Eligible    Check days since donation
                 |
                 v
          At least 56 days?
             /       \
           Yes        No
            |          |
            v          v
        Eligible   Not Eligible
                   Donation link
                     disabled
```

The rule must also be enforced on the server-side donation submission page. A disabled link alone is not sufficient protection.

### Patient Journey

```text
Register
   |
   v
Login
   |
   v
Dashboard
   |
   v
View Total, Pending, and Approved Requests
   |
   v
Request Blood
   |
   v
View Request History
```

### Admin Journey

```text
Admin Login
     |
     v
Admin Dashboard
     |
     v
View Blood Stock and Summary Information
     |
     v
Manage Donors, Blood Groups, and Requests
```

---

## Current Status and Known Issues

The project is currently in progress. The following status is based on the files and implementation details available for the project.

### Implemented or Present

- Public website pages.
- Donor registration and login.
- Donor password reset.
- Donor dashboard.
- Donor profile updates.
- Donation request submission.
- Donation history.
- Contact form.
- Patient dashboard counters.
- Admin login.
- Admin dashboard interface.

The presence of a page does not necessarily mean that every feature has been fully tested.

### Needs Completion or Improvement

- Patient registration, login, profile, blood request, and request history pages.
- Logout, notifications, and report pages.
- The admin dashboard currently uses hard-coded summary values instead of live database data.
- Admin sidebar items and the Logout button are not fully linked.
- Admin management pages for donor lists, blood requests, approval and rejection, blood stock, and contact queries.
- `contact_support.php` submits to `support.php`. Check the form action and file names to ensure they match.
- `contact_support.php` needs `session_start()` before accessing `$_SESSION['user_email']`, if that session value is required.
- `donor_profile.php` displays `date_registered` as the last donation date. These dates represent different information and should be stored and displayed separately.
- `donation_history.php` reads requests from `blood_donation_requests`, while the dashboard reads the last donation date from `donation_history`. Establish a consistent source of truth for completed donations.
- Database naming differs between files: most files use `blood donation`, while `db_cofig.php` uses `Blood Donation`. Database name case sensitivity can differ by operating system. Consider a consistent name such as `blood_donation`.
- The filename `db_cofig.php` appears to contain a spelling mistake. Consider renaming it to `db_config.php` and updating every reference.
- The filename `donar.php` could be renamed to `donor.php` for consistency.
- Centralize database connection settings instead of repeating credentials in multiple PHP files.
- The 56-day eligibility rule and minimum age of 18 are not fully enforced on the server in the current implementation.
- The landing page contains sample donor information and placeholder text such as "High professional doctors".

---

## Security Recommendations

Address these issues before deploying the application publicly.

1. **Secure admin login:** Avoid plain-text password comparisons and SQL queries built by concatenating user input. Store password hashes with `password_hash()` and verify them with `password_verify()`. Use prepared statements.

2. **Secure password reset:** A password must not be reset by someone who only knows the donor's email. Use a verified email link or OTP with an expiring, single-use token.

3. **Use prepared statements:** Replace string-built SQL queries with prepared statements throughout registration, login, contact forms, password reset, and support requests.

4. **Escape output:** Use `htmlspecialchars()` when displaying user-provided values, such as donor names and messages, to reduce cross-site scripting risks.

5. **Protect admin pages:** Check the admin session in `admin_dashboard.php` and all other protected admin pages. Redirect unauthenticated users to `admin_login.php`.

6. **Secure sessions and forms:** Call `session_regenerate_id(true)` after successful login and implement CSRF tokens for state-changing forms.

7. **Secure database credentials:** Do not use the MySQL `root` account with an empty password outside local development.

8. **Validate user input:** Enforce server-side validation for phone numbers, age, units, blood groups, and other submitted fields.

9. **Enforce eligibility on the server:** Verify donor age and the donation interval before accepting a donation request. A client-side disabled button is not enough.

10. **Restrict access to personal information:** Ensure donors, patients, and admins can only access records permitted by their roles.

---

## Roadmap

- [ ] Complete patient registration, login, profile, blood request, and history pages.
- [ ] Connect the admin dashboard to live database data.
- [ ] Add admin approval and rejection for blood and donation requests.
- [ ] Update blood stock automatically when donations are approved and recorded as completed.
- [ ] Add notifications for donors and patients.
- [ ] Search for donors by blood group and city.
- [ ] Send email or SMS alerts for urgent blood requests.
- [ ] Generate PDF and Excel reports.
- [ ] Improve authentication, input validation, and session security.
- [ ] Test all modules and fix broken links.

---

## License

This project is intended for educational purposes. 

---

**DonorSphere — Every drop counts.**
