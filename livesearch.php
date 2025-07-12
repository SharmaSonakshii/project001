<?php 
include "connection.php" ;
if(isset($_POST['query'])){
    $search = $_POST['query'];
    $sql = "SELECT * FROM uiinfo 
            WHERE `full name` LIKE '%$search%' 
               OR `email` LIKE '%$search%'" ;
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo  "<tr>
                    <td>{$row['UI']}</td>
                    <td>{$row['full name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['adhaar']}</td>
                     <td>{$row['contact']}</td>
                    <td>{$row['designation']}</td>
                     <td>{$row['gender']}</td>
                       <td>{$row['date of joining--']}</td>
                        <td>{$row['dob']}</td>
                  </tr>";
        }
     
    }else {
        echo "No results found";
    }
}else {
   echo "<tr><td colspan='4'>No query received</td></tr>";
}
?>