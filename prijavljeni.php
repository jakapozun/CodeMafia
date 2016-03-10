<?php
include_once 'header.php';
include_once 'database.php';

$sql = "SELECT id, title FROM destinations";
$result = mysqli_query($link, $sql);

?>
<table>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td><a href='prijavljeni_uporabniki.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></td></tr>";
}
?>
  
</table>
    
<?php
include_once 'footer.php';
?>