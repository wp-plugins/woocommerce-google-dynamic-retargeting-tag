=== Plugin Name ===
Contributors: alekv
Donate link: http://www.wolfundbaer.ch/donations/
Tags: WooCommerce, Google AdWords, dynamic remarketing tag
Requires at least: 3.0.1
Tested up to: 3.6.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin integrates the Google Dynamic Retargeting Tracking code with customized variables in a WooCommerce shop.

== Description ==

This plugin enables to run dynamic retargeting Google AdWords campaigns with customized content based on previous user behavior in a WooCommerce shop. 

There are a few requirements for this plugin to run. 

* WooCommerce

The first and most obvious is you need WooCommerce running on your Wordpress installation. The second requirement is a Google Merchant Center account into which you have uploaded all your products. There is a Woocommerce plugin called Google Product Feed which can do that for you and with which this plugin has been tested. If you use a different way to upload your products into Google Merchant Center (GMC) the plugin might need some tweaking as it is important to match the product ID from WooCommerce with the product ID which has been uploaded into the GMC. Also this plugin has been tested with the Wootique and Canvas themes. As long as your theme includes the woo_foot hook it should work. Otherwise the plugin needs again some more tweaking (eg. firing the tag in wp_header or wp_footer). In a future version I also would like to include support for the Google Tag Manager.

Please find more interesting information on following pages:

http://www.google.com/ads/innovations/dynamicdisplayads.html
http://www.google.com/think/products/dynamic-remarketing-for-retail.html
https://www.youtube.com/watch?v=vkOHdEx1PQY
http://www.practicalecommerce.com/articles/4095-4-Lessons-from-Google-s-Dynamic-Remarketing-Ads
 
== Installation ==

1. Upload the WGDR plugin directory into your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Get the AdWords conversion ID and the conversion label. You will find both values in the AdWords remarketing tag. https://support.google.com/adwords/answer/2476688
4. In the WordpPress admin panel go to settings and then into the WGACT Plugin Menu. Please enter the conversion ID and the conversion label into their respective fields. 
5. Also add the Google Merchant Center prefix which is "woocommerce_gpf_" if you use the Google Product Feed plugin to upload your products the the Google Merchant Center.

== Frequently Asked Questions ==

= Where can I report a bug or suggest improvements? =

Please report your bugs and support requests in the Support Forum for this plugin.
I will need some Data to be able to help you.
Website address
WordPress version
WooCommerce version
WooCommerce theme and version of the theme
The AdWords remarketing tags Conversion ID and Conversion label
(Most of these information is publicly viewable on your webpage. If you still want to keep it private don't hesitate to send me a support request to info@wolfundbaer.ch)


== Screenshots ==

== Changelog ==

= 0.1 =
* This is the initial release of the plugin.
