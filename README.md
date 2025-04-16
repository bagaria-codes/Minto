# Minto - Personal Finance Tracker


https://github.com/user-attachments/assets/f68c4cef-6c99-490a-a924-9865993361c9


Minto is a web-based personal finance tracker designed to simplify money management for users. With an intuitive interface, real-time data visualization, and goal-setting features, Minto empowers users to take control of their finances in a fun and manageable way.

## Table of Contents

- [About the Project](#about-the-project)
  - [Motivation](#motivation)
  - [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Video Walkthrough](#video-walkthrough)
- [Contact](#contact)

---

## About the Project

### Motivation

Managing personal finances can be overwhelming, especially for beginners. Our team developed **Minto** to address this challenge by creating a clean, aesthetically pleasing, and user-friendly web application. The goal is to help users track income and expenses, set savings goals, visualize financial data through charts, and receive motivational quotes to encourage consistent budgeting.

### Features

- **Dashboard Overview**: Get a quick summary of your financial health, including income, expenses, and savings.
- **Trackers**: Add, update, and delete income and expense transactions.
- **Budget Management**: Set monthly budgets and track spending in various categories.
- **Goal Setting**: Define short-term and long-term financial goals with progress tracking.
- **Data Visualization**: Interactive charts using Chart.js to visualize income, expenses, and savings trends.
- **Learn Section**: Access curated financial literacy resources via embedded YouTube videos.
- **Dynamic Quotes**: Motivational financial quotes fetched from the Quotable API.
- **Responsive Design**: Fully mobile-responsive UI built with Bootstrap 5.

---

## Tech Stack

Minto is built using the following technologies:

- **Frontend**:
  - HTML, CSS, JavaScript
  - Bootstrap 5 for responsive design
  - Chart.js for data visualization
  - jQuery for DOM manipulation and AJAX requests
- **Backend**:
  - PHP for server-side scripting
  - MySQL for database management
- **Development Tools**:
  - XAMPP for local development environment
  - phpMyAdmin for database management
- **APIs**:
  - Quotable API for dynamic quotes
  - YouTube API for embedding educational videos

---

## Installation

To set up Minto locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/bagaria-codes/minto.git
   cd minto
   ```

2. **Set Up XAMPP**:
   - Install [XAMPP](https://www.apachefriends.org/index.html).
   - Start the Apache and MySQL services from the XAMPP Control Panel.

3. **Configure the Database**:
   - Open phpMyAdmin (`http://localhost/phpmyadmin`).
   - Create a new database named `minto`.
   - Import the SQL file located in the `database/` folder into the `minto` database.

4. **Update Configuration**:
   - Navigate to the `db_connect.php` file in the project root.
   - Update the database credentials (host, username, password, and database name) as needed.

5. **Run the Application**:
   - Place the project folder inside the `htdocs` directory of XAMPP.
   - Access the app in your browser at `http://localhost/minto`.

---

## Usage

Once the application is running, you can:

- **Sign Up**: Create a new account to start managing your finances.
- **Add Transactions**: Log income and expenses under different categories.
- **Set Goals**: Define financial goals and track your progress.
- **Analyze Data**: Use interactive charts to understand your spending patterns.
- **Learn**: Explore curated financial literacy resources on the Learn page.

---

## Video Walkthrough

Here's a quick walkthrough of Minto in action:

https://github.com/user-attachments/assets/1935407b-5cf4-4255-bacc-98babae73e39

Watch the video above to see how Minto helps you track income, expenses, set goals, and manage your finances effectively.


---

## Contact

For questions, feedback, or collaboration opportunities, feel free to reach out:
- **Email**: khushibagariaa@gmail.com

