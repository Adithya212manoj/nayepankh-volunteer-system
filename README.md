=> NayePankh Volunteer Engagement & Event Management Portal

->Project Overview

NayePankh is a web-based Volunteer Engagement and Event Management Portal developed using PHP and MySQL. The system allows volunteers to register, manage their profiles, browse events, and participate in volunteering activities. Administrators can manage volunteers, create events, monitor participation, and generate reports.

---

->Technologies Used

* PHP
* MySQL
* HTML
* CSS
* Bootstrap 5
* JavaScript
* XAMPP

---

--> Features

-> Public Module

* Homepage
* Volunteer Registration
* Volunteer Login

-> Volunteer Module

* Login and Logout
* Volunteer Dashboard
* View Profile
* Edit Profile
* Upload Profile Picture
* Browse Upcoming Events
* Join Events
* View Joined Events

-> Admin Module

* Admin Login and Logout
* Dashboard with Statistics
* Volunteer Management
* Search Volunteers
* Approve / Deactivate Volunteers
* View Volunteer Details
* Event Management
* Create Events
* View Event Participants
* Reports and CSV Export

---

--> Installation Guide

1. Clone or Download the Project

Place the project folder inside:

C:\xampp\htdocs\

2. Start XAMPP

Start the following services:

* Apache
* MySQL

3. Import the Database

1. Open phpMyAdmin.
2. Create a database named:

```
nayepankh
```

*. Click **Import**.
*. Select the provided SQL file (`nayepankh_volunteer_db.sql`).
*. Click **Go**.

4. Configure Database Connection

Open:

```
config/db.php
```

Update the database credentials if required.

5. Run the Project

Open your browser and visit:

Public Website:

```
http://localhost/nayepankh-volunteer-system/
```

Admin Login:

```
http://localhost/nayepankh-volunteer-system/admin/login.php
```

Volunteer Login:

```
http://localhost/nayepankh-volunteer-system/volunteer/login.php
```

---

## Demo Admin Credentials

Email:

```
admin@nayepankh.org
```

Password:

```
admin123
```

**Note:** Replace these with the actual admin credentials stored in  database.

---

## Project Structure

```
admin/
volunteer/
assets/
config/
includes/
uploads/
index.php
nayepankh.sql
README.md
```

---

