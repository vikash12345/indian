<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//

$MAX_ID = 1; //set based on required maximum numbers
/** looping over list of ids of doctors **/
for($id = 1; $id <= $MAX_ID; $id++)
{
  // // Read in a MCI doctor page
    $url = ("https://old.mciindia.org/ViewDetails.aspx?ID=".$id);
  // Find something on the page using css selectors
		$link = file_get_html($url);
   // walk through the dom and extract doctor information
   
//
  $info = $link->find('span[id=Name]', 0);
  
  echo $info;

  
  

// scraperwiki::select("* from data where 'name'='peter'")
// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
}
?>
