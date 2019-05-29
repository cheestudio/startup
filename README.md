## Compile CSS & JS
---

**Note:** If not running on WordPress using a DB locally, rename `gulpfile-ALT.js` to `gulpfile.js` to use non-browser-sync version to compile SCSS and JS only. You can also remove `"browser-sync": "^X.XX.X",` from the `package.json` file prior to installing node packages

In root of the theme folder, run `npm install` to install needed packages to run gulp

Once packages are installed, run `gulp`

.SCSS files will compile to `style.css` and `style.min.css`

.JS source will compile to `all.min.js`

File watching is enabled as long as gulp is running



