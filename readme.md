# White Spektrum
White Spektrum has been transformed into a responsive design, ensuring a seamless and visually appealing experience on both smartphones and tablets. This theme is packed with several enticing features, including a custom header, versatile left and right sidebars, and support for featured images, enhancing the visual appeal and functionality of your site. Additionally, it introduces a distinctive approach to mobile navigation; the mobile menu is innovatively positioned at the bottom left corner, offering users an intuitive and convenient way to navigate through the site. This thoughtful placement significantly improves accessibility and user experience, making navigation effortless and user-friendly.

## Requirements
* ClassicPress 2.0 or later, or WordPress 5.9 or later
* PHP 7.4 or later

## Development
The theme's PHP dependencies come from Composer and its assets are built with [Vite](https://vite.dev).

* Node.js 20.19 or later, or 22.12 or later
* Composer

<pre>
composer install --no-dev
npm ci
npm run build
</pre>

`npm run prod` builds the assets into `public/assets`, `npm run watch` rebuilds them as you work, and `npm run build` also exports the theme into the `white-spektrum` folder, ready to zip.

## Child themes
To customize White Spektrum, create a child theme.

* Create a theme folder in your `wp-content/themes` directory called `white-spektrum-child`.
* Create a `style.css` file within your theme folder.
* At the top of your `style.css` file, add the below information.

<pre>
/*!
 * Theme Name: White Spektrum Child
 * Theme URI: https://link-to-your-site.com
 * Description: Describe what your theme should be like.
 * Version: 0.1
 * Author: Your Name
 * Author URI: https://link-to-your-site.com
 * Tags: Add, Whatever, Tags, You, Want
 * Template: white-spektrum
 */
</pre>

`Template` must be the parent theme's folder name, `white-spektrum`.

## Credits
This theme bundles the following resources
* [FontAwesome](https://fontawesome.com) - [CC by 4.0 License](https://creativecommons.org/licenses/by/4.0) - The social menu icons.
* [Backdrop](https://github.com/backdrop-dev) - By Benjamin Lu - GNU  GPL, version 2 or higher.

This theme bundles the following open-source fonts, served from the theme itself.

* [Fira Sans](https://fonts.google.com/specimen/Fira+Sans) ([SIL Open Font License 1.1](http://scripts.sil.org/OFL))
* [Merriweather](https://fonts.google.com/specimen/Merriweather) ([SIL Open Font License 1.1](http://scripts.sil.org/OFL))
* [Tangerine](https://fonts.google.com/specimen/Tangerine) ([SIL Open Font License 1.1](http://scripts.sil.org/OFL))

## Copyright & License
White Spektrum is licensed under the GNU Public License, version 2 or later (GPL).

This theme is copyrighted to [Benjamin Lu](https://benjlu.com)

2014-2026. © Benjamin Lu
