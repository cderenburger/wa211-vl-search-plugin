<?php
// Add Shortcode
/* function win211search_shortcode() {

	ob_start();
	<form id="keyword" name="keyword" action="/wp-content/plugins/win211-search-plugin/public/php/demo_keyprocess.php" method="post" target="_new" method="get">
	<input id="taxname" name="taxname" onclick="this.value='';" type="text" name="keyword" value="Type a keyword" maxlength="30" /> 
		 <p><label for="city">City or Zipcode</label><br />
			 <input type="text" name="city" id="city" value="" /></p>
		 <p><label for="geocoor">Geocoordinates</label><br />
			 <input type="text" name="geocoor" id="geocoor" value="" /></p>
	<input type="submit" value="Search" id="search">
	</form>
	return ob_get_clean();

}
add_shortcode( 'win211search', 'win211search_shortcode' ); */

			// Add Shortcode [win211search] to add html forms to page
//public function win211search_register_shortcodes(){
	function win211search_shortcode() {
			/* buffer form code */
			ob_start();  
			?>
			
			<form id="211-keyword" name="211-keyword" <?php echo 'action="' . plugin_dir_url( __FILE__ ) . 'demo_keyprocess.php' .'" ' ; ?> method="post" target="_new" method="get"/>
				<input id="taxname" name="taxname" onclick="this.value='';" type="text" name="keyword" value="" placeholder="What are you looking for?" maxlength="30" /> 
				<p><input type="text" name="city" id="city" value="" placeholder="Location" />
				<input type="text" name="geocoor" id="geocoor" value="" />
				<input type="text" name="region" id="region" value=""/>
				<input type="submit" value="Search" id="search">
			</form>
			
			<?php
			
			/* store code into sc */
			$sc = ob_get_contents();
			
			/* clean buffer */
			ob_end_clean();
			return $sc;
			
	
		
		}
		add_shortcode( 'win211search', 'win211search_shortcode' );

		
?>
