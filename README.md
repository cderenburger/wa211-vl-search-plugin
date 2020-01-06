# WA211-Search-Plugin for WordPress 


Allows health and human service WordPress websites the ability search community resources utilizing the Visionlink URL link structure.

## Description

In July 2018 Washington State 2-1-1 migrated the Community Resources Directory Visionlink Community OS.

This plugin was developed to allow curated VL search links to change the zipcode.  

The plugin offers the following features:

 *   Shortcode ```[wa211search]``` adds a form to any Wordpress Page or Post
 *   Form includes an autofill keyword search, autofill location, and search button to execute the search
 *   Plugin converts any link following the specified format (see Usage section) with location data

## Installation

1. Download 'wa211-vl-search-plugin.zip' from https://github.com/cderenburger/wa211-vl-search-plugin
1. From the Plugins menu in your Wordpress Admin area select 'Add New' and press the 'Upload Plugin' button and upload the .zip
   *  Alternately extract and upload 'wa211-search-plugin' folder to the '/wp-content/plugins' directory
1. Activate the plugin through the 'Plugins' menu in WordPress


## Usage

### Adding A Search Form To A Website

#### Shortcode

To add a basic search form to your Wordpress based site add the following shortcode to a page or post.

`[wa211search]`
     
This will create a basic form where a user can enter a keyword search, set their location, and a search button to initiate the search.

#### Search Form

Shortcodes cannot be used in sidebars or as widgets without the use of other plugins.  Instead of using the shortcode, you can add a keyword and location search form to a sidebar or other locations.  Place a Text Widget into your sidebar and include the following html code.

    <form id="211-keyword" name="211-keyword" action="wp-content/plugins/win211-search-plugin/public/php/211search_keyprocess.php" method="post" target="_new" method="get">
      <p><input type="text" name="city" id="city" value="" placeholder="Location" />
      <input type="text" name="geocoor" id="geocoor" value="" />
      <input type="text" name="region" id="region" value=""/>
      <input type="submit" value="Search" id="search">
    </form>


### Creating Links

The ```data-relativeurl=``` restates the ````tax_id````.  When a location is selected in the ```[wa211search]``` location form this plugin reassembles the url consisting of the city and zipcode, geocoordinates, county, and the ```data-relavtiveurl=```. 



## Changelog

### [1.2.9] - 2020-01-04
#### Updated
 * Updated code for PHP 7.1 Compatability
 

### [1.2.8.1] - 2018-11-18
#### Updated
 * Updated incontact email addresses on city lookup to populate contact form
 
### [1.2.8] - 2018-10-23
#### Added
 * Added incontact email addresses to city lookup to populate contact form

### [1.2.7] - 2018-01-05
#### Updated
 * Updated to latest taxonomy released Jan 4th, 2018


### [1.2.6] - 2017-10-02
#### Updated
 * Updated to latest taxonomy released Oct 2nd, 2017

### [1.2.5] - 2017-06-12
#### Changed
 * Address potential security issue.

### [1.2.4] - 2017-05-02
#### Changed
 * Fixes issue with Topic links with included Features or Regions to have a question mark appended.
 * Increase autosuggest of both cities and keywords to 10 entries.
 * Updated to new taxonomy table as of 03-20-2017. 

#### Added
 * Added Counties to autosuggest list.  Data from US Census.
 * Added YH Codes to suggestion list.

### [1.2.3] - 2016-09-20
#### Changed
 * Fixes issue with overlapping citites and zipcodes.

### [1.2.2] - 2016-07-31
#### Changed
 * Added level 2-6 taxonomy terms, broadening the availablility of terms to the user.

### [1.2.1] - 2016-07-31
#### Added
 * Sets link and keyword searches to be displayed in ascending order rather than default tiered sort.


### [1.2] - 2016-07-07
#### Added
 * Includes plugin update script for updating within WordPress

### [1.1.1] - 2016-07-01
#### Changed
 * Fixes release information

### [1.1] - 2016-06-23
#### Changed
 * Convert static links to dynamic php links using Wordpress plugin_url
 * Edited shortcode to work with dynamic directory path
 * Fixed citiespath in javascript to use dynamic url path
 * Renamed demo_ files to 211search_

### [1.0] - 2016-06-10
 * Initial release

### [0.7] - 2016-06-09
#### Added
 * Added url constructing code for taxonomy links.
 * Added taxonomy documentation to readme files with examples

### [0.6] - 2016-06-04
#### Added
 * Added documentation for creating links for both keyword and taxonomy searches
 * Added documentation on adding features and needed link structures

#### Updated
 * Updated README.txt and README.md

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
