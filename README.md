# WIN211-Search-Plugin


Allows health and human service websites the ability search community resources utilizing the Resource House API.

## Description

In June 2016 Revation Systems updated the Washington State 2-1-1 Community Resources Directory to the newest version of Resource House Public Portal.  This new search engine utilizes a new and enhanced underlying api which allows for a variety of search keywords, taxonomy terms, location data, and feature filter options.

This plugin was developed to allow community resource and health and human service websites to easily add a search form to their websites.  

The plugin offers the following features:

 *   Shortcode ```[win211search]``` adds a form to any Wordpress Page or Post
 *   Form includes an autofill keyword search, autofill location, and search button to execute the search
 *   Plugin converts any link following the specified format (see Usage section) with location data

## Installation

1. Download 'win211-search-plugin.zip' from https://github.com/cderenburger/win211-search-plugin
1. From the Plugins menu in your Wordpress Admin area select 'Add New' and press the 'Upload Plugin' button and upload the .zip
   *  Alternately extract and upload 'win211-search-plugin' folder to the '/wp-content/plugins' directory
1. Activate the plugin through the 'Plugins' menu in WordPress


## Usage

### Adding A Search Form To A Website

To add a basic search form to your Wordpress based site add the following shortcode to a page or post.

`[win211search]`
     
This will create a basic form where a user can enter a keyword search, set their location, and a search button to initiate the search.


### Creating Links

There are two type of links commonly used for resource searches, Keyword and Taxonomy.  Keyword searches are performed by Solr which will search based on default settings set by the site administrator.  Settings described in the Solr section.

#### Keyword Links
Resource House uses the following url structure to query the database based on the user's entered keyword(s)

     https://www.resourcehouse.info/win211/Search?q={KEYWORDS}
     
Above is the minimum required to create a working link.  A single keyword or series of keywords are placed in the {keyword} section and the site can perform a search.

The above example does not require this plugin to operate.  The results of this search will search for the specified keyword(s) statewide.  

The following link example is the expected format, requires use of this plugin, and will allow a user to enter their search location.

    <a href="https://www.resourcehouse.info/win211/Search?q=Dental+Care" target="_blank" 
    data-relativeurl="q=Dental+Care">Dental Care</a>
    
The ```data-relativeurl=``` restates the keyword search.  When a location is selected in the ```[win211search]``` location form this plugin reassembles the url with consisting of the city and zipcode, geocoordinates, county, and the ```data-relavtiveurl=```. 

Additional parameters can also be applied to searches.  Examples given in the Feature Filters section.

#### Taxonomy Searches
The site can also perform more specific searches based on the AIRS Taxonomy.  Use the taxonomy code in the following url format

    https://www.resourcehouse.info/win211/Search/Topics/{TAXONOMY_CODE}/{TAXONOMY_NAME}
    
Taxonomy links require the Taxonomy Name following the Taxonomy Code.  The link can most easily be obtained by visiting 
https://www.resourcehouse.info/win211/Topics and drilling down or by visiting 
https://www.resourcehouse.info/win211/Topics/{TAXONOMY_CODE} and copying the specified url from the Topic List.

> **NOTE:**
>*Any page containing keyword or taxonomy links requires the inclusion of the [win211search] shortcode.  This shortcode displays forms required to set the user's specified city, zipcode, and county region.  When a user selects a location the keyword or taxonomy links will be automatically updated with the selected location information.  This shortcode is not required if you are simply linking to http://win211.org or https://www.resourcehouse.info/win211/Index*

##### Feature Filters
The above example can be extended to include Feature Filters. Filters can be used to further narrow down a list of search results by filtered criteria.  In the above example for 'Dental Care' we could also add to the search parameters the requirement that the results list return services which also accept a particular form of payment, for example 'WA Apple Health (Medicaid)'.  A feature is added to the url by adding:

`f={FEATURE_CATEGORY}%3d{FEATURE_CODE}`

To select appropriate feature codes and obtain the needed parameters perform the keyword search on the website.  On the search results page a list of filters will be offered in the left sidebar which apply to the current search.  Select a filter from the list.  From the url bar on the resulting search page copy the url segment ```&f=[...]``` up to the following ```&```.  Paste this filter code into both the ```url``` and ```data-relativeurl``` sections of your link.  

Below is an example of a search for Dental Care with the Feature WA Apple Health (Medicaid).

    <a href="https://www.resourcehouse.info/win211/Search?q=Dental+Care&f=Payment+options%3dWA+Apple+Health+(Medicaid)" target="blank" 
    data-relativeurl="q=Dental+Care&f=Payment+options%3dWA+Apple+Health+(Medicaid)">
    Dental Services which accept WA Apple Health for Adults</a>
    
#### Solr Settings
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

### [0.6] - 2016-06-04
#### Added
 * Added documentation for creating links for both keyword and taxonomy searches
 * Added documentation on adding features and needed link structures

#### Updated
 - Updated README.txt and README.md

### [0.5] - 2016-06-03
#### Added
 * Added jquery-ui styling from CDN

### [0.4] - 2016-06-02
#### Added
 * Added region selector to keyword and url search
 * Populated autocomplete keyword list from used taxonomy

#### Changed
 * Updated code to reflect the new resourcehouse.info/win211 domain
 * Removed Minnesota Locations from autocomplete

### [0.3] - 2016-05-28
#### Added
* Shortcode functionality added to plugin

### [0.2] - 2016-05-26
#### Added
* Build url code added and edited, plugin now functioning

### [0.1] - 2016-05-19
* Repository initiated, Minnesotahelp.info code rolled in to plugin

## Contributing

1. Create an issue describing a problem or discuss your idea
2. [Fork it](https://github.com/cderenburger/win211-search-plugin/fork)
3. Create your feature branch (`git checkout -b my-new-feature`)
4. Commit your changes (`git commit -am 'Add some feature'`)
5. Publish the branch (`git push origin my-new-feature`)
6. Create a new Pull Request
7. Profit!

See [Contributors](https://github.com/cderenburger/win211-search-plugin/graphs/contributors) 

## License

Released under the [GPLv2](http://www.gnu.org/licenses/gpl-2.0.html).

## Donate
You can donate to this project and WIN211 by visiting http://win211.org/about/donate/
