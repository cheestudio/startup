## Chee Studio - Custom Wordpress Theme Framework

[chee.studio](https://cheewebdevelopment.com)

<br>

### Compile .SCSS & .JS

**Note:** If not running on Wordpress using a DB locally, rename `gulpfile-ALT.js` to `gulpfile.js` to use non-browser-sync version to compile SCSS and JS only. You can also remove `"browser-sync": "^X.XX.X",` from the `package.json` file prior to installing node packages

1. In root of the theme folder, run `npm install` to install needed packages to run gulp

2. Once packages are installed, run `gulp`

3. .SCSS files will compile to `style.css` and `style.min.css`

4. .JS source will compile to `all.min.js`

5. File watching is enabled as long as gulp is running



