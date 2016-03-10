<?php
    include_once 'session.php';
    include_once 'database.php';
?>
<?php
    if(isset($_SESSION['user_id']) && isset($_GET['id'])){
        if (isset($_POST['submit'])){
            if (isset($_SESSION['error'])) {
                                                                                    echo '<div id="error">';
                                                                                    echo $_SESSION['error'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['error']);
                                                                                    header("Location: destinations.php");
                                                                                }
                                                                                //preverimo za success
                                                                                if (isset($_SESSION['success'])) {
                                                                                    echo '<div id="success">';
                                                                                    echo $_SESSION['success'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['success']);
                                                                                }
        
             // DOGAJANJE
            $user_id = $_SESSION['user_id'];
            $destination_id = $_GET['id'];
            $query = "INSERT INTO prijavljeni(user_id, destination_id) VALUES('$user_id','$destination_id')";
            mysqli_query($link, $query);
            header("Location: destinations.php");
        } else if (isset($_POST['cancel'])){
            if (isset($_SESSION['error'])) {
                                                                                    echo '<div id="error">';
                                                                                    echo $_SESSION['error'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['error']);
                                                                                    header("Location: destinations.php");
                                                                                }
                                                                                //preverimo za success
                                                                                if (isset($_SESSION['success'])) {
                                                                                    echo '<div id="success">';
                                                                                    echo $_SESSION['success'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['success']);
                                                                                }
        
             // DOGAJANJE
            $user_id = $_SESSION['user_id'];
            $destination_id = $_GET['id'];
            $query = "DELETE FROM prijavljeni WHERE ( (user_id = '$user_id') AND (destination_id = '$destination_id'))";
            mysqli_query($link, $query);
            header("Location: destinations.php");
        }
        
       }  

    else {
        header("Location: destinations.php");
    }