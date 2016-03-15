<?php
include_once 'header.php';
include_once 'database.php';

$sql = "SELECT id, title FROM destinations";
$result = mysqli_query($link, $sql);

?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<table class="table table-bordered">
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td><a href='prijavljeni_uporabniki.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></td></tr>";
}
?>
  
</table>
    
<?php
include_once 'footer.php';
?>