=== Plugin Name ===
Contributors: alekv
Donate link: http://www.wolfundbaer.ch/donations/
Tags: WooCommerce, woocommerce, google, Google, AdWords, adwords, dynamic remarketing, dynamic retargeting, dynamic, remarketing, retargeting
Requires at least: 3.1
Tested up to: 4.2.3
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin integrates the Google AdWords Dynamic Remarketing Tracking code with customized variables in a WooCommerce shop.

== Description ==

Do you have a WooCommerce shop and want to run dynamic remarketing campaigns with Google AdWords? This plugin will insert the customized remarketing tag on all your shop pages. Google AdWords will then be able to collect customer behaviour data (product viewers, buyers, order value, cart abandoners, etc). Based on this data you will be able to run targeted remarketing campaigns as well as increase the search ad bids for past visitors of your shop (RLSA). 

<strong>Requirements</strong>

* WooCommerce
* Google Merchant Center Account with all products uploaded
* WooCommerce Google Product Feed plugin or something similar to upload the products to the Google Merchant Center
* AdWords account with a configured remarketing tag

Once all requirements have been met Google AdWords will collect data for the remarketing lists. With those lists you will be able to use Remarketing Lists for Search Ads (RLSA) and Dynamic Display Ads.  

<strong>Installation support</strong>

The entire setup is complex. If you would like us to do the setup for you please contact us under support@wolfundbaer.ch and ask for an offer. 

<strong>Translations</strong>

Thanks to Adrijana Nikolic from http://webhostinggeeks.com for the translation into Serbian.

If you would like to contribute to this plugin with your own translation please drop me an email to support@wolfundbaer.ch

<strong>Similar plugins</strong>

If you like this plugin, have a look at my other AdWords related plugin: https://wordpress.org/plugins/woocommerce-google-adwords-conversion-tracking-tag/

<strong>Support Info:</strong> We will only support installations which run the most current versions of WordPress and WooCommerce.

<strong>More information</strong>

Please find more interesting information on following pages:

Dynamic Display Ads: http://www.google.com/ads/innovations/dynamicdisplayads.html<br>
Dynamic Remarketing: https://www.thinkwithgoogle.com/products/dynamic-remarketing.html<br>
RLSA: https://www.youtube.com/watch?v=vkOHdEx1PQY
 
== Installation ==

1. Upload the WGDR plugin directory into your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Get the AdWords conversion ID and the conversion label. You will find both values in the AdWords remarketing tag. https://support.google.com/adwords/answer/2476688
4. In the WordpPress admin panel go to settings and then into the WGACT plugin menu. Please enter the conversion ID and the conversion label into their respective fields. 
5. Also add the Google Merchant Center prefix which is "woocommerce_gpf_" if you use the Google Product Feed plugin to upload your products the the Google Merchant Center.
6. Use the Google Tag Assistant browser plugin to test the tracking code.

== Frequently Asked Questions ==

= How do I check if the plugin is working properly? =

Download the Google Tag Assistant browser plugin. It is a powerful tool to validate all Google tags on your pages.

= Where can I report a bug or suggest improvements? =

Please report your bugs and support requests in the support forum for this plugin: http://wordpress.org/support/plugin/woocommerce-google-dynamic-retargeting-tag

I will need some data to be able to help you.

* Website address
* WordPress version
* WooCommerce version
* WooCommerce theme and version of the theme
* The AdWords remarketing tags conversion ID and conversion label

(Most of these information is publicly viewable on your webpage. If you still want to keep it private don't hesitate to send me a support request to support@wolfundbaer.ch)


== Screenshots ==
1. Validate the configuration of the plugin with the Google Tag Assistant

== Changelog ==

= 1.0.2 =
* Update: New translation into Serbian
* Update: Change of plugin name
* New: Plugin banner and icon
= 1.0.1 =
* Update: Minor update to the code to make it cleaner and easier to read
= 1.0 =
* New: Internationalization (German)
* New: Category support
= 0.1.4 =
* Update: Increase plugin security
* Update: Moved the settings to the submenu of WooCommerce
* Update: Improved DB handling of orders on the thankyou page
* Update: Code cleanup
* Update: Removed the conversion label. It is not necessary.
= 0.1.3 =
* Added settings field to the plugin page.
= 0.1.2 =
* The code reflects now that the conversion_label field is optional.
= 0.1.1 =
* Changed the woo_foot hook to wp_footer to avoid problems with some themes. This should be more compatible with most themes as long as they use the wp_footer hook. 
= 0.1 =
* This is the initial release of the plugin.
