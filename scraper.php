<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
/** looping over list of ids of doctors **/
for($id = 1; $id <= 3; $id++)
	{
    		$url = ("https://old.mciindia.org/ViewDetails.aspx?ID=".$id);
		$link = file_get_html($url);
	if($link){
   // walk through the dom and extract doctor information
		$Name 			= $link->find('span[id=Name]',0)->plaintext;
    		$FatherName 		= $link->find('span[id="FatherName"]',0)->plaintext;
   		$DOB			= $link->find('span[id="DOB"]',0)->plaintext;
    		$YOI			= $link->find('span[id="lbl_Info"]',0)->plaintext;
   		$RegNo 			= $link->find('span[id="Regis_no"]',0)->plaintext;
    		$DateReg		= $link->find('span[id="Date_Reg"]',0)->plaintext;
		$SMC			= $link->find('span[id="Lbl_Council"]',0)->plaintext;
    		$Qual			= $link->find('span[id="Qual"]',0)->plaintext;
    		$QualYear		= $link->find('span[id="QualYear"]',0)->plaintext;
   		$Univ			= $link->find('span[id="Univ"]',0)->plaintext;
   		$Address		= $link->find('span[id="Address"]',0)->plaintext;
		
		
   scraperwiki::save_sqlite(array('name'), array('name' => $Name , 'FatherName' => $FatherName, 'DOB' => $DOB, 'YOI' => $YOI, 'RegNo' => $RegNo, 'DateReg' => $DateReg, 'SMC' => $SMC, 'Qual' => $Qual, 'QualYear' => $QualYear, 'Univ' => $Univ, 'Address' => $Address, 'url' => $url));
}
		}
?>
