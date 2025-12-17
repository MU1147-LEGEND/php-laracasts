
### File Responsibilities

- **config.php** → Database configuration
- **Database.php** → PDO database connection and query handler
- **fetch_posts.php** → Fetch all posts from the database
- **index.php** → List posts and add new posts
- **post.php** → View a single post by ID
- **post-create.php** → Reserved for database actions (insert)
- **post-delete.php** → Reserved for database actions (delete)
- **post-update.php** → Reserved for database actions (update)

---

## What I Learned & Implemented (File-by-File)

### `config.php` — Database Configuration

In this file, I stored all database connection details such as host, port, database name, and charset in one centralized configuration array.

**What I learned:**
- How to separate configuration from application logic
- Why `utf8mb4` is important for full Unicode support
- How centralized configuration improves maintainability

---

### `Database.php` — PDO Database Wrapper

I created a reusable `Database` class to handle database connections and queries using PDO.

**What I learned:**
- How to create a PDO connection using a DSN string
- How to set default fetch mode with `PDO::FETCH_ASSOC`
- How to write a reusable `query()` method
- How prepared statements (`prepare` + `execute`) protect against SQL injection
- How to reuse a single database connection across the project

---

### `fetch_posts.php` — Fetching Multiple Records

This file is responsible for fetching all posts from the database using a SELECT query.

**What I learned:**
- How to execute SELECT queries using PDO
- The difference between:
  - `fetchAll()` → fetches multiple rows
  - `fetch()` → fetches a single row
- How database results are returned as associative arrays

---

### `index.php` — Listing Posts & Creating New Posts

This is the main page of the project.

#### Listing Posts
- I dynamically displayed all posts using PHP inside HTML.

#### Creating a Post
- I added an HTML form to submit new post titles.
- This helped me understand:
  - How HTML forms send data to PHP
  - How user input is handled on the server side
  - The general flow of inserting data into a database using prepared statements

---

### `post.php` — Viewing a Single Post

This file displays a single post based on its ID passed through the URL.

**What I learned:**
- How to read query parameters like `?id=1`
- How to safely pass dynamic values into SQL queries
- How to fetch a single record using `fetch()`
- How to create a simple detail page for a resource

---

### `db_action.php` — Action Layer Concept

This file is currently empty but represents the idea of separating database actions from UI pages.

**What I learned:**
- Why insert, update, and delete logic should be separated from presentation logic
- How separating concerns improves code readability and scalability

---

## Core Skills I Practiced

- PHP fundamentals
- PDO database connections
- Prepared statements & parameter binding
- Fetching data from MySQL
- **Basic CRUD architecture**
- PHP + HTML server-side rendering
- Code organization and separation of concerns

---


## Future Improvements

- Add validation and error handling
- Implement Edit and Delete functionality
- Move database credentials to environment variables
- Improve project structure further
