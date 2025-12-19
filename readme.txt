== WPCE - WooCommerce Parts Compatibility Editor ==
The "Woocommerce Parts Compatibility Editor" helps you to create unlimited product finders in a single website.

== Features / Highlights  ==
* User-friendly, responsive, highly customizable and easy to use.
* Well optimized for large volume data.
* Create unlimited finders for search products from large database.
* Create any number of dropdowns into each finders as per your requirements.
* Display finders on any page using widget or shortcode.
* Supports multiple finders on same page.
* Display universal products in search results always.
* Hide "Submit" button and auto submit form on selection from last dropdown.

== Documentation ==
http://wpce.wpinstinct.com/documentation/

== Installation ==
1. Download the `woo-parts-compatibility-editor-plugin.zip` from CodeCanyon and extract/unzip it.
2. From extracted directory, look for `woo-parts-compatibility-editor.zip` file.
3. Unzip it and upload it to the `/wp-content/plugins/` directory through any File Manager tool eg: FileZilla.
4. OR simply upload zip file from WordPress admin section under Plugins >> Add New >> Upload Plugin.
5. Activate the plugin through the 'Plugins' menu in WordPress.
6. Visit the "WPCE" Menu from left sidebar.

== Changelog ==

= 1.0 =
* Launched the initial version of the plugin

= 1.1 =
* Fixed: Shortcode typo in backend
* Disabled {LEVELn_NAME} from "Search Results Page Title" while nth dropdown is not selected
* Fixed: Duplicate WPCE terms while duplicating a WooCommerce product
* Fixed: PHP Warnings
* Fixed: JS conflict where it wasn't removing previous options form child dropdown before loading new one

= 2.0 =
* Added: Universal Products CSV Importer
* Added: Categories Filter
* Added: Comma ( , ) support for multiple values in each cell using Terms CSV Importer
* Improved: Terms CSV Importer to work smoothly for range based levels ( EG: 2002-2007 )
* Fixed: Warnings related to deprecated functions
* Fixed: PHP 7.x Warnings
* Fixed: So it doesn't show all products when no matching product on search results page
* Fixed: Slow loading "Edit Product" page issue
* Improved: So one can select "multiple" terms from last dropdown on "Edit Product" page

= 3.0 =
* Fixed: Compatibility issues with latest version of PHP, WordPress and WooCommerce
* Fixed: PHP 8.x warnings, errors and deprecated functions/scripts
* Fixed: Duplicate WPCE terms while duplicating a WooCommerce product
* Fixed: JavaScript warnings
* Fixed: Sorting issue with alphanumeric dropdowns
* Fixed: Overlapping text issue with user friendly dropdowns
* Fixed: Terms Importer
* Added: Product tab terms list to load via AJAX which speeds up the initial loading for product details page
* Added: Shortcode for product tab terms list

= 3.1 =
* Fixed: Compatibility issues with latest version of PHP, WordPress and WooCommerce
* Fixed: PHP 8.x warnings, errors and deprecated functions/scripts
* Improved: Terms Importer speed
* Fixed: "Remove Data on Uninstall" issue
* Fixed: HTML tags warnings

= 3.2 =
* Fixed: PHP 8.x warning on term deletion

= 3.3 =
* Tested: Compatibility issues with latest version of PHP, WordPress and WooCommerce
* Fixed: "Reset" functionality conflict with "Current Searches"

= 3.4 =
* Improved: Terms Importer speed a lot
* Fixed: Issue with term titles having double quotes

= 3.5 =
* Fixed: Terms Importer stucks at the end
* Added: A test case while importer fails for any reason
* Fixed: Terms association issue with WooCommerce products sometimes

= 3.6 =
* Tested: Compatibility issues with latest version of PHP, WordPress and WooCommerce
* Fixed terms count issue with import while product not exists