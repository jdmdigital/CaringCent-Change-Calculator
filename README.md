# CaringCent Change Calculator
Custom plugin creates the `[changecalculator]` shortcode for displaying the CaringCent Change Calculator.

## Description
Sometimes seeing is believing.  This standalone plugin as built to display the CaringCent Change Calculator in posts or pages.  Global settings can be set from the plugin's settings page at Settings >> Change Calc.  All these settings can be overridden using shortcode attributes.

We created a quick and dirty demo using the default WordPress theme here: http://bootplate.jdmdigital.co/fab-demo/change-calculator-demo/  It's not the prettiest, but you'll get the idea.

## Basic Installation
1. Upload the plugin directory to /wp-content/plugins/
2. Go to Plugins from the admin
3. Activate the plugin
4. Go to Settings >> Change Calc to set global settings (or leave default)
5. Place the shortcode, <code>[changecalculator]</code> wherever. 
6. Update the page or post where you want the calculator displayed.

## Advanced Installation (recommended)
In order to enable automatic updates moving forward, the "Advanced Installation" using a plugin called GitHub Updater, is recommended.

First off, you’ll need to install a snazzy plugin called GitHub Updater.  It's not allowed on the WordPress.org repo (not surprisingly), so you have to install it manually.  

Here's how: http://labs.jdmdigital.co/plugins/github-updates/

Once that's done, here's how to install this plugin:

1. Go to Settings >> GitHub Updater
2. Click the Install Plugin tab
3. Enter the GitHub Repo URL: https://github.com/jdmdigital/CaringCent-Change-Calculator
4. Leave the Branch blank (we want it to default to "master")
5. Make sure the Remote host is set to "GitHub"
6. Click the "Install Plugin" button
7. Click the "Back to Plugins Page" link after it’s installed
8. Click the "Activate" link below the newly installed plugin.
9. Go to Settings >> Change Calc to set global settings (or leave default)
5. Place the shortcode, `[changecalculator]` wherever. 
6. Update the page or post where you want the calculator displayed.

## Changelog

**1.1 and 1.2**
* CSS Edits
* Production Testing Complete

**0.9**
* Issue Fixes
* Updated CSS
* Ready for Production testing

**0.6**
* Tests and Bug Fixes

**0.5**
* Add uninstallation

**0.4**
* GitHub repo created
* Performance improvements
* Optimize CSS
* Bug Fixes

**0.3**
* Options panel added.

**0.2**
* Styling and javascript

**0.1**
* Initial Release.
