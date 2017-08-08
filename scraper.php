<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
/** looping over list of ids of doctors **/
for($id = 1; $id <= 3; $id++)
	{

	$url = ("https://old.mciindia.org/ViewDetails.aspx?ID=".$id);
	$link2 = file_get_html($url);
   
   // walk through the dom and extract doctor information
   $info['doc_name'] = $link2->find('span[id=Name]',0)->plaintext;
   $info['doc_fname'] = $link2->find('span[id="FatherName"]')->plaintext;
   $info['doc_dob'] = $link2->find('span[id="DOB"]')->plaintext;
   $info['doc_infoyear'] = $link2->find('span[id="lbl_Info"]')->plaintext;
   $info['doc_regnum'] = $link2->find('span[id="Regis_no"]')->plaintext;
   $info['doc_datereg'] = $link2->find('span[id="Date_Reg"]')->plaintext;
   $info['doc_council'] = $link2->find('span[id="Lbl_Council"]')->plaintext;
   $info['doc_qual'] = $link2->find('span[id="Qual"]')->plaintext;
   $info['doc_qualyear'] = $link2->find('span[id="QualYear"]')->plaintext;
   $info['doc_univ'] = $link2->find('span[id="Univ"]')->plaintext;
   $info['doc_address'] = $link2->find('span[id="Address"]')->plaintext;

// print_r($link2->find("table.list"));
//
// // Write out to the sqlite database using scraperwiki library
 scraperwiki::save_sqlite(array('mci_snum','registration_number'), 
    array('mci_snum' => $id, 
          'name' => (trim($info['doc_name'])), 
          'fathers_name' => (trim($info['doc_fname'])),
          'date_of_birth' => (trim($info['doc_dob'])),
          'information_year' => (trim($info['doc_infoyear'])),
          'registration_number' => (trim($info['doc_regnum'])),
          'date_of_reg' => (trim($info['doc_datereg'])),
          'council' => (trim($info['doc_council'])),
          'qualifications' => (trim($info['doc_qual'])),
          'qualification_year' => (trim($info['doc_qualyear'])),
          'permanent_address' => (trim($info['doc_address']))
    ));
    
  //clean out the dom
  $link2->__destruct();
}
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")

// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
?>
