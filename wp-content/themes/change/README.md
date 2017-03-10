# edge_starter
[![WPGulp](https://img.shields.io/badge/Built%20For%20WordPress-%E2%93%A6-lightgrey.svg?style=flat-square)](https://github.com/edgedesignltd/edge_starter/) [![](https://img.shields.io/wordpress/v/akismet.svg?maxAge=2592000&style=flat-square&label=WordPress)](https://github.com/edgedesignltd/edge_starter/)[![GitHub release](https://img.shields.io/github/release/qubyte/rubidium.svg?maxAge=2592000)](https://github.com/edgedesignltd/edge_starter/releases/tag/V1.0.1)

An advanced but portable Gulp workflow for WordPress.

![](https://i.imgur.com/zzoByRC.png)

## ⓦ What Can WPGulp Do?
1. Live reloads browser with BrowserSync
2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps, CSS minification, and Merging Media Queries
3. JS: Concatenates & uglifies Vendor and Custom JS files
4. Images: Minifies PNG, JPEG, GIF and SVG images
5. Watches files for changes in CSS or JS
6. Watches files for changes in PHP
7. Corrects the line endings
8. InjectCSS instead of browser page reload
 
## 🎗 Getting Started?

### → STEP #1: Editing the Project Variables
Configure the project variables E.g. paths, translation data, etc in the `gulpfile.js`. Project variables can be found between the following two comments
```JS
// START Editing Project Variables.
{PROJECT VARIABLES}
// STOP Editing Project Variables.
```
Use find and replace on the project folder and search for 'edge_starter', replace this with the name of your new project.

### → STEP #2: Installing NodeJS, NPM and Gulp
You need to have NodeJS & NPM installed. If it is installed, skip to installing Gulp. Otherwise download [NodeJS](https://nodejs.org/en/download/) and install it. After installing NodeJS you can verify the install of both NodeJS and Node Package Manager by typing the following commands. This step needs to be followed only once, if you don't have NodeJS installed. No need to repeat it ever again.
```bash
node -v
# Results into v4.2.6

npm -v
# Results into 3.9.0
```

NodeJS and NPM are installed, now we need to install `Gulp` globally. To do that, run the following command
```bash
# For MAC OS X; run the following command with supper user
sudo npm install --global gulp

# For Linux; run the following command
npm install --global gulp
```

### → STEP #3: Installing Node Dependencies
We are in the root folder of our WordPress plugin or WordPress theme at the moment, let's install the Node Dependencies. In the terminal run this command and wait for it to download all the NodeJS dependencies. It's a one time process and can take about 5 mins depending upon the internet speed of your connection.

```bash
# For MAC OS X run the following command with supper user
sudo npm install

# For Linux run the following command
npm install
```

### → STEP #4: Just run `Gulp`
Once the NodeJS dependencies are downloaded just run the following command to get up and running with WPGulp
```bash
# To start gulp
gulp

# To stop gulp press CTRL (⌃) + C
```

### Project Dependencies
- Built with `Mac OS X` but tested and works well with `Linux` as well as `Windows`.
- You must have [Git](https://git-scm.com/) and [NodeJS](https://nodejs.org/en/download/), and [Gulp](http://gulpjs.com/) installed globally. 
