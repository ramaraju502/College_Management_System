# 🎓 College Management System – PHP & MySQL

A responsive web application designed to streamline academic and administrative operations in a college environment. Built with PHP, MySQL, Bootstrap, and Tailwind CSS.

## 🔧 Features

- **Admin Panel** to manage courses, students, teachers, and subjects  
- **Student Registration** with secure login and profile management  
- **Course Management** for adding/editing course details, duration, fees, etc.  
- **Result Management** including result publishing and Excel-based marksheet uploads  
- **Dynamic Marksheet Viewer** with printable Bootstrap output  
- **Secure Authentication** using OpenSSL encryption  
- **Responsive UI** using Bootstrap and Tailwind for clean user experience  

## 🛠️ Technologies Used

- PHP, MySQL  
- HTML, CSS, JavaScript  
- Bootstrap & Tailwind CSS  
- PHPExcel (for Excel import/export)  

## 📦 Use Case

Ideal for small to medium colleges looking to digitize and automate student records, results, and academic administration.

## 🚀 How to Run

1. Clone the repository  
2. Import the database from the `database` folder into phpMyAdmin  
3. Configure database credentials in the `config.php` file  
4. Run the project on XAMPP or any local server environment  

## 📂 Folder Structure

- `admin/` – Admin panel dashboard and features  
- `student/` – Student login and results section  
- `uploads/` – For storing uploaded Excel files  
- `css/`, `js/`, `assets/` – Frontend assets  

## 🔒 Security Note

- User passwords are encrypted using OpenSSL before storing  
- All file uploads are validated for size and type  

## 📬 Contact

For questions or feedback, please reach out to [ramarajumatle@gmail.com](mailto:ramarajumatle@gmail.com)
