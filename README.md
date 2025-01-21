## About

This is basically just a school assignment that got very out of hand.

Demo currently being hosted [here](https://recipes.yazo.ink).

Feel free to self-host this. There are no docker images or anything because I'm lazy but all you need is a web server that supports PHP.

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
![Screenshot 2025-01-21 at 18-08-43 Simple Recipe Page](https://github.com/user-attachments/assets/e2543064-f73a-4308-a1a3-4479eaf4a914)
