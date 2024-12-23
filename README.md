```markdown
# AJAX CRUD Application

This project demonstrates a basic **CRUD (Create, Read, Update, Delete)** application using **PHP**, **AJAX**, and **MySQL**. The application allows users to interact with student records, which include the student's first name (`fname`), last name (`lname`), class, and section.

---

## Features

- **Create** new student records
- **Read** student records from the database
- **Update** student records
- **Delete** student records

---

## Technologies Used

- PHP
- MySQL
- AJAX
- XAMPP (for local server setup)
- HTML, CSS, JavaScript

---

## Setup Instructions

Follow these steps to set up the project locally:

### 1. Clone or Download the Repository

If you're working with a repository, you can clone it using the following command:

```bash
git clone https://github.com/DhruvKaura/AJAX-CRUD.git
```

Alternatively, you can download the ZIP file and extract it into your local directory.

### 2. Set Up the Database

#### 2.1. Open phpMyAdmin
- Go to [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/) in your browser.
- Log in using the default MySQL credentials (`root` with no password if you're using XAMPP).

#### 2.2. Create the Database
- Click on the **Databases** tab.
- In the "Create database" field, enter the name `ajax_crud` (or another name if you prefer).
- Click on the **Create** button.

#### 2.3. Create the Table
- Select the `ajax_crud` database from the left sidebar.
- Use the following SQL to create a `students` table:

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(100) NOT NULL,
    lname VARCHAR(100) NOT NULL,
    class VARCHAR(50) NOT NULL,
    section VARCHAR(10) NOT NULL
);
```

#### 2.4. Insert Sample Data (Optional)
You can insert some sample records into the `students` table using the following query:

```sql
INSERT INTO students (fname, lname, class, section)
VALUES 
('John', 'Doe', '10', 'A'),
('Jane', 'Smith', '12', 'B');
```

---

### 3. Set Up XAMPP and Configure PHP

- Install **XAMPP** if you haven't already. [Download XAMPP](https://www.apachefriends.org/index.html).
- Start the **Apache** and **MySQL** services from the XAMPP Control Panel.
- Move your project folder (`AJAXCRUD`) to the `htdocs` directory inside the XAMPP installation folder (typically located at `C:\xampp\htdocs`).

---

### 4. Access the Application

Once everything is set up, open your browser and visit the following URL:

```bash
http://localhost/AJAXCRUD
```

This should load your CRUD application, allowing you to interact with the student records.

---

## Example of `read.php` (provided code)

Here is an example of how you can use PHP and MySQL to read data from the database and return it in JSON format for your AJAX request:

```php
<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax_crud');
$query = "SELECT * FROM students";

$result = mysqli_query($conn, $query);
$result_array = [];

if(mysqli_num_rows($result) > 0){
    foreach($result as $rows){
        array_push($result_array, $rows);
    }

    header("Content-type: application/json");
    echo json_encode($result_array);
} else {
    echo "No records found";
}
?>
```

This script connects to the MySQL database and retrieves the data from the `students` table, returning it as a JSON response.

---

## Troubleshooting

- **Database Connection Issues:** Make sure your MySQL server is running, and the database name, username, and password in the PHP code are correct.
- **404 Errors:** Ensure the project is inside the `htdocs` folder if you're using XAMPP and you're accessing it via `http://localhost/your-folder-name`.
```

### Steps to Ensure the README is Displayed Properly on GitHub:

1. **Ensure the File is Named `README.md`**: Make sure your README file is named exactly `README.md` (case-sensitive). GitHub will automatically render it if it's named this way.
   
2. **Use Markdown Syntax**: GitHub uses Markdown for rendering `.md` files. Ensure that your README file is written in proper Markdown syntax (like the one above).
   
3. **Push the File to GitHub**: Once you've updated your `README.md`, make sure you push it to your GitHub repository:
   
   ```bash
   git add README.md
   git commit -m "Updated README"
   git push origin main
   ```

