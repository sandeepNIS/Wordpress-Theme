# Nichi Modern WordPress Theme

A modern, lightweight WordPress theme with clean PHP structure and responsive design built for accessibility and performance.

## Overview

Nichi Modern is a minimal WordPress theme designed for developers who want a clean foundation to build upon. It follows WordPress coding standards and best practices, featuring a modular template structure with organized asset management.

## Features

✨ **Core Features**

- Clean, semantic PHP code following WordPress standards
- Fully responsive and mobile-first design
- Modular template architecture
- Organized CSS and JavaScript structure
- Theme customization ready
- SEO-friendly markup

## Quick Start

### Installation

1. Download or clone this theme into your WordPress themes directory:

   ```bash
   wp-content/themes/nichi-modern/
   ```

2. Activate the theme from WordPress Admin Dashboard:
   - Go to **Appearance** → **Themes**
   - Find "Nichi Modern" and click **Activate**

3. Start customizing in **Appearance** → **Customize**

## Project Structure

```
nichi-modern/
├── index.php              # Main template file (fallback)
├── header.php             # Header template & opening markup
├── footer.php             # Footer template & closing markup
├── single.php             # Single post template
├── archive.php            # Archive page template (categories, tags, etc.)
├── 404.php                # Error 404 (page not found) template
├── functions.php          # Theme functions & hooks
├── style.css              # Theme stylesheet header
├── README.md              # This file
└── assets/
    ├── css/
    │   └── main.css       # Primary theme styles
    └── js/
        └── main.js        # JavaScript functionality
```

## File Descriptions

### Template Files

- **index.php** - Main template file used as fallback for all pages and post types
- **header.php** - Contains HTML `<head>` and opening `<body>` markup, called by all templates
- **footer.php** - Contains footer content and closing HTML tags, included in all templates
- **single.php** - Template for displaying individual posts (single post view)
- **archive.php** - Template for displaying post archives (categories, tags, custom post types, date archives)
- **404.php** - Template for displaying 404 error page when content is not found

### Configuration Files

- **functions.php** - Enqueues assets, registers hooks, and defines custom functionality
- **style.css** - WordPress theme header file (required for theme identification)

### Assets

- **assets/css/main.css** - All theme styling and responsive breakpoints
- **assets/js/main.js** - Custom JavaScript and jQuery functionality

## WordPress Template Hierarchy

Nichi Modern follows the WordPress template hierarchy to display different content types:

### Template Hierarchy Flow

```
Single Post View:     single.php → index.php
Archive View:         archive.php → index.php
Category/Tag:         archive.php → index.php
Search Results:       index.php (can be customized with search.php)
404 Error:            404.php → index.php
Homepage:             index.php
```

### When Each Template is Used

| Template        | Used For                                                              |
| --------------- | --------------------------------------------------------------------- |
| **single.php**  | Individual blog posts, custom post types                              |
| **archive.php** | Post archives, category pages, tag pages, date archives, author pages |
| **404.php**     | When a requested page doesn't exist                                   |
| **index.php**   | Fallback template for all page types not specifically handled         |

## Template Parts & Patterns

### Common Template Patterns

All templates in Nichi Modern follow the same basic pattern:

```php
<?php
/**
 * Template Name: Single Post
 */
get_header(); // Include header.php
?>

<main role="main" class="main-content">
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- Post content here -->
    <?php endwhile; ?>
</main>

<?php get_footer(); // Include footer.php ?>
```

### Template Parts

Template files are organized around these core parts:

1. **Header** (`header.php`)
   - DOCTYPE and `<head>` section
   - Navigation menu
   - Opening `<body>` and main container

2. **Content Area** (single.php, archive.php, index.php)
   - Post loop
   - Post content display
   - Pagination

3. **Footer** (`footer.php`)
   - Footer widgets/content
   - Closing tags

### The WordPress Loop

The backbone of all template files is the WordPress Loop, used to display posts:

```php
<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        // Display post content
        the_title();
        the_content();
    }
}
?>
```

### Common Template Tags

#### In Templates

- `get_header()` - Include the header template
- `get_footer()` - Include the footer template
- `have_posts()` - Check if posts exist in the loop
- `the_post()` - Initialize the post in the loop
- `the_title()` - Display post title
- `the_content()` - Display post content
- `the_permalink()` - Get post URL
- `the_excerpt()` - Display post excerpt

#### For Archives

- `is_archive()` - Check if on an archive page
- `is_category()` - Check if viewing a category
- `is_tag()` - Check if viewing a tag
- `get_the_archive_title()` - Get archive page title
- `paginate_links()` - Display pagination

### Customization Examples

#### Modify Single Post Display

Edit `single.php` to add custom markup:

```php
<?php get_header(); ?>
<main role="main" class="main-content">
    <article <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </article>
</main>
<?php get_footer(); ?>
```

#### Customize Archive Display

Edit `archive.php` to display posts differently:

```php
<?php get_header(); ?>
<main role="main" class="main-content">
    <header class="archive-header">
        <h1><?php echo get_the_archive_title(); ?></h1>
    </header>
    <div class="posts-grid">
        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <?php the_title( '<h2><a href="' . get_permalink() . '">', '</a></h2>' ); ?>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; ?>
    </div>
    <?php paginate_links(); ?>
</main>
<?php get_footer(); ?>
```

#### Add Custom 404 Page

Edit `404.php` to customize error handling:

```php
<?php get_header(); ?>
<main role="main" class="main-content error-404">
    <h1><?php esc_html_e( 'Page Not Found', 'nichi-modern' ); ?></h1>
    <p><?php esc_html_e( 'The page you are looking for does not exist.', 'nichi-modern' ); ?></p>
    <a href="<?php echo home_url(); ?>" class="btn"><?php esc_html_e( 'Return Home', 'nichi-modern' ); ?></a>
</main>
<?php get_footer(); ?>
```

## Customization

### Modifying the Theme

1. **Update HTML Structure** - Edit template files (`header.php`, `index.php`, `footer.php`)
2. **Add Custom Styles** - Edit `assets/css/main.css`
3. **Add JavaScript** - Edit `assets/js/main.js`
4. **Register Features** - Add hooks and features in `functions.php`

### Child Theme Development

For production use, create a child theme to maintain upgradeability:

```
wp-content/themes/nichi-modern-child/
├── style.css
├── functions.php
└── screenshot.png
```

## Requirements

- **WordPress** 5.0 or higher
- **PHP** 7.4 or higher
- Modern web browser with JavaScript enabled

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Development

### Assets Enqueue

All CSS and JavaScript files should be enqueued in `functions.php` using WordPress functions:

```php
wp_enqueue_style()
wp_enqueue_script()
```

### Hooks & Filters

The theme uses WordPress hooks for extensibility. Common hooks:

- `wp_head()` - Add content to `<head>`
- `wp_footer()` - Add content before closing `</body>`

## License

[Specify your license - MIT, GPL v2, etc.]

## Author

Sandeep

## Support

For issues, suggestions, or contributions, please refer to the project repository.

---

**Last Updated:** February 2026
