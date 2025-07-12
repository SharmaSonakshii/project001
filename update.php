<?php
include "connection.php";

if (isset($_POST['update'])) {
   $bankbranch = $_POST['branchname'];
  $name = $_POST['name'];
  $idcode = $_POST['id'];
  $designation  = $_POST['designation'];
  $department = $_POST['department'];
  $jobtype = $_POST["jobtype"];
  $gender = $_POST["gender"];
  $joiningdate = $_POST["joining"];
  $email = $_POST["email"];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];
  $adhaar= $_POST['adhaar'];
  $address = $_POST['address'];
  $salary = $_POST['salary'];
  $leaves = $_POST['leaves'];
  $allowance = $_POST['allowance'];
  $ifsc = $_POST['ifsc'];
  $accounttype = $_POST['accounttype'];
  $accountno = $_POST['accountno'];
  $bankname = $_POST['bankname'];
    // ... all other fields ...

    $sql = "UPDATE `uiinfo` SET `branch name`='$bankbranch',`full name`='$name',`id code`='$idcode',`department`='$department',`designation`='$designation',`job type`='$jobtype',`gender`='$gender',`date of joining--`='$joiningdate',`email`='$email',`contact`='$contact',`dob`='$dob',`adhaar`='$adhaar',`address`='$address',`salary`='$salary',`granted paid leaves`='$leaves',`allowance`='$allowance',`account no`='$accountno',`ifsc code`='$ifsc',`account type`='$accounttype',`bank name`='$bankname' WHERE `id code` = '$idcode'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record updated successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}   


    if (isset($_POST['delete'])){
        $idcode = $_POST['id'];

        $sql = "DELETE FROM `uiinfo` WHERE `id code` = '$idcode'";

        if(mysqli_query($conn ,$sql)){
            echo "<script>alert('Record deleted successfully'); window.location.href='index.php';</script>";
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>

</html>

