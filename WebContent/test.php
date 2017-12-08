<!DOCTYPE html>
<html>
<head>

<meta charset="ISO-8859-1">
<title>BooksRUS</title>
<!-- importing the stylesheet -->
<link href="FrontPageStyle.css" rel="stylesheet" type="text/css">

</head>


<body>



<?php
$Title=$_POST['bookName'];
$Author=$_POST['author'];
$ISBN=$_POST['ISBN'];
$Categorie=$_POST['categorie'];

//Creating the queri
$sqlstatement = "Select * FROM Products";
// counter to keep track of how many search field added to queri. 
$added = 0;

// just one field is not empty add where to queri.
if($Title <> "" || $Author <> "" || $ISBN <> "" || $Categorie <> "")
{
    $sqlstatement = $sqlstatement." WHERE";
}
    
//If anything has been entered in titel search field.
if($Title <> "")
{
   $sqlstatement = $sqlstatement." Title='".$Title."'";
   $added = $added + 1;
}

//checking the author field.
if($Author <> "")
{
    if($added > 0)
    {
        $sqlstatement = $sqlstatement." AND";
    }
    $sqlstatement = $sqlstatement." Author='".$Author."'";
    $added = $added + 1;
}

// check for ISBN
if($ISBN <> "")
{
    if($added > 0)
    {
        $sqlstatement = $sqlstatement." AND";
    }
    $sqlstatement = $sqlstatement." ISBN='".$ISBN."'";
    $added = $added + 1;
}

// Check for categorie
if($Categorie <> "")
{
    if($added > 0)
    {
        $sqlstatement = $sqlstatement." AND";
    }
    $sqlstatement = $sqlstatement." Categorie='".$Categorie."'";
}

// Connect to the database

/* Set oracle user login and password info */
$dbuser = "ctrasmus";  /* your deakin login */
$dbpass = "rasmussen";  /* your deakin password */
$db = "SSID";
$connect = oci_connect($dbuser, $dbpass, $db);

if (!$connect)  {
    echo "An error occurred connecting to the database";
    exit;
}

/* build sql statement using form data */
$query = $sqlstatement;

/* check the sql statement for errors and if errors report them */
$stmt = oci_parse($connect, $query);

//echo "SQL: $query<br>";

if(!$stmt)  {
    echo "An error occurred in parsing the sql string.\n";
    exit;
}
oci_execute($stmt);

?>

<!-- Start generating the response page, mixing 'raw' HTML
     and code generated in PHP using echo statements         -->
     
     <!-- Start of div container that contains head section, main section and footer section  -->
	<div id=pageContainer>
	
		<!-- Start of top section -->
		<div id="topSection">
		
		<!-- Store name and sloogan in top section  -->
			<h1 class="welcome"><a class="welcome" href="ass1.html">BooksRUS</a></h1>
			<h4 class="slogan"> Best Secondhand Book Shop in Geelong</h4>
			
			<!-- line that devides the page -->
			<hr class="welcome">
			
			<!-- Buttons in top sections  -->
			<div class="buttons">
				<a href= "about.html"><button class="buttonGroupMenu">about</button></a>
				<a href= "books.html"><button class="buttonGroupMenu">Books</button></a>
				<a href= "contact.html"><button class="buttonGroupMenu">Contact</button></a>
			</div>

		</div>
		
<!-- Start of main section -->
		<div id="mainSection">
		
		<!-- Search form. wrapped in div to center it.   -->
		<div class = "try">
			<form class = "searchForm" action="test.php" method="post" name="searchForm" id="searchForm">
				<input type = "text" placeholder="Book Title" name = "bookName" id = "bookName">
				<input type = "text" placeholder="Author" name = "author" id = "author">
				<input type = "text" placeholder="ISBN" name = "ISBN" id = "ISBN">
				<input type = "text" placeholder="Categorie" list="categories" name="categorie">
				
					<!-- datalist used to get a list of the different categories  -->
					<datalist id = categories>
						<option value = "Non Fiction"> </option>
						<option value = "Fiction"> </option>
						<option value = "Children"> </option>
						<option value = "Academic"> </option>
					</datalist>
				<!-- submit button (no action applyed)  -->
				<input class="contactButtons" type="submit" name="SearchButton" value=" Search">
			</form>
			</div>

<?php
	
// do a quick loop through the recordset to count how many we retrieved
$howmany=0;
while(oci_fetch_array($stmt))  {
$howmany=$howmany+1;

}
if ($howmany==0) {
   echo ("<h2 class=starter> No book match your requirements. </2>");
   }
	 else {
     	echo ("<h2 class=starter> Search result. ".$howmany." match your requirements.</h2>");
	 }
	 
/* if we found any matches, we must 'go back to the top' of the recordset so that we go through it 
   from first-to-last again to display them (if there are no records, we are still 'at the top', 
  so we don't need to MoveFirst - and we will get a database error is we try!   */
if ($howmany > 0 )
  	oci_execute($stmt);
?>

<!-- Now display the bulk of the table by 'looping' through the recordset one row
     (record) at a time, writing each into a separate row of the table 
	 Do not show the data if the user has not requested it - so we have not retrieved it;
	 if you try you will get a database error                                              -->
<?php

echo("<table class = books>");
echo("<tr class = booklist>");

while(oci_fetch_array($stmt))  {
// Start a row for each record

   
   // getting picture and adding it to the table
   $field1 = oci_result($stmt,"PICTURE");
   $linkName = oci_result($stmt,"SITELINK");
   echo("<td> <a href =".$linkName."> <img class = listPic src=".$field1."></a></td>");
   
// Output fields, one per column
// getting title
   $field2 = oci_result($stmt,"TITLE");
   echo("<td class = books> <p class = regular>");
   echo($field2);
   echo("<br>");
   
   //getting title 2
   $field3 = oci_result($stmt,"TITLE2");
   echo($field3);
   echo("<br>");
   
   //getting author
   $field4 = oci_result($stmt,"AUTHOR");
   echo("By: ");
   echo($field4);
   echo("<br>");
   
   //getting format
   $field5 = oci_result($stmt,"FORMAT");
   echo($field5);
   echo("<br>");
   
   //getting published
   $field6 = oci_result($stmt,"PUBLISHED");
   echo("Published: ");
   echo($field6);
   
   //next collumn with price.
   echo("</td>");
   echo("<td class = books>");
   
   //get the price
   $field7 = oci_result($stmt,"PRICE");
   $sale = oci_result($stmt,"SALE");
  
   //if the book sale variable has a price.
   if($sale <> "No Sale")
   {
       echo("<p class = formerPrice>".$field7);
       echo("<p class = sale>Now ".$sale);
   }
   else
   {
   echo("<p class = regular>");
   echo($field7);
   }
   echo("</td>");
   
   
   echo("<td class = books>");
   
   //Button to enter order form page
   echo("<a href = orderForm.html> <button class = buyButton > Buy </button></a>");
   echo("</td> </tr>");
   

// Close the connection
}
oci_close($connect); 
?>   

<!-- Close the table itself and the main section -->
<?php
//if ($howmany>0) {
	echo("</table>");
	echo("</div>");
//}
?>

<!-- Start of foot section -->
		<div id="footer">

			<p class="footer">©Deakin University, School of
				Information Technology. This web page has been developed as a
				student assignment for the unit SIT104: Introduction to Web
				Development. Therefore it is not part of the University's authorised
				web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN
				ANY WAY.</p>
		</div>

	</div>

</body>
</html>