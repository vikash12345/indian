<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//

$MAX_ID = 5; //set based on required maximum numbers
/** looping over list of ids of doctors **/
for($id = 1; $id <= $MAX_ID; $id++)
{
  // // Read in a MCI doctor page
    $url = ("https://old.mciindia.org/ViewDetails.aspx?ID=".$id);
  // Find something on the page using css selectors
		$link = file_get_html($url);
   // walk through the dom and extract doctor information
   
//

	
   echo $Name 			= $link->find('span[id=Name]',0)->plaintext;
   echo $FatherName 		= $link->find('span[id="FatherName"]',0)->plaintext;
   echo $DOB			= $link->find('span[id="DOB"]',0)->plaintext;
   echo $YOI			= $link->find('span[id="lbl_Info"]',0)->plaintext;
   echo $RegNo 			= $link->find('span[id="Regis_no"]',0)->plaintext;
   echo $DateReg		= $link->find('span[id="Date_Reg"]',0)->plaintext;
   echo $SMC			= $link->find('span[id="Lbl_Council"]',0)->plaintext;
   echo $Qual			= $link->find('span[id="Qual"]',0)->plaintext;
   echo $QualYear		= $link->find('span[id="QualYear"]',0)->plaintext;
   echo $Univ			= $link->find('span[id="Univ"]',0)->plaintext;
   echo $Address		= $link->find('span[id="Address"]',0)->plaintext;
 
 		scraperwiki::save_sqlite(array('name'), array('name' => $Name , 'FatherName' => $FatherName,  'YOI' => $YOI,'DOB' => $DOB, 'RegNo' => $RegNo, 'DateReg' => $DateReg, 'SMC' => $SMC, 'Qual' => $Qual, 'QualYear' => $QualYear, 'Univ' => $Univ, 'Address' => $Address, 'url' => $url));

// scraperwiki::select("* from data where 'name'='peter'")
// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
}

?>
