<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//

$MAX_ID = 3; //set based on required maximum numbers
/** looping over list of ids of doctors **/
for($id = 1; $id <= $MAX_ID; $id++)
{
  // // Read in a MCI doctor page
    $url = ("https://old.mciindia.org/ViewDetails.aspx?ID=".$id);
  // Find something on the page using css selectors
		$link = file_get_html($url);
   // walk through the dom and extract doctor information
	
     $info['Name']			= $link->find('span[id=Name]',0)->plaintext;
    $info['FatherName']			= $link->find('span[id="FatherName"]',0)->plaintext;
    $info['DOB']			= $link->find('span[id="DOB"]',0)->plaintext;
    $info['YOI']			= $link->find('span[id="lbl_Info"]',0)->plaintext;
   $info['RegNo'] 			= $link->find('span[id="Regis_no"]',0)->plaintext;
   $info['DateReg']			= $link->find('span[id="Date_Reg"]',0)->plaintext;
   $info['SMC']			= $link->find('span[id="Lbl_Council"]',0)->plaintext;
   $info['Qual']		= $link->find('span[id="Qual"]',0)->plaintext;
   $info['QualYear']			= $link->find('span[id="QualYear"]',0)->plaintext;
   $info['Univ']			= $link->find('span[id="Univ"]',0)->plaintext;
   $info['Address']		= $link->find('span[id="Address"]',0)->plaintext;
	if(is_object($info['Name'])){
    scraperwiki::save_sqlite(array('name'), array('name' => $info['Name'] , 'FatherName' => $info['FatherName'],  'YOI' => $info['YOI'], 'DOB' => $info['DOB'], 'RegNo' => $info['RegNo'], 'DateReg' => $info['DateReg'], 'SMC' => $info['SMC'], 'Qual' => $info['Qual'], 'QualYear' => $info['QualYear'], 'Univ' => $info['Univ'], 'Address' => $info['Address'], 'url' => $info['url']));
	
	}
//

	
   


 

// scraperwiki::select("* from data where 'name'='peter'")
// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
}



?>
