# wp_plugin_custom_search_ajax
# by me & Copilot

# Custom Search AJAX Plugin

This WordPress plugin adds a custom search form to the site using AJAX. The search results are displayed on the same page without reloading.

## Features

- AJAX-based search form for posts.
- Displays search results on the same page.
- Easy integration using a shortcode.

## Installation

1. Download the plugin files.
2. Upload the plugin folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

### Shortcode

- `[custom_search]` - Adds the search form to the page or post.

### Example Usage

1. Add the shortcode `[custom_search]` to any page or post where you want the search form to appear.
2. Users can enter their search query into the form and hit "Search post".
3. The results will be displayed below the form without reloading the page.

## AJAX Endpoint

- The plugin uses `admin-ajax.php` to handle AJAX requests.

## JavaScript

- The plugin enqueues a custom JavaScript file (`custom-search.js`) to handle the AJAX requests and display the results.

## Error Handling

- If no posts are found, the plugin displays a message: "No posts found".



