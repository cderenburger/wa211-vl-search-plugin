=== Plugin Name ===
Contributors: (cderenburger)
Donate link: http://wa211.org
Tags: 2-1-1, 211, community resources, non-profit, human services, search
Requires at least: 4.0
Tested up to: 5.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows health and human service websites the ability search community resources utilizing the Resource House URL structure.

== Description ==

In July 2018 Washington State 2-1-1 migrated the Community Resources Directory Visionlink Community OS.

This plugin was developed to allow curated VL search links to change the zipcode.  

The plugin offers the following features:

 *   Shortcode [win211search] adds a form to any webpage
 *   Form includes an autofill keyword search, autofill location, and search button to execute the search
 *   Plugin converts any link following the specified format (see below) with location data

== Installation ==

1. Download 'wa211-vl-search-plugin.zip' from https://github.com/cderenburger/wa211-vl-search-plugin
2. From the Plugins menu in your Wordpress Admin area select 'Add New' and press the 'Upload Plugin' button and upload the
.zip
   a. Alternately extract and upload 'wa211-vl-search-plugin' folder to the '/wp-content/plugins' directory
3. Activate the plugin through the 'Plugins' menu in WordPress


== Usage ==

Adding A Search Form To A Website
To add a basic search form to your Wordpress based site add the following shortcode to a page or post.

[wa211search]

This will create a basic form where a user can enter a keyword search, set their location, and a search button to initiate 
the search.

Search Form
Shortcodes cannot be used in sidebars or as widgets without the use of other plugins. Instead of using the shortcode, you
can add a keyword and location search form to a sidebar or other locations. Place a Text Widget into your sidebar and
include the following html code.

    <form id="keyword" name="keyword" action="/wp-content/plugins/wa211-vl-search-plugin/public/php/211search_keyprocess.php" 
    method="post" target="_new" method="get">
        <p><input type="text" name="city" id="city" value="" placeholder="Location" />
        <input type="text" name="geocoor" id="geocoor" value="" />
        <input type="text" name="region" id="region" value=""/>
        <input type="submit" value="Search" id="search">
    </form>



The following link example is the expected format, requires use of this plugin, and will allow a user to enter their search
location.

   <a href="https://www.resourcehouse.info/win211/Search?q=Dental+Care" target="_blank" 
   data-relativeurl="Dental+Care">Dental Care</a>

The data-relativeurl= restates the tax_id. When a location is selected in the [wa211search] location form this
plugin reassembles the url consisting of the city and zipcode, geocoordinates, county, and the data-relavtiveurl=.
