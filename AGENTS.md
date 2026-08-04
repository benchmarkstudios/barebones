# AGENTS.md

## Project overview

This repository contains a lightweight custom WordPress theme.

Keep changes focused, maintainable, and consistent with the existing theme. Avoid introducing frameworks, dependencies, abstractions, or build tools unless the task explicitly requires them.

## Project structure

Place files according to their purpose:

- `assets/styles/config/` — Sass variables, mixins, and shared configuration.
- `assets/styles/base/` — Element defaults, typography, forms, grids, and foundational styles.
- `assets/styles/components/` — Reusable UI components.
- `assets/styles/layout/` — Site-wide structural styles such as headers, footers, and sections.
- `assets/styles/pages/` — Page-specific styles.
- `assets/styles/utils/` — Resets, helpers, defaults, and responsive utilities.
- `assets/styles/admin/` — WordPress editor and admin styles.
- `assets/scripts/` — Theme-level JavaScript source.
- `blocks/<block-name>/` — Source files belonging to a custom block.
- `includes/` — WordPress setup, hooks, registrations, and reusable PHP functionality.
- `templates/` — Custom WordPress page templates.
- `acf-json/` — ACF local JSON definitions.
- `css/`, `js/`, and the root `style.css` — Compiled build output.

Do not place new source code in compiled output directories.

## Generated assets

Vite compiles the source assets into:

- `assets/styles/style.scss` → `style.css`
- `assets/styles/admin/_editor.scss` → `css/editor-styles.css`
- `assets/scripts/scripts.js` → `js/scripts.min.js`
- `blocks/<name>/<name>.scss` → `css/blocks/<name>.css`
- `blocks/<name>/<name>.js` → `js/blocks/<name>.js`

Edit the source files, not the compiled files, unless explicitly instructed otherwise.

After changing SCSS or JavaScript, run:

```sh
npm run build
```

Use `npm run dev` when watch mode is useful.

## SCSS conventions

Use modern Sass modules with `@use`. Shared configuration should normally be imported with:

```scss
@use '../config' as *;
```

Adjust the relative path where necessary.

Use BEM-style class names:

```scss
.card {}
.card__title {}
.card--featured {}
```

Write each BEM selector explicitly at the root level.

Do not use suffix nesting such as `&__child`, `&--modifier`, or similar interpolation:

```scss
// Do not write this.
.card {
    &__title {}
    &--featured {}
}
```

Instead, write complete selectors:

```scss
.card {}

.card__title {}

.card--featured {}
```

Ordinary contextual and state nesting is acceptable when it improves clarity:

```scss
.card__link {
    &:hover,
    &:focus-visible {
        text-decoration: underline;
    }

    .theme-dark & {
        color: #fff;
    }
}
```

Additional SCSS rules:

- Keep nesting shallow, generally no more than two levels.
- Prefer classes over element selectors for component styling.
- Keep component styles in their corresponding component file.
- Put responsive declarations beside the rule they modify.
- Use the existing responsive mixins and variables instead of duplicating media-query values.
- Reuse values from `assets/styles/config/` where appropriate.
- Add new partials to the appropriate entry-point file using `@use`.
- Do not add vendor prefixes manually unless there is a demonstrated need.
- Preserve the formatting style of the file being edited.

## WordPress block layout

Each custom block should live in its own directory:

```text
blocks/<block-name>/
├── block.json
├── <block-name>.php
├── <block-name>.scss
├── <block-name>.js
└── preview.jpg
```

Use the same kebab-case block name for the directory, filenames, compiled asset references, and `block.json` name.

Block styles and scripts are discovered automatically by Vite. Do not manually add individual block entries to `vite.config.js`.

Use `custom-blocks/<block-name>` for the block name and `custom-blocks` for its category unless the task requires another registered namespace.

Keep block PHP concerned with rendering. Put reusable logic, hooks, and registration behaviour in `includes/`.

## PHP conventions

Follow WordPress coding practices and the surrounding file's established style.

- Use WordPress APIs instead of duplicating platform functionality.
- Escape output according to its context:
  - `esc_html()` for plain text.
  - `esc_attr()` for attribute values.
  - `esc_url()` for URLs.
  - `wp_kses_post()` for trusted rich HTML where appropriate.
- Sanitize and validate external input before using it.
- Use strict comparisons where practical.
- Prefix theme functions with `bb_` unless extending an existing naming convention.
- Use snake_case for PHP functions and variables.
- Add hooks close to the callback they register.
- Keep functions focused and avoid unrelated changes.
- Use the theme text domain `barebones` for translatable strings.
- Do not suppress errors or add global state without a clear reason.

Do not escape intentionally rendered ACF rich-text content with `esc_html()`. Use an appropriate HTML allow-list such as `wp_kses_post()` when the value is not already guaranteed safe.

## Template formatting

Use semantic HTML and preserve the existing grid and utility class conventions.

- Keep PHP control structures readable within HTML.
- Avoid deeply nested inline PHP expressions.
- Calculate complex values before rendering markup.
- Escape dynamic attributes and URLs.
- Include meaningful image alternative text.
- Preserve WordPress hooks such as `wp_head()`, `wp_body_open()`, and `wp_footer()`.
- Do not add ARIA roles that duplicate native HTML semantics unless needed for compatibility.

## JavaScript conventions

- Use modern JavaScript supported by the existing Vite build.
- Keep theme-wide scripts in `assets/scripts/`.
- Keep block-specific scripts beside their block.
- Use `const` by default and `let` only when reassignment is required.
- Avoid adding global variables.
- Use `js-` prefixed classes for JavaScript hooks when adding new behavioural selectors.
- Do not use visual CSS classes as JavaScript hooks when a dedicated hook is practical.
- Ensure scripts tolerate missing optional elements.
- Do not add a dependency when the required behaviour can be implemented clearly with the existing stack.

## JSON formatting

For `block.json`, `theme.json`, and ACF JSON:

- Use valid JSON with double-quoted keys and values.
- Use four-space indentation, matching the existing files.
- Do not add comments or trailing commas.
- Preserve schema declarations where present.
- Avoid reformatting unrelated generated ACF JSON.

## General formatting

- Use UTF-8 files with a final newline.
- Do not leave trailing whitespace.
- Match the indentation and brace style of the file being edited.
- Use lowercase kebab-case for new asset, component, block, and template filenames.
- Keep comments useful and concise; do not narrate obvious code.
- Do not reformat unrelated code as part of a focused change.
- Do not commit temporary files, caches, source maps, `node_modules`, or `.vite-build`.

## Verification

Before considering a change complete:

1. Run `npm run build` when SCSS, JavaScript, block assets, or Vite configuration changes.
2. Check modified PHP files with `php -l <file>`.
3. Confirm that generated asset paths still match their references.
4. Check affected templates or blocks in both the frontend and WordPress editor when possible.
5. Review `git diff` and remove unrelated formatting or generated noise.
6. Report any verification that could not be performed.
