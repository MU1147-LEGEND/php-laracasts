# PHP CRUD Practice

Small Laravel-inspired PHP CRUD practice app that manages posts and authors with a simple PDO wrapper, server-rendered views, and a minimal auth check. The code is intentionally lightweight to focus on fundamentals: routing via flat PHP files, prepared statements, and basic validation.

---

## How to Run
- Create a MySQL database (default name: `phpcrud`).
- Update credentials in `configs/config.php` if needed.
- Seed `authors` and `posts` tables (structure implied by queries: `authors(id, name, email)`, `posts(id, title, description, author_id)`).
- Serve the project root with PHP’s built-in server: `php -S localhost:8000` and open `http://localhost:8000`.

---

## File Responsibilities
- `configs/config.php` — Database connection settings.
- `src/models/Database.php` — PDO wrapper with `query()`, `get()`, `find()` helpers.
- `src/models/Validator.php` — Simple string/email validators.
- `utils/helper.php` — `dd()` helper and `User` stub for login checks.
- `fetch_posts.php` — Fetch all posts for the current user.
- `fetch_authors.php` — Fetch all authors.
- `src/controllers/post-create.php` — Handle create + delete actions from `index.php`.
- `src/controllers/post-get.php` — Load a single post (and its author) for detail/edit views.
- `src/controllers/post-update.php` — Validate and update an existing post.
- `index.php` — List posts, create form, and inline delete.
- `views/post.view.php` — Single post detail view with author contact link.
- `views/edit.view.php` — Edit form posting to the update controller.
- `styles.css` — Global styling.

---

## What I Learned & Implemented (File-by-File)

### `configs/config.php` — Centralized DB Config
- Keeping connection settings (host/port/dbname/charset) in one place.
- Why `utf8mb4` is the right default for full Unicode support.

### `src/models/Database.php` — Minimal PDO Wrapper
- Building a DSN via `http_build_query` and configuring default fetch mode.
- Using prepared statements (`prepare` + `execute`) to avoid SQL injection.
- Returning `$this` from `query()` to chain into `get()`/`find()`.

### `src/models/Validator.php` — Input Validation
- Normalizing input with `trim` before length checks.
- Simple boundary enforcement for titles/descriptions; email validation via `filter_var`.

### `utils/helper.php` — Helpers & Login Check
- Quick `dd()` for debugging.
- `User` stub to simulate authentication and gate create/delete actions.

### `index.php` — List/Create/Delete
- Rendering posts for the current user and escaping output with `htmlspecialchars`.
- Handling create and inline delete submissions through `post-create.php`.
- Guarding creation with a login check (`User::isLoggedIn()`).

### `src/controllers/post-create.php` — Create/Delete Logic
- Validating POST data before insert; collecting errors for re-render.
- Inserting with bound params and redirecting after success.
- Deleting by id with a login guard and redirect to home.

### `src/controllers/post-get.php` — Fetch Single Post
- Reading `$_GET['id']`, redirecting when missing, and handling not-found cases.
- Loading the related author for display on the detail page.

### `src/controllers/post-update.php` — Update Flow
- Grabbing the post id from the query string and short-circuiting when absent.
- Validating title/description before issuing an UPDATE.
- Protecting against missing records with a not-found guard.

### `views/post.view.php` — Detail Page
- Displaying a single post with uppercase title styling.
- Linking to edit and providing a mailto link for the author.

### `views/edit.view.php` — Edit Form
- Pre-filling fields with current post data.
- Submitting updates to the controller using the query-string id.

---

## Core Skills Practiced
- PHP + HTML server-side rendering
- PDO connections, prepared statements, and parameter binding
- Simple validation and error messaging
- **Basic CRUD flow (list, create, read, update, delete)**
- Guarding actions behind a login check
- Organizing code by concerns (config, models, controllers, views, helpers)

---

## Future Improvements
### I will - 
- **add real authentication and authorization.**
- Centralize routing instead of using file-based endpoints.
- Improve error handling and user feedback on failures.
- Add CSRF protection for form submissions.
- Extract shared layout/header/footer for cleaner views.
