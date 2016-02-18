<?php
include_once 'header.php';
include_once 'database.php';
$query = "SELECT d.title AS dtitle, d.id AS did, 
          c.title AS ctitle, c.short
          FROM destinations d INNER JOIN countries c 
          ON c.id=d.country_id";
$result = mysqli_query($link, $query);
?>
<?php 
    if ($_SESSION['admin'] == 1) {
?>
<a href="destination_add.php">Dodaj destinacijo</a>
<?php 
    }
?>
<div id="destinations"> 

<?php
    
while ($row = mysqli_fetch_array($result)) {
    echo '<div class="destination">';
        echo '<div class="destination_modify">';
        if ($_SESSION['admin'] == 1) {
            echo '<a href="destination_delete.php?id='.$row['did'].'" 
                onclick="return confirm(\'Ste prepričani?\')">Izbriši</a>';
            echo ' <a href="destination_edit.php?id='.$row['did'].'">Uredi</a>';
        }
        echo '</div>';
        echo '<a href="destination.php?id='.$row['did'].'">';
        $query = "SELECT * 
                  FROM pictures 
                  WHERE destionation_id=".$row['did'].'
                  LIMIT 1'; 
        //echo $query;
        $r = mysqli_query($link, $query);
        $picture = mysqli_fetch_array($r);
        if (empty($picture['url'])) {
            echo '<img src="slike/no-photo.jpg" alt="" />';
        }
        else {
            echo '<img src="'.$picture['url'].'" alt="" />';
        }        
        echo '</a>';
        echo '<span class="destination_name">'.$row['dtitle'].'</span>';
        echo '<span class="destination_country">'.$row['short'].'</span>';
    echo '</div>';    
}
?>
<div class="clear"></div>
</div>

<?php
include_once 'footer.php';
?>