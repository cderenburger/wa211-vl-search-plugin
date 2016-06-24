<script type="text/javascript">
jQuery(document).ready(function(){
	var ac_cities = {
		source: "/ajax/211search_cities.php",
		select: function(event, ui){
			jQuery("#city").val(ui.item.city);
			jQuery("#geocoor").val(ui.item.geocoor);
			var location =  jQuery("#city").val();
			var geocoor = jQuery("#geocoor").val();
var domain = "www.resourcehouse.com/win211"
var geoloc = "&loc="
var amp = "&".replace(/#038;/g,"")
console.log(location);
jQuery("a[href^='https://www.resourcehouse.info/win211/Search?']").not("a[href^='https://www.resourcehouse.info/win211/CHANGEME']")
.each(function(){
this.href = "https://www.resourcehouse.info/win211/Search?" + jQuery(this).attr('data-relativeurl')+amp+"loc="+location+amp+"geo="+geocoor;
})
		},
		minLength:1
	};
	var ac_keyword = {
		source: "/ajax/211search_keywords.php",
		select: function(event, ui){
			jQuery("#taxname").val(ui.item.taxval);
			var taxonomyname = jQuery ("#taxval").val();
var amp = "&".replace(/#038;/g,"")
console.log(taxname);
		},
		minLength:1
	};
	jQuery("#city").autocomplete(ac_cities);
	jQuery("#taxname").autocomplete(ac_keyword);
});
</script>