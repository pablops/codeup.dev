<?php
var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>





    <form method="POST" action="form-results.php">
        <label>Name</label>
        <input type="text" name="name"><br>
        <br />
        <label>Number</label>
        <input type="text" name="number"><br>
        <br />
        <input type="submit">
    </form>
</body>
</html>