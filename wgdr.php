<?php

/***************************************************************************

Plugin Name:  WooCommerce Google Dynamic Retargeting tag
Plugin URI:   http://www.wolfundbaer.ch
Description:  This plugin integrates the Google Dynamic Retargeting Tracking code with customized variables in a WooCommerce shop. It enables to run dynamic retargeting campaigns with customized content based on previous user behavior. There are a few requirements for this plugin to run. The first and most obvious is you need WooCommerce running on your Wordpress installation. The second requirement is a Google Merchant Center account into which you have uploaded all your products. There is a Woocommerce plugin called Google Product Feed which can do that for you and with which this plugin has been tested. If you use a different way to upload your products into Google Merchant Center (GMC) the plugin might need some tweaking as it is important to match the product ID from WooCommerce with the product ID which has been uploaded into the GMC. Also this plugin has been tested with the Wootique Theme. As long as your theme includes the woo_foot hook it should work. Otherwise the plugin needs again some more tweaking (eg. firing the tag in wp_header or wp_footer). In a future version I also would like to include support for the Google Tag Manager.
Version:      0.1.3
Author:       Wolf & Bär
Author URI:   http://www.wolfundbaer.ch

**************************************************************************/


add_action('activate_wgdr/wgdr.php', array('wgdr','wgdr_options_init'));

class WGDR{
	
	
	public function __construct(){
		// add the admin options page
		add_action('admin_menu', array($this, 'wgdr_plugin_admin_add_page'));
		// add the admin settings and such
		add_action('admin_init', array($this, 'wgdr_plugin_admin_init'));
			
		// checking if WooCommerce is running. If yes let the plugin do it's magic.
		//if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			
			// using the woo_foot hook leads to problems with some themes. using wp_footer instead should solve it for all themes, as long as they use the standard wp_footer hook
			// add_action('woo_foot', array($this, 'google_dynamic_retargeting_code'));
			add_action('wp_footer', array($this, 'google_dynamic_retargeting_code'));
		//}
		
		// add a settings link on the plugins page
		add_filter('plugin_action_links', array($this, 'wgdr_settings_link'), 10, 2);
	}
	
	// adds a link on the plugins page for the wgdr settings
	function wgdr_settings_link($links, $file) {
		if ($file == plugin_basename(__FILE__))
			$links[] = '<a href="' . admin_url("options-general.php?page=do_wgdr") . '">'. __('Settings') .'</a>';
		return $links;
	}
	
	// get the default options for the plugin
	function wgdr_get_default_options(){
		// default options settings
		$options = array(
			'conversion_ID' => 'test_id',
			'conversion_label' => 'test_label',
			'GMC_prefix' => 'test_prefix',
			'custom_parameters_switch' => true
		);
		return $options;
	}
	
	// set default options at initialization of the plugin
	function wgdr_options_init(){
		// set options equal to defaults
		global $wgdr_options;
		$wgdr_options = get_option('wgdr_options');
		if( false === $wgdr_options ){
			$wgdr_options = wgdr_get_default_options();
		}
		update_option('wgdr_options', $wgdr_options);
	}
	

	/**
		GDR plugin settings page
	**/

	// add the admin options page
	function wgdr_plugin_admin_add_page() {
		add_options_page(
			'WGDR Plugin Page', 					// $page_title
			'WGDR Plugin Menu', 					// $menu_title
			'manage_options', 						// $capability
			'do_wgdr', 								// $menu_slug
			array($this,'wgdr_plugin_options_page'	// callback
		));
	}



	// display the admin options page
	function wgdr_plugin_options_page() {
	
		// Throw a warning if WooCommerce is disabled.
		//if (! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

		//	echo '<div><h1><font color="red"><b>WooCommerce not active -> tag insertion disabled !</b></font></h1></div>';
		//}

	?>

	<br>
<div style="background: #eee; width: 772px">
	<div style="background: #ccc; padding: 10px; font-weight: bold">Configuration for the Google Dynamic Retargeting Tag for WooCommerce</div>
	<form action="options.php" method="post">
		
	<?php settings_fields('wgdr_plugin_options'); ?>
	<?php do_settings_sections('do_wgdr'); ?>
	<br>
 <table class="form-table" style="margin: 10px">
	<tr>
		<th scope="row" style="white-space: nowrap">
			<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" class="button" />
		</th>

</tr>
</table>
	</form>
	
	</div>
	
	<br>
	
	<div style="background: #eee; width: 772px">
		<div style="background: #ccc; padding: 10px; font-weight: bold">Donation</div>
		
	    <table class="form-table" style="margin: 10px">
	   	<tr>
	   		<th scope="row">
				<div style="padding: 10px">This plugin was developed by <a href="http://www.wolfundbaer.ch" target="_blank">Wolf & Bär</a><p>Buy me a beer if you like the plugin.<br>
				If you want me to continue developing the plugin buy me a few more beers. Although, I probably will continue to develop the plugin anyway it would be just much more fun if I had a few beers to celebrate my milestones.</div>

				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="UE3D2AW8YTML8">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
	   		</th>
	   </tr>
	   </table>
	</div>
		
	

	<?php


	// testing options
	//$opt = get_option('wgdr_plugin_options_1');
	//echo 'opt = ' . $opt;
	//echo '<br>opt = ' . $opt['text_string'];
	//echo '<br>';
	//echo  get_option('wgdr_plugin_options_1')['text_string'];
	//var_dump($opt);
	//var_dump($plugin_options_1);
	 
	}

