# WP Starter Theme

`WP Starter Theme` is a WordPress starter theme built on top of Underscores and extended with custom widgets, customizer settings, Bootstrap-based styling, and bundled frontend scripts.

This repository no longer uses the default `_s` README content. The theme in this project is a customized starter theme intended to be used directly and extended for site-specific development.

## Requirements

- WordPress 4.5 or later
- PHP 7.3 or later

## Theme Details

- Theme name: `WP Starter Theme`
- Text domain: `wp-starter-theme`
- Author: `H M Masum Billah`
- License: `GNU General Public License v2 or later`

## Included Features

- Two registered menu locations: `Primary` and `Mobile`
- One main sidebar plus four footer widget areas
- Custom widget: `About Company`
- Custom widget: `Post Filter Widget`
- Support for `custom-logo`
- Support for `post-thumbnails`
- Support for HTML5 markup
- Support for WooCommerce
- Jetpack compatibility hooks
- Bundled assets for Bootstrap and Owl Carousel

## Installation

1. Copy this theme folder into `wp-content/themes/`.
2. Activate `WP Starter Theme` from `Appearance > Themes`.
3. Assign menus to the `Primary` and `Mobile` theme locations.
4. Configure widgets in the sidebar and footer widget areas as needed.

## Development Notes

- There is no `Node.js` or `Composer` build pipeline configured in this repository.
- The main theme bootstrap starts in `functions.php`.
- Theme classes are organized under `inc/classes/`, `inc/customizer/`, `inc/widgets/`, and `inc/helpers/`.
- Frontend assets are stored in `assets/css/`, `assets/js/`, and `assets/images/`.
- Translation files are stored in `languages/`.

## Project Structure

```text
.
|-- assets/
|   |-- css/
|   |-- images/
|   `-- js/
|-- inc/
|   |-- classes/
|   |-- customizer/
|   |-- helpers/
|   |-- traits/
|   `-- widgets/
|-- languages/
|-- template-parts/
|-- functions.php
|-- style.css
`-- readme.txt
```

## Credits

- Based on [Underscores](https://underscores.me/)
- Includes bundled Bootstrap and Owl Carousel assets

## License

This theme is distributed under the GNU General Public License v2 or later. See `LICENSE` for details.
