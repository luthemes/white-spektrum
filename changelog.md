# Change Log

## 0.1.0 - 10.28.2026
### Breaking
These affect child themes and custom code; the theme's own settings carry over.
- Requires WordPress 5.9 or later (ClassicPress 2.0 or later) and PHP 7.4 or later.
- The framework functions the theme used to call were removed or renamed. Child themes calling them need to update:
  - `Backdrop\Theme\Entry\*` → `Backdrop\Post\*`, `Backdrop\Theme\Site\*` → `Backdrop\Site\*` (`display_site_title()` and `display_site_description()` are now `display_title()` and `display_description()`), `Backdrop\Theme\Comment\*` → `Backdrop\Comment\*`.
  - `Backdrop\Theme\is_classicpress()` → `Backdrop\is_classicpress()`.
  - `Backdrop\Template\Hierarchy\hierarchy()` → `Backdrop\Template\hierarchy()`.
  - `Backdrop\Customize\Helpers\Sanitize` → `WhiteSpektrum\Customize\Sanitize`.
  - `Backdrop\Mix\asset()` → `WhiteSpektrum\Vite\asset()` for the parent theme's assets. `backdrop-dev/mix` is no longer included.
- Assets are built with Vite (`npm run build`, Node 20.19 or 22.12 and later) and have content-hashed file names. Enqueue them by source path through `WhiteSpektrum\Vite\asset()`, for example `asset( 'resources/scss/screen.scss' )`. The script and style handles are unchanged.
- The settings page hooks `amicable/settings/admin/view/themes/register` and `amicable/settings/admin/view/plugins/register` are now `white/spektrum/settings/admin/view/themes/register` and `white/spektrum/settings/admin/view/plugins/register`.

### Fixed
- The customizer no longer fails with a fatal error. The Global Layout control passed its choices in a format the framework's control doesn't accept, and the header settings referred to the core Colors section, which the framework removes.
- The customizer controls script and styles were enqueued from paths that didn't exist, so the customizer logged an error and the Global Layout picker was unstyled. The picker now shows the selected layout, hides its radio buttons and can be used with the keyboard.
- Custom Footer Text no longer shows while the "Powered by" credit is on.
- Header Text Color and Display Site Title and Tagline now take effect. The default header text color is black, the color the title already had.
- The primary menu is laid out properly between 769px and 1170px wide, where it was an unstyled list under a Menu button.
- The menu toggles' screen reader text was empty.
- The settings page heading, Customize button link and tab classes were empty, and opening an unknown tab caused a fatal error; it now falls back to the General tab. The settings page also no longer requests a stylesheet that doesn't exist.
- Featured images use the Landscape Medium size until another size is chosen, instead of sometimes having no size.
- The charset and viewport meta tags were printed twice.
- The emoji styles are restored while emoji are enabled in the theme settings.
- If the theme's `vendor` folder is missing, administrators see a notice explaining how to fix it, and visitors get a 503 page, instead of a fatal error.

### Added
- Translator comments for the strings with placeholders, and an updated translation template, `public/lang/white-spektrum.pot`.

### Changed
- Updated to the `develop` branch of `backdrop-dev/framework`, which replaces the separate `customize`, `languages`, `pagination`, `template-hierarchy`, `template-manager`, `theme` and `view` packages, and use the framework's Customize component. `backdrop-dev/framework` and `backdrop-dev/fonts` are pinned to the commits this release was tested with.
- Replaced Laravel Mix with Vite. Laravel Mix and its webpack toolchain pull in packages with known vulnerabilities; the build now needs only `vite` (7.3.7 or later) and `sass`, with Rollup and Immutable kept at patched versions. `package-lock.json` pins the build tools.
- The header text color has its own **Theme: Header → Colors** section.
- The release workflow no longer needs the `PRIVATE_KEY` or `TOKEN` secrets; it uses GitHub's built-in token, installs exactly what `package-lock.json` pins, checks that the release tag matches the `style.css` version, and stops if `npm audit` finds a high or critical vulnerability. The coding standards check runs on pull requests too, and pins a version that accepts the ClassicPress rules.
- Declares `Domain Path: /public/lang` in `style.css`, and updated the readme files.

### Removed
- Composer dev dependencies (`wptrt/wpthemereview` is abandoned and blocked `composer install`) and `composer.lock`, which pinned the old split packages.
- `node-wp-i18n`; generate the translation template with `wp i18n make-pot` instead.

## 0.0.1 - 11.18.2024
* Theme Relaunch. Everything New!