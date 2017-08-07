require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
$MAX_ID = 3; //set based on required maximum numbers
/** looping over list of ids of doctors **/
for($id = 1; $id <= $MAX_ID; $id++)
{
  // // Read in a MCI doctor page
    $html = scraperwiki::scrape("http://www.mciindia.org/ViewDetails.aspx?ID=".$id);
  // Find something on the page using css selectors
   $dom = new simple_html_dom();
   $dom->load($html);
   
   // walk through the dom and extract doctor information
   echo doc_name = $dom->find('span[id=Name]')->plaintext;
   doc_fname = $dom->find('span[id="FatherName"]')->plaintext;
   doc_dob = $dom->find('span[id="DOB"]')->plaintext;
   doc_infoyear = $dom->find('span[id="lbl_Info"]')->plaintext;
   doc_regnum = $dom->find('span[id="Regis_no"]')->plaintext;
   doc_datereg = $dom->find('span[id="Date_Reg"]')->plaintext;
   doc_council = $dom->find('span[id="Lbl_Council"]')->plaintext;
   doc_qual = $dom->find('span[id="Qual"]')->plaintext;
   doc_qualyear = $dom->find('span[id="QualYear"]')->plaintext;
   doc_univ = $dom->find('span[id="Univ"]')->plaintext;
   doc_address = $dom->find('span[id="Address"]')->plaintext;



}
