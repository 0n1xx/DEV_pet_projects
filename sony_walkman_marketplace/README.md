# Sony Walkman Marketplace

A fully responsive **static website** showcasing a curated collection of vintage Sony Walkman models. This project demonstrates clean, semantic HTML structure, modern CSS layout techniques, and client-side interactivity using vanilla JavaScript and jQuery.

Designed as a realistic e-commerce storefront with a focus on user experience, historical storytelling, and visual appeal — perfect for retro audio enthusiasts.

### Key Features
- **Responsive Design**: Mobile-first layout that adapts seamlessly across desktop, tablet, and mobile devices using Flexbox, Grid, and media queries.
- **Product Catalog**: Dedicated pages for multiple Walkman models with high-quality images, detailed specifications, pricing, and historical context.
- **Interactive Elements**:
  - Functional "Add to Cart" with confirmation feedback
  - Quantity selector
  - Store locator search functionality
  - Smooth navigation and DOM updates via JavaScript/jQuery
- **Rich Content Pages**:
  - Engaging homepage introducing brand philosophy
  - Comprehensive "About" page with a timeline of Walkman evolution (1979–present)
  - Contact page with structured form and customer review section
- **Performance & Accessibility**:
  - Semantic HTML5 markup
  - Optimized image organization
  - Clean, maintainable CSS architecture
  - Modern typography using Google Fonts (Poppins)

This project served as an important stepping stone in my development journey — building strong frontend fundamentals before advancing to dynamic, database-driven applications (like my iPod Marketplace project).

### Project Structure
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

### 🛠️ Technologies Used:
- HTML5 – Semantic, responsive markup 
- CSS3 – Custom styling via style.css 
- JavaScript – Interactivity (search, cart, DOM updates)
- jQuery – Simplified DOM manipulation 
- Google Fonts (Poppins) – Modern typography


### Technologies Used
- **HTML5** – Semantic, accessible structure
- **CSS3** – Custom responsive styling (Flexbox, Grid, custom components)
- **JavaScript** – Vanilla JS for core interactivity
- **jQuery** – Enhanced DOM manipulation and event handling
- **Google Fonts** – Poppins for clean, modern typography

### How to Run Locally
This is a pure static site — no server or build tools required.

1. Clone the repository:
   ```bash
   git clone https://github.com/0n1xx/DEV_pet_projects.git
   ```
2. Navigate to the project folder:
   ```bash
   cd DEV_pet_projects/sony_walkman_marketplace
   ```

### Future Enhancements
Here are some planned improvements to take this project further and align it with modern web standards:

- **Persistent Shopping Cart**  
  Implement cart functionality using `localStorage` to maintain items across page reloads and sessions.

- **Dedicated Cart & Checkout Page**  
  Create a summary page displaying selected items, quantities, subtotal, and a simulated checkout flow.

- **Performance Optimizations**  
  Add lazy loading for images and optimize file sizes to improve page load times, especially on mobile.

- **Accessibility Improvements**  
  Enhance keyboard navigation, add appropriate ARIA labels and roles, and ensure better screen reader support.

- **Dynamic Backend Integration**  
  Convert the static site into a full-stack application by adding PHP/MySQL for real product management, user accounts, and server-side cart handling (building on patterns from my iPod Marketplace project).

These enhancements reflect my ongoing commitment to improving user experience, performance, and accessibility while progressing toward more complex full-stack solutions.

Thank you for reviewing my work!

— Vlad Sakharov  
Aspiring Full-Stack Web Developer
