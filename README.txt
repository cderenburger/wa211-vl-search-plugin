=== Plugin Name ===
Contributors: (cderenburger)
Donate link: http://win211.org
Tags: 2-1-1, 211, community resources, non-profit, human services, search
Requires at least: 4.0
Tested up to: 4.5.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows health and human service websites the ability search community resources utilizing the Resource House API.

== Description ==

In June 2016 Revation Systems updated the Washington State 2-1-1 Community Resources Directory to the newest version 
of Resource House Public Portal.  This new search engine utilizes a new and enhanced underlying api which allows
for a variety of search keywords, taxonomy terms, location data, and feature filter options.

This plugin was developed to allow community resource and health and human service websites to easily add a search
form to their websites.  

The plugin offers the following features:

 *   Shortcode [win211search] adds a form to any webpage
 *   Form includes an autofill keyword search, autofill location, and search button to execute the search
 *   Plugin converts any link following the specified format (see below) with location data

== Installation ==

1. Download 'win211-search-plugin.zip' from https://github.com/cderenburger/win211-search-plugin
1. From the Plugins menu in your Wordpress Admin area select 'Add New' and press the 'Upload Plugin' button and upload the .zip
   a. Alternately extract and upload 'win211-search-plugin' folder to the '/wp-content/plugins' directory
1. Activate the plugin through the 'Plugins' menu in WordPress


== Creating Links ==

There are two type of links commonly used for resource searches, Keyword and Taxonomy.  Keyword searches are performed by Solr
which will search based on default settings set by the site administrator.  Settings described in the next section.

Keyword Links
The site uses the following url structure to query the database based on the user's entered keyword(s)

     https://www.resourcehouse.info/win211/Search?q={KEYWORDS}
     
Above is the minimum required to create a working link.  A single keyword or series of keywords are placed in the {keyword}
section and the site can perform a search.

Taxonomy Searches
The site can also perform more specific searches based on the AIRS Taxonomy.  Use the taxonomy code in the following url format

    https://www.resourcehouse.info/win211/Search/Topics/{TAXONOMY_CODE}



== Solr Settings ==
As of this writing these settings in Washington are as follows: 
1. Query Parser - Extended Dismax
1. Phrase Slop: 1
1. Multi-Term Match: 2
1. Search Fields: Provider Name, AKA Names, Service Name, Location Name, Taxonomy Terms (topic), Taxonomy Terms (target), 
   Address (city), Address (zip), Taxonomy Synonyms
   a. Not included are: Service Description, Location Description, Address (street), County, Service Keywords, Features
1. Distance Boost: 20 (tiered)
1. Distance Spread: 5
1. Name Boost: 0
1. Topic Boost: 1
1. Term Proximity Boost: 1
1. Term Proximity Distance: 2
1. Auto Radius Threshold: 0
1. Use Service Priority: Yes

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==


= 0.3 =
* Shortcode functionality added to plugin

= 0.2 =
* Build url code added and edited, plugin now functioning

= 0.1 =
* Repository initiated, Minnesotahelp.info code rolled in to plugin

