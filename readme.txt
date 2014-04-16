=== Plugin Name ===
Contributors: alekv
Donate link: http://www.wolfundbaer.ch/donations/
Tags: WooCommerce, Google AdWords, dynamic remarketing tag
Requires at least: 3.1
Tested up to: 3.9
Stable tag: 0.1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin integrates the Google Dynamic Retargeting Tracking code with customized variables in a WooCommerce shop.

== Description ==

Do you have a WooCommerce shop and want to run dynamic remarketing campaigns with Google AdWords? This plugin will insert a customized remarketing tag on all your shop pages. Google AdWords will then be able to collect customer behaviour data (product viewers, buyers, order value, cart abandoners, etc). Based on this data you will be able to run targeted remarketing campaigns as well as increase the search ad bids for past visitors of your shop (RLSA). 

There are a few requirements for this plugin to run. 

* WooCommerce
* Google Merchant Center Account with all products uploaded
* WooCommerce Google Product Feed plugin or something similar to upload the products to the Google Merchant Center
* AdWords account with a configured remarketing tag

Once all of this has been set up correctly Google AdWords will collect the remarketing lists. With those lists you will be able to use Remarketing Lists for Search Ads (RLSA) and Dynamic Display Ads.  

The WGDR plugin has been tested with the current versions of WordPress, WooCommerce, the Google Product Feed plugin, the Wootique and several other themes.

Please find more interesting information on following pages:

Dynamic Display Ads: http://www.google.com/ads/innovations/dynamicdisplayads.html
Dynamic Remarketing: http://www.google.com/think/products/dynamic-remarketing-for-retail.html
RLSA: https://www.youtube.com/watch?v=vkOHdEx1PQY
 
== Installation ==

1. Upload the WGDR plugin directory into your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Get the AdWords conversion ID and the conversion label. If you are not using a customized remarketing tag then you will only need to enter the conversion ID and leave the conversion label empty. You will find one or both values in the AdWords remarketing tag. https://support.google.com/adwords/answer/2476688
4. In the WordpPress admin panel go to settings and then into the WGACT plugin menu. Please enter the conversion ID and if available the conversion label into their respective fields. 
5. Also add the Google Merchant Center prefix. If you are using the WooThemes Google Product Feed plugin (http://www.woothemes.com/products/google-product-feed/) then the prefix is "woocommerce_gpf_". If you are using one of the two free Google Merchant Center feed plugins from here http://wordpress.org/plugins/woocommerce-google-merchant-center-feed/ or here http://www.victorciobanu.com/free-woocommerce-product-feed-plugin/ then just leave the prefix empty "".
6. Use the Google Tag Assistant browser plugin to test the tracking code.

== Frequently Asked Questions ==

= How do I check if the plugin is working properly? =

Download the Google Tag Assistant browser plugin. It is a powerful tool to validate all Google tags on your pages.

= What is a customized remarketing tag? =

If you want to use a longer cookie validity time like 360 days (up to 540 days) then you will have to configure a customized remarketing tag. I would suggest to configure one anyway, and you only will need just one customized tag.
* Once you have configured the customized remarketing tag make sure to set the cookie validity to 540 days and track all pages. Based on this remarketing tag you will be able to define any sort of rules to match your tracking needs, which is why you only need one remarketing tag.
* The plugin will be able to work with the customized tag. This means you don't need to additionally add the customized remarketing tag on your website. Just add the conversion label from the customized remarketing tag into the the according field in the WGDR plugin. 


= Where can I report a bug or suggest improvements? =

Please report your bugs and support requests in the support forum for this plugin: http://wordpress.org/support/plugin/woocommerce-google-dynamic-retargeting-tag

I will need some data to be able to help you.

* Website address
* WordPress version
* WooCommerce version
* WooCommerce theme and version of the theme
* The AdWords remarketing tags conversion ID and conversion label

(Most of these information is publicly viewable on your webpage. If you still want to keep it private don't hesitate to send me a support request to info@wolfundbaer.ch)


== Screenshots ==
1. Validate the configuration of the plugin with the Google Tag Assistant

== Changelog ==

= 0.1.3 =
* Added settings field to the plugin page.
= 0.1.2 =
* The code reflects now that the conversion_label field is optional.
= 0.1.1 =
* Changed the woo_foot hook to wp_footer to avoid problems with some themes. This should be more compatible with most themes as long as they use the wp_footer hook. 
= 0.1 =
* This is the initial release of the plugin.
