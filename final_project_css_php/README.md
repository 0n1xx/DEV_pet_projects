# Marketplace of iPods:

## Description:
- The project is a dynamic website which has been built using PHP, MySQL, HTML and CSS.
- It consists of two sides:
    - Public view: the client can see what is on the website, can open a separated product card;
    - Backend view (admin): allows admins to add new products, customize existing ones;

## Technologies:
- Frontend: HTML, CSS
- Backend: PHP (templating, sessions, CRUD)
- Database: MySQL (admin and product tables)
- Version Control: Git & GitHub

## Approximate Project Structure:
```
/project
│
├── /uploads
│
├── /css
│   ├── style.css
│
│
│── /templates
│   ├── header.php
│   ├── footer.php
│
│── /logo_image
│  
│
├── /includes
│   ├── database.php
│   ├── config.php
│   └── auth.php (I assume it should be a separated file)
│
├── /admin
│   ├── crud.php
│   ├── login.php (Not sure if login/logout should be in a separated file)
│   └── logout.php
│
├── index.php
├── about.php
├── shop.php
├── product.php
├── contact.php
└── register.php
```

## Database Schema (Suggested)

Table: `admin_users`

| Field | Type | Constraints | Description |
|--------|------|-------------|--------------|
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each admin |
| `name` | VARCHAR(100) | NOT NULL | Admin's full name |
| `email` | VARCHAR(100) | UNIQUE, NOT NULL | Used for login |
| `password` | VARCHAR(255) | NOT NULL | Hashed password |


Table: `products_description`

| Field | Type | Constraints | Description |
|--------|------|-------------|--------------|
| `product_id` | INT | PRIMARY KEY, AUTO_INCREMENT | Unique product ID |
| `name` | VARCHAR(150) | NOT NULL | Product name |
| `description` | TEXT | NULL | Product description |
| `price` | DECIMAL(10,2) | NOT NULL | Product price |
| `image` | VARCHAR(255) | NOT NULL | Image file path or URL |

## Project Realisation (Solo Version)

### Developer
- **Role:** Full-Stack (Backend + Frontend + Design)
---

### Phase 1 – The Checkup (Due: November 11)

#### Week 1 — Nov 7 → Nov 11
- Set up GitHub repository and full folder structure (`/assets`, `/includes`, `/admin`, etc.).
- Create `header.php` and `footer.php` includes and test them across all pages.
- Build and style all public pages in HTML/CSS (`index.php`, `about.php`, `shop.php`, `contact.php`, `register.php`).
- Design and create SQL schema (`admins`, `products` tables) in phpMyAdmin.
- Apply color palette and at least two fonts (headings + body).
- Ensure all pages are responsive for mobile, tablet, and desktop.
- Write a short setup section in `README.md` (local server setup, DB import).
- Test database and template includes locally.

**Deliverables by Nov 11**
- GitHub repo + README.md (created)
- All pages built and styled
- Header/footer templating working
- Database schema tested locally
---

### Phase 2 – Final Submission (Due: December 12)

#### Week 2 — Nov 12 → Nov 20
- Create `/includes/db.php` (Database Connection Class).
- Implement CRUD logic for `products` and `admins`.
- Add user registration with hashed passwords.
- Refine CSS layouts to match backend includes.
- Style admin dashboard and improve forms and product visuals.

#### Week 3 — Nov 21 → Nov 27
- Implement login/logout using PHP sessions.
- Protect admin pages with session checks.
- Build admin product management table (read/update/delete).
- Style login/register pages and admin dashboard.
- Add hover effects, animations, and ensure design consistency.

#### Week 4 — Nov 28 → Dec 4
- Connect frontend shop/product pages to the database (dynamic content).
- Debug and validate all forms.
- Test dynamic pages visually and adjust layout.
- Add polish: CTAs, banners, shadows, filters, and transitions.

#### Week 5 — Dec 5 → Dec 10
- Finalize CRUD and session logic.
- Clean up database interactions and perform validation.
- Conduct full CSS polish and responsive testing on all devices.
- Add accessibility improvements and visual tweaks.

#### Week 6 — Dec 11 → Dec 12
- Merge and finalize all project files.
- Conduct full integrated testing (frontend + backend).
- Update `README.md` with complete setup instructions and screenshots.
- Deploy to Georgian College server and confirm full functionality.
- Submit GitHub link and live server URL by **December 12**.
---