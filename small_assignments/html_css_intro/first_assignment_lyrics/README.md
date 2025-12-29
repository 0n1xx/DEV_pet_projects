# Saya Gray | EXHAUST THE TOPIC (Lyrics Webpage)

This project is a simple static HTML page that displays the lyrics for **Saya Gray's song _"EXHAUST THE TOPIC"_**.  
The page is structured to demonstrate semantic HTML elements such as `<header>`, `<main>`, `<section>`, and `<img>`.

---

### 📂 Project Structure:

```bash
├── homepage.html # Main HTML file (lyrics page)
├── album_cover_image.png # Album cover image (referenced in the HTML)
└── README.md # Documentation file
```

### ✨ Features:
- **Semantic HTML5**: Uses sections for different song parts (Intro, Verse, Chorus, etc.).
- **Metadata** in `<head>`: Includes charset, viewport, description, and robots tag.
- **Responsive design** (via viewport meta tag).
- **Image embedding**: Displays the album cover alongside the lyrics.
- **Lyrics formatting**: Line breaks (`<br>`) separate lines, with headings for song structure.


### 🚀 How to View:
#### Option 1: Open Locally
Just double-click `homepage.html` to open it in your browser.

#### Option 2: Run on a Local Web Server
If you want to serve it via HTTP:
```bash
cd project_directory
python3 -m http.server 8080
```