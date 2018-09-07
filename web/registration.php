<?php
if(isset($_POST['submit'])){
// create short variable names
$nameErr="";
$fname=$_POST['mail1'];
$gender=$_POST['optgender'];
$lname=$_POST['mail2'];
$college=$_POST['opt1'];

$accm=$_POST['accm'];
if(isset($_POST['accm']))  {
   
   
    $accm="yes";}
else{

    $accm="No";}   

$college_name=$_POST['location'];
if($college_name=="College Name"){
   $college_name="IET Lucknow";}
$teamname=$_POST['Company'];
$email=$_POST['mail3'];
$mobile=$_POST['phone'];
$events=$_POST['events'];

if (!get_magic_quotes_gpc()) {
$fname = addslashes($fname);
$lname = addslashes($lname);
$gender = addslashes($gender);
$college = addslashes($college);

$accm = addslashes($accm);
$college_name = addslashes($college_name);
$teamname= addslashes($teamname);
$email = addslashes($email);
$events= addslashes($events);
$mobile = addslashes($mobile);

}
@ $db = new mysqli("localhost","ietlunxt_shauryo","0dJ~WU-U(t!q","ietlunxt_shauryotsava");
if (mysqli_connect_errno()) {
exit;
}

$query = "insert into shaurya values
('".$fname."', '".$lname."', '".$email."', '".$gender."', '".$mobile."', '".$college."' , '".$events."' , '".$teamname."', '".$accm."', '".$college_name."')";
$result = $db->query($query);
$db->close();
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$mailto="$email";  //Enter recipient email address here

$subject1 = "Shauryotsava 2k18";


$headers = "From:shauryotsava@ietlucknow.ac.in \r\n";
$headers .= "Cc:shauryotsava18@gmail.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";     
       //Your valid email address here

$message1 = "<html><head><title>Thank You for Registration!!</title></head><body>";
$message1 .= "<h1>Shauryotsava 2k18</h1></br>";
$message1 .= '<img style="text-align:center;" src="images/email.png" alt="Shauryotsava2k18" />';
$message1 .= "<p><strong>Hello </strong><strong>" . strip_tags($fname) . " " . strip_tags($lname) . "</strong></p></br>";
$message1 .= "<p>Your details are as follows:-</p></br>";
$message1 .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message1 .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($fname) . " " . strip_tags($lname) . "</td></tr>";
$message1 .= "<tr><td><strong>Gender:</strong> </td><td>" . strip_tags($gender) . "</td></tr>";
$message1 .= "<tr><td><strong>Contact:</strong> </td><td>" . strip_tags($mobile) . "</td></tr>";
$message1 .= "<tr><td><strong>College:</strong> </td><td>" . strip_tags($college) . "</td></tr>";
if($college == "non_IET")
  $message1 .= "<tr><td><strong>College Name:</strong> </td><td>" . strip_tags($college_name) . "</td></tr>";
$message1 .= "<tr><td><strong>Event:</strong> </td><td>" . strip_tags($events) . "</td></tr>";
if($teamname=="")
	$message1 .= "<tr><td><strong>Team:</strong> </td><td>" . strip_tags($teamname) . "</td></tr>";
	$message1 .= "<tr><td><strong>Accomodation Required:</strong> </td><td>" . strip_tags($accm) . "</td></tr>";
$message1 .= "</table>";
if($accm=="yes")
{
	if($accm=="yes")
	$message1 .= "<p>Charges for accomodation are 300INR</p></br>";
}
$message1 .= "<p>You are now registered for the following Events.</p></br>";
$message1 .= "<p>Thanks for contacting us!!</p></br>";
$message1 .= "<p><strong>@Shauryotsava2k18 Technical Team</strong></p></br>";
$message1 .= "</body></html>";

mail($mailto,$subject1,$message1,$headers);

if($result)
{
	header('Location:thanks.html');
	exit;
}
}

?>
