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
		
		
		
<!-- Start generating the response page, mixing 'raw' HTML
     and code generated in PHP using echo statements         -->
<?php
$Name=$_POST['name'];
$Email=$_POST['email'];
$Message=$_POST['message'];

//Creating the queri
$sqlstatement = "INSERT INTO Contact VALUES ('".$Name."','".$Email."','".$Message."')";



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
    //echo "An error occurred sending the queri";
    echo("<h2 class=starter> An error has occured when trying to send the information.</h2>");
    exit;
}
else
{
   // echo "message send";
   
    echo("<h2 class=starter>Following onformation has been send to BooksRUs </h2>");
    echo("<hr class=welcome>");
    echo("<div align=center style=max-width: 400px; margin: auto;>");
    echo("<h4 class=slogan> Name: </h4>");
    echo("<p class=regular>$Name</p>");
    echo("<h4 class=slogan> Email: </h4>");
    echo("<p class=regular>$Email</p>");
    echo("<h4 class=slogan> Message: </h4>");
    echo nl2br("<p class=regular>$Message</p>");
    echo("<h3 class=regularHeadderCenter>We will contact you as soon as possible. </h3>");
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