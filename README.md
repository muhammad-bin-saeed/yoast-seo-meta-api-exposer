# Expose Yoast SEO Meta to REST API

A lightweight WordPress plugin to expose key Yoast SEO meta fields to the REST API, making it easy to update and read SEO titles, meta descriptions, and focus keywords via tools like Make.com, n8n, or Postman.

## Fields Supported
- `_yoast_wpseo_title`
- `_yoast_wpseo_metadesc`
- `_yoast_wpseo_focuskw`

## Installation
1. Download or clone the plugin.
2. Upload the folder to `/wp-content/plugins/`
3. Activate from the WP Admin > Plugins panel.

## REST API Usage

Send meta in POST/PUT to `/wp-json/wp/v2/posts/`:

```json
{
  "title": "My Post",
  "meta": {
    "_yoast_wpseo_title": "My SEO Title",
    "_yoast_wpseo_metadesc": "My meta description",
    "_yoast_wpseo_focuskw": "focus keyword"
  }
}
