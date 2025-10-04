# Online_College_examination_System
•	Developed an efficient Online Examination System enabling students to seamlessly submit exam forms and undergo verification
•	The system will empower the exam section with features like exam block scheduling, supervisor allocation and automated generation of e-notices and exam timetables for students, streamlining the entire examination process.
•	Technologies: HTML, CSS, JavaScript, PHP, MySQL.


**Author:** Vedang Bhagare  
**Contact:** vedang.24.bhagare@gmail.com  

## Motivation & Purpose

Managing examinations manually is time-consuming and error-prone — coordinating exam dates, invigilators, student lists, room assignments, and notifications can be chaotic, especially at scale. This system automates many of those tasks:

- Students can submit exam registration forms online.  
- Admin/Exam Section can approve/reject forms and assign blocks.  
- Supervisors are assigned automatically.  
- Exam timetables and e-notices are generated and distributed.  
- Audit trails help track changes.  

This yields faster turnaround, fewer mistakes, and a more scalable process.

---

## Features

- **Student Module**:  
  – Register / login  
  – Fill and submit exam application / form  
  – View exam schedule, status, notifications  

- **Exam Section / Admin Module**:  
  – Review student form submissions (approve / reject)  
  – Create & schedule exam blocks  
  – Assign supervisors to exam blocks  
  – Generate exam timetables & e-notices  
  – Oversee and audit system actions  

- **Supervisor Module**:  
  – Login and view assigned invigilation blocks  
  – Monitor student attendance / verify identity  

- **Notification System**:  
  – Send e-notices / updates to students & staff  
  – Email integration (if configured)  

- **Reports & Logs**:  
  – Track actions (who approved, when)  
  – Downloadable reports (if needed)  

---

## Architecture & Technologies

| Layer / Component   | Technology / Tool        |
|---------------------|--------------------------|
| Frontend UI         | HTML, CSS, JavaScript    |
| Backend / Server     | PHP                      |
| Database             | MySQL                    |
| Web Server            | Apache / LAMP / XAMPP    |
| (Optional) Email     | PHP mail / SMTP library   |

The system follows a standard web app architecture: user interface → backend controllers → database. Authentication and role-based access (student, admin, supervisor) are enforced in server logic.

---

## Setup & Installation

> **Prerequisites:**  
> - PHP (version 7.x or higher)  
> - MySQL (or MariaDB)  
> - Web server like Apache (or bundled in XAMPP / WAMP / LAMP)  

1. Clone this repository  
   ```bash
   git clone https://github.com/VedangBhagare/Online_College_examination_System.git
   cd Online_College_examination_System
   ```
2. Import the provided SQL file

3. Launch the server
   http://localhost/Online_College_examination_System/

Usage / Demo

Below is a sample walkthrough:

Student Perspective
  – Register / login → Fill exam registration form → Submit → Wait for approval
  – Once approved, student can view exam block assignment, timetable, and notifications.

Admin / Exam Section Perspective
  – Log in → Review pending student exam forms → Approve / reject → Create exam blocks → Assign supervisors
  – Generate and distribute exam timetables and e-notices.

Supervisor Perspective
  – Log in → See assigned invigilation blocks → Confirm attendance / verify students.


