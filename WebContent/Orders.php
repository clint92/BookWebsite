<!DOCTYPE html>
<html>
<head>

<meta charset="ISO-8859-1">
<title>BooksRUS</title>
<!-- importing the stylesheet -->
<link href="FrontPageStyle.css" rel="stylesheet" type="text/css">

</head>


<body>

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
		
<?php 
$Name=$_POST['firstName'];
$SirName=$_POST['lastName'];
$Phone=$_POST['phoneNumber'];
$Email=$_POST['emailAddress'];
$CardHolder=$_POST['cardHolder'];
$CardNumber=$_POST['cardNumber'];
$CVC=$_POST['CVC'];
$ExpiryDate=$_POST['expiryDate'];
$UnitNumber=$_POST['unitNumber'];
$Street=$_POST['street'];
$City=$_POST['city'];
$PostalCode=$_POST['postalCode'];



//Creating the queri
$sqlstatement = "INSERT INTO Orders VALUES ('".$Name."','".$SirName."','".$Phone."','".$Email."','".$CardHolder."','".$CardNumber."','".$CVC."','".$ExpiryDate."','".$UnitNumber."','".$Street."','".$City."','".$PostalCode."')";
	

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


if(!$stmt)  {
    //echo "An error occurred sending the queri";
    echo("<h2 class=starter> An error has occured when trying to send the information.</h2>");
    exit;
}
else
{
    // Order has ben created.;
    
    echo("<h2 class=starter>Your order has been created </h2>");
    echo("<hr class=welcome>");
    echo("<div align=center style=max-width: 400px; margin: auto;>");
    echo("<h3 class=regularHeadderCenter> Order Information </h4>");
    
    echo("<h4 class=slogan> Buyer Information: </h4>");
    echo("<p class=regular>Given Names: ".$Name."</p>");
    echo("<p class=regular>Sir Name: ".$SirName."</p>");
    echo("<p class=regular>Phone Number: ".$Phone."</p>");
    echo("<p class=regular>Email: ".$Email."</p>");
    
    echo("<h4 class=slogan> Shipping Information </h4>");
    echo("<p class=regular>Unit: ".$UnitNumber."</p>");
    echo("<p class=regular>Street: ".$Street."</p>");
    echo("<p class=regular>City: ".$City."</p>");
    echo("<p class=regular>Postal Code: ".$PostalCode."</p>");
    
    echo("<h4 class=slogan> Card Information </h4>");
    echo("<p class=regular>Unit: ".$CardHolder."</p>");
    echo("<p class=regular>Street: ".$CardNumber."</p>");
    echo("<p class=regular>City: ".$CVC."</p>");
    echo("<p class=regular>Postal Code: ".$ExpiryDate."</p>");
    
    echo("<br>");
    echo("<h3 class=regularHeadderCenter>Shipping is 3-4 days.</h3>");
    echo("</div>");
}

oci_execute($stmt);
oci_close($connect); 
?>		
		
		
		</div>
		
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
		
		