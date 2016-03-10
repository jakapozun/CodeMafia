<?php 
include_once 'header.php';
include_once 'database.php';

?>
<?php
$sql = "SELECT  u.first_name, u.last_name FROM users u ";
$result = mysqli_query($link, $sql);
?>                                           
<form action="send.php" method="post">
   <?php 
    echo "<select name='uporabnik'>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option name=$id>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
    }
    echo "</select>";

    ?>
    ZADEVA: <input type="text" name="zadeva" /><br />
    <textarea style="resize:none" name="vsebina"  rows="5" cols="10" placeholder="Vpiši besedilo...">
        
    </textarea>
    <input type="submit" value="POŠLJI" name="submit" />
</form>

<?php
include_once 'footer.php';
?>

