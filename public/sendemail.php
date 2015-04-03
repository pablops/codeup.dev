<?php 
$from = 'pablops7@yahoo.com';

$subject = $_POST['subject'];
$text = $_POST['elvismail'];

$dbc = mysqli_connect('localhost', 'codeup', 'codeup', 'elvis_store')
	or die('Error connecting to MySQL server.');

$query = "SELECT * FROM email_list";
$result = mysqli_query($dbc, $query)
	or die('Error querying database.');

while ($row = mysqli_fetch_array($result)) {
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
}

$msg = "Dear $first_name $last_name,\n $text";
$to = $row['email'];
mail($to, $subject, $msg, 'From:' . $from);
echo 'Email sent to ' . $to . '<br />';

msqli_clos($dbc);
?>