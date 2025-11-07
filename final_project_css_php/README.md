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
├── /assets
│   ├── /uploads
│
├── /css
│   ├── style.css
│
├── /includes
│   ├── header.php
│   ├── footer.php
│   ├── database.php
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

Table: `admins`

| Field | Type | Constraints | Description |
|--------|------|-------------|--------------|
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each admin |
| `name` | VARCHAR(100) | NOT NULL | Admin's full name |
| `email` | VARCHAR(100) | UNIQUE, NOT NULL | Used for login |
| `password` | VARCHAR(255) | NOT NULL | Hashed password |


Table: `products`

| Field | Type | Constraints | Description |
|--------|------|-------------|--------------|
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT | Unique product ID |
| `name` | VARCHAR(150) | NOT NULL | Product name |
| `description` | TEXT | NULL | Product description |
| `price` | DECIMAL(10,2) | NOT NULL | Product price |
| `image` | VARCHAR(255) | NOT NULL | Image file path or URL |

## Project Realisation:

### Team
- **Person 1:** Backend & Database
- **Person 2:** Frontend & Design
---

### Phase 1 – The Checkup (Due : November 11)

#### **Week 1 — Nov 7 → Nov 11**
**Person 1 (Backend):**
- Set up GitHub repo and full folder structure (`/assets`, `/includes`, `/admin`, etc.).
- Create `header.php` and `footer.php` includes and test them on all pages.
- Design and create the SQL schema (`admins`, `products` tables) in phpMyAdmin.
- Write a brief setup section in the `README.md` (local server, DB import).

**Person 2 (Frontend):**
- Build and style all public pages in HTML/CSS (`index.php`, `about.php`, `shop.php`, `contact.php`, `register.php`).
- Apply color palette and at least two fonts (headings + body);
- Ensure all pages are responsive (mobile / tablet / desktop).

**Deliverables by Nov 11**
- GitHub repo + README.md (created)
- All pages built + styled
- Header/footer templating working
- Database schema tested locally
---

###  Phase 2 – Final Submission (Due : December 12)

#### **Week 2 — Nov 12 → Nov 20**
**Person 1 (Backend):**
- Create `/includes/db.php` (Database Connection Class).
- Write CRUD logic for `products` and `admins`.
- Implement registration with hashed passwords.

**Person 2 (Frontend):**
- Refine all CSS layouts based on backend includes.
- Style admin dashboard layout.
- Improve forms + shop/product visual structure.
---

#### **Week 3 — Nov 21 → Nov 27**
**Person 1 (Backend):**
- Implement login/logout using PHP sessions.
- Protect admin pages with session checks.
- Build admin product table (read/update/delete).

**Person 2 (Frontend):**
- Style login/register pages and admin dashboard.
- Add animations, hover states, and consistency checks.
- Verify responsiveness across breakpoints.
---

#### **Week 4 — Nov 28 → Dec 4**
**Person 1 (Backend):**
- Connect frontend shop/product pages to the database (dynamic content).
- Debug and validate forms.

**Person 2 (Frontend):**
- Test dynamic pages visually.
- Add final polish: CTA section, banner, shadows, filters, transitions.
---

#### **Week 5 — Dec 5 → Dec 10**
**Person 1 (Backend):**
- Finalize CRUD and session logic.
- Clean up database interactions and validation.

**Person 2 (Frontend):**
- Apply full CSS polish and test responsiveness on all devices.
- Add accessibility and final styling tweaks.
---

#### **Week 6 — Dec 11 → Dec 12**
**Both:**
- Merge all branches and perform final integrated testing.
- Update `README.md` with full setup instructions and screenshots.
- Deploy to Georgian College server and confirm functionality.
- Submit GitHub link + server URL by **December 12**.
---
