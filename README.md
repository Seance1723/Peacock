# Peacock

FEATURES

- Registering Custom Menus
- Editing the Default WordPress Menus
- Registering CPTs, taxonomies
- Infinite Scroll
- Pagination
- Custom page templates
- Writing WP Queries
- Blog Page
- Archive
- Post Filters with load more
- Creating customizer options
- Working with user admin roles
- Creating Theme option page
- Using slick slider
- Creating Custom Widgets
- Adding Comment form
- Adding Related Posts
- Translation
- Making Ajax Requests
- Using WordPress REST API
- Custom front page
- Custom Blog page with posts displayed in grid format using bootstrap
- Block Style Variations
- Custom Gutenberg Blocks
- InnerBlocks


Directory Structure

```php
.
├── README.md
├── assets
│   ├── main.js
│   └── src
│       └── library
│           ├── css
│           │   ├── bootstrap-grid.min.css
│           │   └── bootstrap.min.css
│           └── js
│               └── bootstrap.min.js
├── demo
│   ├── banner.png
│   ├── blog-page.png
│   ├── features-one.png
│   ├── features-two.png
│   └── home-page-customizer-setup.png
├── footer.php
├── front-page.php ( Home Page )
├── functions.php
├── header.php
├── inc
│   ├── classes
│   │   ├── class-aquila-theme.php
│   │   ├── class-assets.php
│   │   ├── class-menus.php
│   │   └── class-meta-boxes.php
│   ├── helpers
│   │   ├── autoloader.php
│   │   └── template-tags.php
│   └── traits
│       └── trait-singleton.php
├── index.php ( Blog page )
├── page.php  ( Single Page )
├── screenshot.png
├── single.php ( Single Post Page )
├── style.css
└── template-parts
    ├── components
    │   └── blog
    │       ├── entry-content.php
    │       ├── entry-footer.php
    │       ├── entry-header.php
    │       └── entry-meta.php
    ├── content-none.php
    ├── content.php
    └── header
        └── nav.php
```