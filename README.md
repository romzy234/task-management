### README for Task Management System

---

# Task Management System

This is a simple task management system built with Laravel that allows users to:

- Log in and manage tasks.
- Create, update, and delete tasks.
- Mark tasks as completed or pending.
- Filter tasks by status.

---

## Features

1. **Authentication**: Secure login using Laravel Breeze.
2. **Task Management**: Perform CRUD operations on tasks.
3. **Filtering**: View tasks based on their status (all, pending, or completed).
4. **Responsive Design**: Uses Tailwind CSS for styling.
5. **Authorization**: Ensures only the task owner can edit or delete a task.

---

## Installation Guide

### 1. **Requirements**
- PHP 8.1 or higher
- Composer
- Node.js
- Herd (for local server and PHP management)
- DBngin (for local database management)

---

### 2. **Setup Steps**

#### A. Install Herd and DBngin

1. **Install Herd**:
   - Download and install Herd from [herd.dev](https://herd.dev/).
   - Run the following command to verify the installation:
     ```bash
     herd --version
     ```

2. **Install DBngin**:
   - Download and install DBngin from [dbngin.com](https://dbngin.com/).
   - Open DBngin and set up a MySQL database (e.g., `task_management`).

#### B. Set Up the Project

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd task-management
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Copy the `.env` file:
   ```bash
   cp .env.example .env
   ```

5. Update the `.env` file:
   - Set your database details:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=task_management
     DB_USERNAME=root
     DB_PASSWORD=
     ```

6. Run the database migrations:
   ```bash
   php artisan migrate
   ```

7. Seed the database (optional):
   ```bash
   php artisan db:seed
   ```

8. Build the assets:
   ```bash
   npm run dev
   ```

9. Start the development server:
   ```bash
   php artisan serve
   ```

#### C. Using Herd and DBngin Together
- Herd automatically detects your PHP environment, so you can use `php artisan` commands seamlessly.
- Use DBngin to manage your MySQL server and database.

---

## Usage

1. **Access the Application**:
   - Navigate to `http://127.0.0.1:8000` in your browser.

2. **Log In**:
   - Use the authentication system to log in (register a new account if needed).

3. **Manage Tasks**:
   - Create, edit, delete, and filter tasks using the user-friendly interface.

---

## Development

1. **Testing**:
   - Run tests using:
     ```bash
     php artisan test
     ```

2. **Assets**:
   - Rebuild assets during development:
     ```bash
     npm run dev
     ```

3. **Documentation**:
   - Add your notes or API endpoints in the `README.md`.

---

## Troubleshooting

- **Database Connection Issues**:
  - Ensure DBngin is running and the `.env` file has the correct database credentials.

- **Herd Issues**:
  - Check PHP settings using `herd status`.

---

## License

This project is licensed under the [MIT License](LICENSE).

