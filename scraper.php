<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
$MAX_ID = 3; //set based on required maximum numbers
/** looping over list of ids of doctors **/
for($id = 1; $id <= 1; $id++)
{
  // // Read in a MCI doctor page
    $html = scraperwiki::scrape("https://old.mciindia.org/ViewDetails.aspx?ID=".$id);
  // Find something on the page using css selectors
   $dom = new simple_html_dom();
   $dom->load($html);
   
   // walk through the dom and extract doctor information
    $doc_name = $dom->find('span[id=Name]');
  echo $doc_name
  



}
?>
