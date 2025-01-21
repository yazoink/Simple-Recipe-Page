## About

This is basically just a school assignment that got very out of hand.

Demo currently being hosted [here](https://recipes.yazo.ink).

### Features
- switchable themes
- easy to add new recipes if you can be bothered to write a thing to parse to the recipe file (yes, I manually typed all the json)
- bloat free
- it looks nice

### TODO
- pdfs/printables (LaTeX(?))
- write a script to parse to the recipe file
- more recipes
- handling more recipes/multi page lists
- search(?)

## Documentation
### Creating themes
1. create a css file under `css/themes` named `Theme-Name.css`. It should be formatted as such (below is contents of `css/themes/Gruvbox-Dark.css`);
```css
:root {
    --bg0: #1d2021;
    --bg1: #282828;
    --bg2: #3c3836;
    --a: #83a598;
    --a-hover: #458588;
    --h1: #83a598;
    --a-h1-hover: #458588;
    --h2: #d3869b;
    --a-h2-hover: #b16286;
    --h3: #8ec07c;
    --li-marker: #fb4934;
    --fg: #ebdbb2;
    --hr: #fabd2f;
}
```
3. add theme to `$THEMES` array in `dynamic/globals.php` as `"Theme-Name" => "Name to display for the theme in the menu",` (I like to put them in alphabetacal order but it's not necessary).

### Changing the default theme
Set `$DEFAULT_THEME` in `dynamic/globals.php` to it's corresponding array key in `$THEMES`.

### Adding/removing categories
Add/remove categories from `$CATEGORIES` array in `dynamic/globals.php`.

### Adding/modifying recipes
The format for a recipe in `json/recipes.json` goes as such;
```json
    {
        "title": "name of recipe",
        "featured": true,
        "description": "recipe description",
        "categories": [
            "categories",
            "go",
            "here"
        ],
        "ingredients": [
            "ingredients",
            "go",
            "here"
        ],
        "directions": [
            "directions",
            "go",
            "here"
        ]
    },
```
- `"featured"` determines whether the recipe will show on the navbar under **Featured**
- anything under `"categories"` which is not mentioned in `$CATEGORIES` array (from `dynamic/globals.php`) will be ignored
- `"description"` is optional
- I prefer to put the recipes in alphabetical order but doing otherwise will not impact the functionality of the site
    
### Screenshots
![recipe_page_1](https://github.com/yazoink/php-json-recipe-site/assets/98802603/49f522b5-6541-48fc-ab8a-9c7d2cae77ef)
![recipe_page_2](https://github.com/yazoink/php-json-recipe-site/assets/98802603/c8582e5a-7a60-43a6-abff-fab11a5c6c1b)
![recipe_page_4](https://github.com/yazoink/php-json-recipe-site/assets/98802603/b1da098a-3632-4534-b6b2-6e010b943027)
![recipe_page_3](https://github.com/yazoink/php-json-recipe-site/assets/98802603/fb1d0f3b-e824-496b-a0a3-5588e52037ae)

