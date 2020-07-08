## Chee Studio - Custom Wordpress Theme Framework

[chee.studio](https://cheewebdevelopment.com)

<br>

### Setup gulpfile.js

**Note:** Both NodeJS and NPM are required to be installed in order to run the commands below.

1. In root of the theme folder, run `npm install` to install needed packages to run gulp
2. Set `PROJECT_NAME` variable to the folder name of your localhost install
3. If localhost is not being used, set `DEVELOPER_MODE` to `false` to disable BrowserSync refresh
4. Once packages are installed and `gulpfile.js` is setup, run `gulp`
5. File watching is enabled as long as gulp is running

### Compile Styles & JS

1. `.scss` files found in `assets/scss/`. The `core` folder is loaded in a specific order controlled by `main.scss`. Any additional files added to the `core` folder need to be manually added.
2. All other `.scss` files found in other folders, such as `elements, layout, pages` are compiled automatically and do not need to be added to `main.scss`
2. All `.scss` files will compile to `style.css` (easy to read format) and `style.min.css` (only this minified version is used)
3. All `.js` files from `assets/js/src/` compile to `all.min.js` (only this minified version is used)




