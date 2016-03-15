<?php
include_once 'header.php';
include_once 'database.php';
$query = "SELECT * FROM countries";
$result = mysqli_query($link, $query);
?>
<?php
 if ($_SESSION['admin'] == 1) {
  echo "<a class='btn btn-success' href='country_add.php'><i class='fa fa-plus'></i> Dodaj državo</a>"; }
      ?>

<table class="table table-condensed">
    <tr>
        <td>ID</td>
        <td>Naslov</td>
        <td>Kratica</td>
        <?php  if ($_SESSION['admin'] == 1) {
        echo "<td>Akcije</td>"; }
        ?>
    </tr>

<?php
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>';
    echo $row['id'];
    echo '</td>';
    echo '<td>';
    echo $row['title'];
    echo '</td>';
    echo '<td>';
    echo $row['short'];
    echo '</td>';
    
    echo '<td>';
             if ($_SESSION['admin'] == 1) {
    echo '<a class="btn btn-danger" href="country_delete.php?id='.$row['id'].'" 
                onclick="return confirm(\'Ste prepričani?\')"><i class="fa fa-trash"></i></a>';
    echo ' <a class="btn btn-primary" href="country_edit.php?id='.$row['id'].'"><i class="fa fa-pencil"></i></a>'; }
    echo '</td>';    
    
    echo '</tr>';
}
?>
</table>

<?php
include_once 'footer.php';
?>