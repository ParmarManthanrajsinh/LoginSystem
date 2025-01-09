# LoginSystem

This repository contains a basic login system implemented in PHP and styled with Bootstrap. The system includes functionalities for user registration, login, logout, and user information updates.

## Getting Started

### Cloning the Repository
Clone the repository to your local machine:
```bash
git clone https://github.com/ParmarManthanrajsinh/LoginSystem.git
```

### Setting Up the Environment
1. **Navigate to the Project Directory:**
   ```bash
   cd LoginSystem
   ```

2. **Run a PHP Server:**
   Ensure you have a PHP server running. You can use XAMPP, WAMP, or any other PHP server of your choice.

3. **Place the Project in the Server's Root Directory:**
   Copy the project folder to your server's root directory (e.g., `htdocs` for XAMPP).

4. **Start the Server and Open the Project in Your Browser:**
   Navigate to:
   ```
   http://localhost/LoginSystem
   ```

## Features
- **Sign Up:** Create a new account by navigating to the signup page and filling out the registration form.
- **Log In:** Log in with your credentials to access the protected areas of the system.
- **Update Information:** Update your user information through the update form after logging in.
- **Log Out:** Click the logout button to end your session.

## Project Structure
```plaintext
.vscode/           Contains settings for Visual Studio Code.
components/        Contains reusable PHP components.
uploads/           Directory for storing uploaded files.
Insert_form.php    Script for handling form submissions for new data insertion.
Update_form.php    Script for updating user information.
home.php           Home page after successful login.
login.php          Login page.
logout.php         Script to handle user logout.
signup.php         Registration page.
style.css          Contains the CSS for styling the pages, including Bootstrap overrides if any.
users.sql          Export SQL file for setting up database
```

## Database Setup
### Database Name: `users`

#### Table 1: `users`
| Field     | Type   | Null | Key | Default | Extra          |
|-----------|--------|------|-----|---------|----------------|
| id        | int    | NO   | PRI | NULL    | auto_increment |
| username  | text   | NO   |     | NULL    |                |
| password  | text   | NO   |     | NULL    |                |

#### Table 2: `student`
| Field       | Type     | Null | Key | Default | Extra          |
|-------------|----------|------|-----|---------|----------------|
| id          | int      | NO   | PRI | NULL    | auto_increment |
| user_id     | int      | NO   |     | NULL    |                |
| first_name  | text     | NO   |     | NULL    |                |
| last_name   | text     | NO   |     | NULL    |                |
| dob         | date     | NO   |     | NULL    |                |
| gender      | text     | NO   |     | NULL    |                |
| city        | tinytext | NO   |     | NULL    |                |
| img_name    | text     | NO   |     | NULL    |                |

## Usage Instructions
1. **Sign Up:**
   Navigate to the signup page and create a new account.

2. **Log In:**
   Use your credentials to log in.

3. **Update Information:**
   Once logged in, update your information via the update form.

4. **Log Out:**
   Click the logout button to securely end your session.

## Contributing
Contributions are welcome! Please follow these steps:
1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes and submit a pull request.

Feel free to create an issue if you encounter any problems or have suggestions for improvements.

---
Modify this template as needed to reflect specific project details or additional features.

