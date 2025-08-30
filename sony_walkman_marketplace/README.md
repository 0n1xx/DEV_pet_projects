# 🎧 Sony Walkman Marketplace

A static website showcasing vintage Sony Walkman models with product pages, historical context, and shop locator functionality.
Built with HTML5, CSS3, and JavaScript (jQuery + custom).

### 📂 Project Structure

```bash
sony_walkman_marketplace/
├── css/
│   └── style.css                 # Global styles
├── includes/
│   ├── header.html               # Global header template
│   └── footer.html               # Global footer template
├── js/
│   └── custom-js.js              # Custom JavaScript (search, cart, etc.)
├── photos/
│   ├── about_page/               # Images for About page
│   ├── footer/                   # Footer-related images
│   ├── home_page/                # Images for Homepage
│   └── shop_page/                # Product images (Walkman models)
├── about_page.html               # Walkman history & timeline
├── contact_page.html             # Contact form + customer reviews
├── homepage.html                 # Landing page (intro + philosophy)
├── shop_page.html                # Catalog with products + shop search
├── sony_walkman_wm_2011.html     # Detailed product page (WM-2011)
├── sony_walkman_wm_a12.html      # Detailed product page (WM-A12)
└── sony_walkman_wm_f2015.html    # Detailed product page (WM-F2015)
```

### 🌐 Pages Overview

#### 🏠 Homepage (homepage.html):
- Introduction to the shop’s mission & philosophy. 
- Archival references and Walkman visuals.

#### 📖 About Page (about_page.html):
- A timeline of the Walkman’s history: 1979 → 2025. 
- Showcases Walkman’s cultural and technological evolution.

#### 🛒 Shop Page (shop_page.html):
- Catalog of Walkman models:
  - Sony Walkman WM-2011 → [$59.99 CAD]
  - Sony Walkman WM-A12 → [$79.99 CAD]
  - Sony Walkman WM-F2015 → [$99.99 CAD]
- Each product links to a dedicated product page with images, descriptions, and key features. 
- Includes a store locator search with major Canadian shop locations.

#### ✉️ Contact Page (contact_page.html):
- Customer inquiry form (name, email, phone, message). 
- Urgent support info and social media links. 
- Ratings system for service quality. 
- Authentic Canadian customer reviews.

#### 🎶 Product Pages:
- Each Walkman model has its own dedicated product detail page:
  - [sony_walkman_wm_2011.html](sony_walkman_wm_2011.html)
  - [sony_walkman_wm_a12.html](sony_walkman_wm_a12.html])
  - [sony_walkman_wm_f2015.html](sony_walkman_wm_f2015.html)

- Includes:
  - Product images 
  - Historical context 
  - Key features list 
  - Price & quantity selector 
  - Add-to-cart button with confirmation message

### 🛠️ Technologies Used:
- HTML5 – Semantic, responsive markup 
- CSS3 – Custom styling via style.css 
- JavaScript – Interactivity (search, cart, DOM updates)
- jQuery – Simplified DOM manipulation 
- Google Fonts (Poppins) – Modern typography

### 🚀 Getting Started:
1. Clone this repository:
   ```bash
    git clone https://github.com/your-username/sony_walkman_marketplace.git
    cd sony_walkman_marketplace
    ```
2. Open any .html file in your browser (start with homepage.html).
3. No build process is required — it’s a static site.

### 📌 Future Improvements:
- Add a cart page with checkout simulation.
- Use localStorage for cart persistence. 
- Improve mobile responsiveness. 
- Optimize images for faster loading.