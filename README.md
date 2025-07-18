# 🎓 School Management System (Laravel-based)

A comprehensive bilingual school management system built with **Laravel**, designed to manage the full academic lifecycle from **admission to graduation**.  
The system supports multiple user roles (Admin, Teacher, Student, Parent) and includes modules for academics, finances, transportation, library, real-time communication, and more.

---

## 🔍 System Overview

The system is organized around 4 main user roles:

- 👨‍🏫 **Admin** – Full system control: manages grades, classes, books, users, fees, and school-wide settings.
- 👩‍🏫 **Teacher** – Handles assigned students, records grades, marks attendance, schedules online classes.
- 👨‍🎓 **Student** – Views timetable, results, attendance, books, fees, and notifications.
- 👨‍👧‍👦 **Parent** – Monitors student’s academic performance and financial dues.

---

## 🚦 Workflow Highlights

1. 🎓 **Academic Structure**:  
   - The system begins with **student enrollment** by grade (e.g., Grade 1, Grade 2, etc.).
   - Each student has a **profile** with full details: name, birthdate, address, blood type, nationality.

2. 📚 **Library Module**:  
   - Lists school books by grade.
   - Teachers and students can access resources directly.

3. 📅 **Zoom Integration**:  
   - Teachers can schedule and conduct online classes using Zoom.
   - Students can join via secure links.

4. 📝 **Grades & Assessments**:  
   - Teachers record grades for students.
   - Students and parents can view exam results and academic standing.

5. 💳 **Financial Management**:  
   - Students/Parents can:
     - Pay school fees online
     - Book transportation (bus)
     - Register for trips or school activities
   - Admins can track all payments and dues.

6. 🚌 **Transport Management**:  
   - Assign students to buses.
   - Manage routes, fees, and drivers.

7. 📢 **Real-Time Notifications**:  
   - Students, parents, and teachers receive instant alerts via email and in-app notifications (using Laravel broadcasting).

8. 🌐 **Multilingual Support**:  
   - Full Arabic 🇸🇦 and English 🇬🇧 interface for all users.

---

## 🧑‍💻 Tech Stack

| Layer        | Technology               |
|--------------|---------------------------|
| Backend      | Laravel (PHP Framework)   |
| Frontend     | Blade Templates, Bootstrap, jQuery |
| Realtime     | Laravel Echo + WebSockets / Pusher |
| Database     | MySQL                     |
| Auth         | Laravel Breeze (roles system) |
| Video Calls  | Zoom API Integration      |
| Multilingual | Laravel Localization      |

---

## 🚀 Getting Started

### 1. Clone the Project
```bash
git clone https://github.com/mo7amedshaban/school-management-system.git
cd school-management-system
```
2. Install PHP Dependencies
```bash

composer install
```

3. Install Frontend Assets (Optional if using Laravel Mix)
```bash

npm install && npm run dev
```
4. Configure Environment Variables
```bash

Duplicate .env.example file and rename it to .env

Update your database credentials:

DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```
5. Generate Application Key
```bash


php artisan key:generate
```
6. Run Database Migrations
```bash

php artisan migrate
php artisan db:seed
```
8. Serve the Application Locally
```bash

php artisan serve

Then open your browser and go to:
http://127.0.0.1:8000
```

