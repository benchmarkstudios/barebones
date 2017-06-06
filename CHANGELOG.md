# barebones changelog
## 2.0.6
* Add package-lock.json to gitignore for npm 5+

## 2.0.5
* Use filetime() for asset revisions as it's more compatible and easier to support.

## 2.0.4
* Better static asset revisioning using randomly generated hash when running gulp tasks.

## 2.0.3
* update get_post_thumbnail_url function and add ability to get specific size.

## 2.0.2
* Add dependencies that were missing while using yarn

## 2.0.1
* Comment out example "add_image_size" as it can be easily forgotten which leaves you with extra unused image size.
* Add CHANGELOG.MD to track changes
* Tidy up formatting using PHP-CS-Fixer (mostly spacing)
* Update README.MD dependencies

## 2.0.0
* Refreshed tooling using Elixir with lots of improvements
