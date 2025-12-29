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
│   └── style.css
│
│
│── /templates
│   ├── header.php
│   ├── additional_info.php
│   └── footer.php
│
│── /images
│  
│── /js
│   └── custom-js.js
│
│── /lang
│   ├── en.php
│   ├── fr.php
│
├── /includes
│   ├── Database.php
│   ├── Session.php
│   ├── config.php
│   └── lang.php
│
├── /admin
│   ├── CrudProducts.php
│   └── User.php
│   
│
├── README.MD  
├── about.php
├── admin-dashboard.php
├── home.php
├── login.php
├── logout.php
├── shop.php
├── product.php
├── personal-account.php
├── contact.php
└── register.php
```

## Database Schema (Suggested)

Table: `admin_users`

| Field | Type | Constraints | Description                      |
|--------|------|-------------|----------------------------------|
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each admin |
| `name` | VARCHAR(100) | NOT NULL | Admin's full name                |
| `email` | VARCHAR(100) | UNIQUE, NOT NULL | Used for login                   |
| `password` | VARCHAR(255) | NOT NULL | Hashed password                  |
| `is_admin` | TINYINT(1) | NOT NULL | Is admin or not                  | 


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
