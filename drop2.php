<?php 
include "connection.php";

if(isset($_POST['query'])){
    $search = $_POST['query'];
    $sql = "SELECT `id code` from `uiinfo` WHERE `id code` LIKE '%$search%' LIMIT 5" ;

    $result = mysqli_query($conn , $sql);
   //$row = mysqli_fetch_assoc($result);
    if($result && mysqli_num_rows($result) > 0){
       while( $row = mysqli_fetch_assoc($result)){
         echo '<li><a class="dropdown-item" href="show.php?id=' . urlencode($row['id code']) . '">' . htmlspecialchars($row['id code']) . '</a></li>';
       };
    }else {
        echo '<li class="dropdown-item text-muted">No results found</li>';
    }
};
?>