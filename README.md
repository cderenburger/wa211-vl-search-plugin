# WIN211-Search-Plugin


     Contributors: (cderenburger)
     Donate link: http://win211.org
     Tags: 2-1-1, 211, community resources, non-profit, human services, search
     Requires at least: 4.0
     Tested up to: 4.5.2
     License: GPLv2 or later
     License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows health and human service websites the ability search community resources utilizing the Resource House API.

## Description

In June 2016 Revation Systems updated the Washington State 2-1-1 Community Resources Directory to the newest version 
of Resource House Public Portal.  This new search engine utilizes a new and enhanced underlying api which allows
for a variety of search keywords, taxonomy terms, location data, and feature filter options.

This plugin was developed to allow community resource and health and human service websites to easily add a search
form to their websites.  

The plugin offers the following features:

 *   Shortcode ```[win211search]``` adds a form to any webpage
 *   Form includes an autofill keyword search, autofill location, and search button to execute the search
 *   Plugin converts any link following the specified format (see below) with location data

## Installation

1. Download 'win211-search-plugin.zip' from https://github.com/cderenburger/win211-search-plugin
1. From the Plugins menu in your Wordpress Admin area select 'Add New' and press the 'Upload Plugin' button and upload the .zip
   *  Alternately extract and upload 'win211-search-plugin' folder to the '/wp-content/plugins' directory
1. Activate the plugin through the 'Plugins' menu in WordPress


### Adding A Search Form To A Website

To add a basic search form to your Wordpress based site add the following shortcode to a page or post.

     [win211search]
     
This will create a basic form where a user can enter a keyword search, set their location, and a search button to initiate the search.

## Usage

### Creating Links

There are two type of links commonly used for resource searches, Keyword and Taxonomy.  Keyword searches are performed by Solr
which will search based on default settings set by the site administrator.  Settings described in the next section.

##### Keyword Links
The site uses the following url structure to query the database based on the user's entered keyword(s)

     https://www.resourcehouse.info/win211/Search?q={KEYWORDS}
     
Above is the minimum required to create a working link.  A single keyword or series of keywords are placed in the {keyword}
section and the site can perform a search.

##### Taxonomy Searches
The site can also perform more specific searches based on the AIRS Taxonomy.  Use the taxonomy code in the following url format

    https://www.resourcehouse.info/win211/Search/Topics/{TAXONOMY_CODE}/{TAXONOMY_NAME}
    
Taxonomy links require the Taxonomy Name following the Taxonomy Code.  The link can most easily be obtained by visiting
https://www.resourcehouse.info/win211/Topics and drilling down or by visiting 
https://www.resourcehouse.info/win211/Topics/{TAXONOMY_CODE} and copying the specified url from the Topic List.

> **NOTE:**
>*Any page containing keyword or taxonomy links requires the inclusion of the [win211search] shortcode.  This
shortcode displays forms required to set the user's specified city, zipcode, and county region.  When a user selects a location
the keyword or taxonomy links will be automatically updated with the selected location information.*

### Solr Settings
As of this writing these settings in Washington are as follows: 

1. **Query Parser:** Extended Dismax
1. **Phrase Slop:** 1
1. **Multi-Term Match:** 2
1. **Search Fields:** Provider Name, AKA Names, Service Name, Location Name, Taxonomy Terms (topic), Taxonomy Terms (target), Address (city), Address (zip), Taxonomy Synonyms
   * *Not included are: Service Description, Location Description, Address (street), County, Service Keywords, Features*
1. **Distance Boost:** 20 (tiered)
1. **Distance Spread:** 5
1. **Name Boost:** 0
1. **Topic Boost:** 1
1. **Term Proximity Boost:** 1
1. **Term Proximity Distance:** 2
1. **Auto Radius Threshold:** 0
1. **Use Service Priority:** Yes

## Changelog


**0.5**
 * Added jquery-ui styling from CDN

**0.4**
 * Updated code to reflect the new resourcehouse.info/win211 domain
 * Added region selector to keyword and url search
 * Populated autocomplete keyword list from used taxonomy

**0.3**
* Shortcode functionality added to plugin

**0.2**
* Build url code added and edited, plugin now functioning

**0.1**
* Repository initiated, Minnesotahelp.info code rolled in to plugin