	// add the admin settings and such

	function wgdr_plugin_admin_init(){
		//register_setting( 'plugin_options', 'plugin_options', array($this,'wgdr_plugin_options_validate') );
	
		register_setting( 'wgdr_plugin_options', 'wgdr_plugin_options_1');
		register_setting( 'wgdr_plugin_options', 'wgdr_plugin_options_2');
		register_setting( 'wgdr_plugin_options', 'wgdr_plugin_options_3');
		add_settings_section('wgdr_plugin_main', 'WGDR Main Settings', array($this,'wgdr_plugin_section_text'), 'do_wgdr');
		//add_settings_section('wgdr_plugin_main', 'WGDR Main Settings', 'wgdr_plugin_section_text', 'do_wgdr');
		add_settings_field('wgdr_plugin_text_string_1', 'Conversion ID', array($this,'wgdr_plugin_setting_string_1'), 'do_wgdr', 'wgdr_plugin_main');
		add_settings_field('wgdr_plugin_text_string_2', 'Conversion label', array($this,'wgdr_plugin_setting_string_2'), 'do_wgdr', 'wgdr_plugin_main');
		add_settings_field('wgdr_plugin_text_string_3', 'Google Merchant Center prefix', array($this,'wgdr_plugin_setting_string_3'), 'do_wgdr', 'wgdr_plugin_main');
	}

	function wgdr_plugin_section_text() {
		// echo '<p>WooCommerce Google Dynamic Retargeting tag settings.</p>';
	}

	/*
	function wgdr_plugin_setting_string_1() {
		$options = get_option('wgdr_plugin_options_1');
		echo "<input id='wgdr_plugin_text_string_1' name='wgdr_plugin_options_1[text_string]' size='40' type='text' value='{$options['text_string']}' />";	
	}
	*/

	function wgdr_plugin_setting_string_1() {
		$options = get_option('wgdr_plugin_options_1');
		echo "<input id='wgdr_plugin_text_string_1' name='wgdr_plugin_options_1[text_string]' size='40' type='text' value='{$options['text_string']}' /><br>Follow this <a href=\"https://support.google.com/adwords/answer/2476688?hl=en\" target=\"_blank\">link</a> and go to the section \"Get your remarketing tag code\" to find this value. It will be within the tag code.";	
	}

	function wgdr_plugin_setting_string_2() {
		$options = get_option('wgdr_plugin_options_2');
		echo "<input id='wgdr_plugin_text_string_2' name='wgdr_plugin_options_2[text_string]' size='40' type='text' value='{$options['text_string']}' /><br>This field is <u>optional</u>. Leave it empty if you don't use a customized AdWords remarketing tag.";
	}

	function wgdr_plugin_setting_string_3() {
		$options = get_option('wgdr_plugin_options_3');
		echo "<input id='wgdr_plugin_text_string_3' name='wgdr_plugin_options_3[text_string]' size='40' type='text' value='{$options['text_string']}' /><br>If you use the WooCommerce Google Product Feed Plugin the value here should be \"woocommerce_gpf_\"";
	}

	// validate our options
	function wgdr_plugin_options_validate($input) {
		$newinput['text_string'] = trim($input['text_string']);
		if(!preg_match('/^[a-z0-9]{32}$/i', $newinput['text_string'])) {
			$newinput['text_string'] = '';
		}
		return $newinput;
	}



	private function get_conversion_id(){

		$opt = get_option('wgdr_plugin_options_1');
		$conversion_id = $opt['text_string'];
		return $conversion_id;
	}

	private function get_conversion_label(){

		$opt = get_option('wgdr_plugin_options_2');
		$conversion_label = $opt['text_string'];
		return $conversion_label;
	}

