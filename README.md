

<p align="center">
  <a href="https://github.com/dxvil-exe/Q-Bit">
    <img src="https://github.com/dxvil-exe/Q-Bit/raw/master/assets/images/qbit_trans_blue.png" width="150px" height="150px" align="center">
  </a>
</p>

# Security status

[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=dxvil-exe_Q-Bit&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=dxvil-exe_Q-Bit)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=dxvil-exe_Q-Bit&metric=bugs)](https://sonarcloud.io/summary/new_code?id=dxvil-exe_Q-Bit)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=dxvil-exe_Q-Bit&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=dxvil-exe_Q-Bit)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=dxvil-exe_Q-Bit&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=dxvil-exe_Q-Bit)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=dxvil-exe_Q-Bit&metric=sqale_index)](https://sonarcloud.io/summary/new_code?id=dxvil-exe_Q-Bit)
# Q-Bit

CSS is made using [TailwindCSS](https://tailwindcss.com) and program is written using PHP, CSS and HTML.

## Instalation

Download zip from github repository and extract it to folder of your choice `(e.g. /var/www/)`

## Usage

Connection to database is set in `functions/connectSQL.php`

```php
$serverName = "serverIP";
$username = "databaseUsername";
$password = "databasePassword";
$database = "databaseNameYouConnectTo";
```

custom fields and database setup is in `functions/login.php`

```php
$sql = "select * from users where username = '$username' and password = '$password'";
```

## Customization

To customize styling (CSS) put website into folder called `src` and to folder where has been your website issue command `npm install -D tailwindcss` and `npx tailwindcss init`. After that edit `tailwind.config.js` like this:

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,phtml,php}"],
  theme: {
    extend: {
      fontFamily: { //custom declaration of font family
        "montserrat-bold": "Montserrat-Bold", 
        "montserrat-light": "Montserrat-Light",
        "montserrat": "Montserrat-Regular"
      },
      boxShadow: { //custom declaration of styling for box shadow
        "glow-sm": "0 0 10px" 
      }
    },
  },
  plugins: [],
}
```

Into `input.css` add following lines:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;


/** oh yes, declaration again... but I promise it is for the last time */
@font-face {
    font-family: "Montserrat-Bold";
    src: url(../fonts/Montserrat-Bold.ttf);
}

@font-face {
    font-family: "Montserrat-Light";
    src: url(../fonts/Montserrat-Light.ttf);
}

@font-face {
    font-family: "Montserrat-Regular";
    src: url(../fonts/Montserrat-Regular.ttf);
}
```

and to update website for new styling use this command:

```bash
npx tailwindcss -i ./input.css -o ./src/style/style.css --watch
```

Folder should look like this:

```text
node_modules/
src/
input.css
package-lock.json
package-json
tailwind.config.js
```

### Custom fonts

If you want custom fonts into your website without using additional css follow these steps. First, add your font to `src/assets/fonts/`. After that add those lines of code into `input.css` (of course with your provided values)

```css
@font-face {
  font-family: "name of font";
  src: url(../fonts/name_of_font.ttf);
}
```

into `tailwind.config.js` add those lines of code to declare new font in css (of course with your provided values)

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,phtml,php}"],
  theme: {
    extend: {
      fontFamily: {
        "font-name-in-css": "font-name-from-inputcss"
      },
    },
  },
  plugins: [],
}
```

## Credits

Thanks for using the product and helping me. If you wanna support me, you can do so by [donating](https://paypal.me/ZeroDataException).
