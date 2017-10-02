=== Plugin Name ===
Contributors: (cderenburger)
Donate link: http://win211.org
Tags: 2-1-1, 211, community resources, non-profit, human services, search
Requires at least: 4.0
Tested up to: 4.8.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows health and human service websites the ability search community resources utilizing the Resource House URL structure.

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
2. From the Plugins menu in your Wordpress Admin area select 'Add New' and press the 'Upload Plugin' button and upload the
.zip
   a. Alternately extract and upload 'win211-search-plugin' folder to the '/wp-content/plugins' directory
3. Activate the plugin through the 'Plugins' menu in WordPress


== Usage ==

Adding A Search Form To A Website
To add a basic search form to your Wordpress based site add the following shortcode to a page or post.

[win211search]

This will create a basic form where a user can enter a keyword search, set their location, and a search button to initiate 
the search.

Search Form
Shortcodes cannot be used in sidebars or as widgets without the use of other plugins. Instead of using the shortcode, you
can add a keyword and location search form to a sidebar or other locations. Place a Text Widget into your sidebar and
include the following html code.

    <form id="keyword" name="keyword" action="/wp-content/plugins/win211-search-plugin/public/php/211search_keyprocess.php" 
    method="post" target="_new" method="get">
        <input id="taxname" name="taxname" onclick="this.value='';" type="text" name="keyword" value="" placeholder="What are you looking for?" maxlength="30" /> 
        <p><input type="text" name="city" id="city" value="" placeholder="Location" />
        <input type="text" name="geocoor" id="geocoor" value="" />
        <input type="text" name="region" id="region" value=""/>
        <input type="submit" value="Search" id="search">
    </form>


==Creating Links==

There are two type of links commonly used for resource searches, Keyword and Taxonomy. Keyword searches are performed by
Solr which will search based on default settings set by the site administrator. Settings described in the Solr section.

*Keyword Links*
Resource House uses the following url structure to query the database based on the user's entered keyword(s)

   https://www.resourcehouse.info/win211/Search?q={KEYWORDS}

Above is the minimum required to create a working link. A single keyword or series of keywords are placed in the {keyword}
section and the site can perform a search.

The above example does not require this plugin to operate, but it's usefulness is limited and therefore not recommended.
This link will search for the specified keyword(s) statewide.

The following link example is the expected format, requires use of this plugin, and will allow a user to enter their search
location.

   <a href="https://www.resourcehouse.info/win211/Search?q=Dental+Care" target="_blank" 
   data-relativeurl="Dental+Care">Dental Care</a>

The data-relativeurl= restates the keyword search. When a location is selected in the [win211search] location form this
plugin reassembles the url consisting of the city and zipcode, geocoordinates, county, and the data-relavtiveurl=.

Additional paramaters can also be applied to searches. Examples given in the Feature Filters section.

*Taxonomy Searches*
The site can also perform more specific searches based on the AIRS Taxonomy. Use the taxonomy code in the following url
format

   https://www.resourcehouse.info/win211/Search/Topics/{TAXONOMY_CODE}/{TAXONOMY_NAME}

Taxonomy links require the Taxonomy Name following the Taxonomy Code. The link can most easily be obtained by visiting
https://www.resourcehouse.info/win211/Topics and drilling down or by visiting 
https://www.resourcehouse.info/win211/Topics/{TAXONOMY_CODE} and copying the specified url from the Topic List.

Below is an example of a taxonomy search for Dental Care

   <a href="https://www.resourcehouse.info/win211/Search/Topics/LV-1600/Dental_Care" target="_blank" 
   data-relativeurl="LV-1600/Dental_Care">Dental Care</a>

>NOTE: Any page containing keyword or taxonomy links requires the inclusion of either the [win211search] shortcode or the
>search form html. This shortcode and search form html code display the forms required to set the user's specified city,
>zipcode, geocoordinates, and county region. When a user enters a location, any keyword or taxonomy links will be
>automatically updated with the selected location information. The shortcode or search form code are not required if you
>are simply linking to http://win211.org or https://www.resourcehouse.info/win211/Index

*Feature Filters*
The above examples can be extended to include Feature Filters. Filters can be used to further narrow down a list of search
results by filtered criteria. In the above examples for 'Dental Care' we could also add to the search parameters the
requirement that the results list return services which also accept a particular form of payment, for example 'WA Apple
Health (Medicaid)'. A feature is added to the url by including:

   f={FEATURE_CATEGORY}%3d{FEATURE_CODE}

To select appropriate feature codes and obtain the needed parameters, perform the keyword or taxonomy search for your topic
on the website. On the search results page a list of filters will be offered in the left sidebar which apply to the current
search. Select a filter from the list. From the url bar on the resulting search page copy the url segment &f=[...] up to
the following &. Paste this filter code into both the href and data-relativeurl sections of your link.

Below is an example of a search for Dental Care with the Feature WA Apple Health (Medicaid).

   <a href="https://www.resourcehouse.info/win211/Search?q=Dental+Care&f=Payment+options%3dWA+Apple+Health+(Medicaid)"
   target="blank" data-relativeurl="Dental+Care&f=Payment+options%3dWA+Apple+Health+(Medicaid)">
   Dental Services which accept WA Apple Health</a>
   
And an example of a taxonomy based search link with the Feature WA Apple Health (Medicaid).

   <a href="https://www.resourcehouse.info/win211/Search/Topics/LV-1600/Dental_Care&f=Payment+options%3dWA+Apple+
   Health+(Medicaid)" target="_blank" data-relativeurl="LV-1600/Dental_Care&f=Payment+options%3dWA+Apple+Health+
   (Medicaid)">Dental Care which accepts WA Apple Health</a>
   
Multiple features can be combined if desired. To include additional features in a link append 
    &f={FEATURE_CATEGORY}%3d{FEATURE_CODE} 
to the end of the link and data-relativeurl.

*Solr Settings*
As of this writing these settings in Washington are as follows:

Query Parser: Extended Dismax
Phrase Slop: 1
Multi-Term Match: 2
Search Fields: Provider Name, AKA Names, Service Name, Location Name, Taxonomy Terms (topic), Taxonomy Terms (target),
   Address (city), Address (zip), Taxonomy Synonyms
Not included are: Service Description, Location Description, Address (street), County, Service Keywords, Features
Distance Boost: 20 (tiered)
Distance Spread: 5
Name Boost: 0
Topic Boost: 1
Term Proximity Boost: 1
Term Proximity Distance: 2
Auto Radius Threshold: 0
Use Service Priority: Yes