	private function get_mc_prefix(){

		$opt = get_option('wgdr_plugin_options_3');
		$mc_prefix = $opt['text_string'];
		return $mc_prefix;
	}
	

	/** 
		Google Dynamic Retargeting tag
		Includes a workaround to get the most recent order ID. This needs improvement.
	**/

	
	public function google_dynamic_retargeting_code(){

		global $woocommerce;

		//$conversion_id = '9876543210';
		//$conversion_id = $this->get_conversion_id();
		$opt  = get_option('wgdr_plugin_options_1');
		$conversion_id = $opt['text_string'];
		//$conversion_label = 'yYyYyYyY';
		$conversion_label = $this->get_conversion_label();
		//$mc_prefix = 'woocommerce_gpf_';
		$mc_prefix = $this->get_mc_prefix();

		?>

		<!-- Google Code for Dynamic Retargeting --><?php

		// is_home() doesn't work in my setup. I don't know why. I'll use is_front_page() as workaround
		if(is_front_page()){
		?>

		<script type="text/javascript">
		var google_tag_params = {
		ecomm_prodid: '',
		ecomm_pagetype: 'home',
		ecomm_totalvalue: ''
		};
		</script>	
		<?php

		}
		/** elseif (is_product_category()){
			?>

			<script type="text/javascript">
			var google_tag_params = {
			ecomm_prodid: '123',
			ecomm_pagetype: 'product',
			ecomm_totalvalue: '99.00'
			};
			</script>
			<?php
		}
		*/

		elseif (is_product()){

		?>

		<script type="text/javascript">
		var google_tag_params = {
		ecomm_prodid: '<?php echo $mc_prefix.get_the_ID(); ?>',
		ecomm_pagetype: 'product',
		ecomm_totalvalue: '<?php 
									$product = get_product( get_the_ID() );
									echo $product->get_price();
	
								?>'
		};
		</script>


		<?php

		}
		elseif (is_cart()){

		?>

		<script type="text/javascript">
		var google_tag_params = {
		ecomm_prodid: [<?php 

		$cartprods = $woocommerce->cart->get_cart();
		$cartprods_count = count($cartprods);
		$cartprods_index = '1';
		// need to set type of $cartprods_index to integer, otherwise it will not be recognized as a number when comparing it later in the if clause
		settype($cartprods_index, "integer");
	
		foreach($cartprods as $entry){

			echo '\'';
			echo $mc_prefix.$entry['product_id'];
			echo '\'';

			if($cartprods_index !== $cartprods_count){
			echo ', ';
			$cartprods_index++;
			}	
		}

		?>],
		ecomm_pagetype: 'cart',
		ecomm_totalvalue: <?php echo $woocommerce->cart->cart_contents_total; ?>
		};
		</script>
		<?php

		}
		elseif (is_order_received_page()){
	
			global $wpdb;
			$recent_order_id = $wpdb->get_var( 
				"
					SELECT MAX(id)
					FROM $wpdb->posts
				"
			);
	
			$order = new WC_order($recent_order_id);
			$order_total = $order->get_total();
			$items = $order->get_items();
			$items_count = count($items);
			$items_index = '1';
			// need to set type of $cartprods_index to integer, otherwise it will not be recognized as a number when comparing it later in the if clause
			settype($items_index, "integer");
	
		?>

		<script type="text/javascript">
		var google_tag_params = {
		ecomm_prodid: [<?php 

			foreach ( $items as $item ) {
   
			    echo '\'';
				echo $mc_prefix.$item['product_id'];
				echo '\'';
		
				if($items_index !== $items_count){
				echo ', ';
				$items_index++;
				}

			}

		?>],
		<?php 

		?>ecomm_pagetype: 'purchase',
		ecomm_totalvalue: '<?php echo $order_total; ?>'
		};
		</script>
		<?php

		}
		else{
		?>

		<script type="text/javascript">
		var google_tag_params = {
		ecomm_prodid: '',
		ecomm_pagetype: 'siteview',
		ecomm_totalvalue: ''
		};
		</script>
		<?php	
				
		}

		?>

		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = <?php echo $conversion_id; ?>;
		<?php if($conversion_label){ echo "var google_conversion_label = \"" . $conversion_label ."\";";} ?>
		
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript> 
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/<?php echo $conversion_id; ?>/?value=0&amp;<?php if($conversion_label){ echo "label=" . $conversion_label . "&amp;";} ?>guid=ON&amp;script=0"/>
		</div>
		</noscript>

		<?php
	}

}

$wgdr = new WGDR();


?>
