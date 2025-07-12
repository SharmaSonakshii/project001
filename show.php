

<?php 
   include "connection.php";

  if(isset($_POST['search'])){
    $USER_ENTERED_ID = $_POST['idcode'];
    $sql = "SELECT * FROM uiinfo WHERE `id code` = '$USER_ENTERED_ID';";

    $result = mysqli_query($conn, $sql);
    if($result &&  mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        
    }else {
        echo "<script>alert('user not found')</script>";
        
    }
  }

  if(isset($_GET['id'])){
    $id_code = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM uiinfo WHERE `id code` = '$id_code';";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
  }
   
   

   
?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saved info</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="style.css">
</head>
<body>
      <form action="show.php" method = "POST" >
       <input type="text" placeholder="Search by entering your id code" name = "idcode">
        <button type="submit" name = "search" class="btn btn-dark" >search</button>
      </form>

      
      <form action="update.php" method = "post"  >
        <div class="container my-5" class="rounded">

            <div class="page-header mb-4 ">
                <h2 class="fw-semibold  p-1">Welcome <?php print_r($row['full name'])?>!</h2>
            </div>

            <!-- Card 1 -->
            <div class="card mb-4 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4 p-3">
                        <div class="card text-center " style="width: 18rem;">
                            <img src=" <?php print_r($row['image'])?>" class="rounded-top  p-3 pb-0 "
                                class="card-img-top" alt="...">
                                <!-- <img src="young-bearded-man-with-striped-shirt.jpg" alt="" srcset=""> -->
                            <div class="card-body">
                                <h4 class="card-text" class="fw-bold"><?php print_r($row['full name'])?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card p-3 ">
                                <!-- Row 1-->
                                <div class="row mb-3">
                                    <div class="col-md-6 pt-2">
                                        <label for="input1" class="form-label">Full name</label>
                                        <input type="text" class="form-control text-dark" id="input1"
                                            placeholder="Enter full name" name ="name" value = "<?php print_r($row['full name'])?>">
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <label for="input2" class="form-label">ID code</label>
                                        <input type="text" class="form-control" id="input2" placeholder="Enter Id code" name="id" value ="<?php print_r($row['id code'])?>" readonly>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <label for="input1" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="input1" placeholder="Enter designation"
                                            name ="designation" value = "<?php print_r($row['designation'])?>">
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <label for="input1" class="form-label">Department</label>
                                        <input type="text" class="form-control" id="input1" placeholder="Enter department"
                                            name = "department" value = "<?php print_r($row['department'])?>">
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <label for="input1" class="form-label">Job type</label>
                                        <input type="text" class="form-control" id="input1" placeholder="Enter job type"  name="jobtype" value = "<?php print_r($row['job type'])?>" >
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <label for="input1" class="form-label">Gender</label>
                                        <input type="text" class="form-control" id="input1" placeholder="Enter gender"  name="gender" value = "<?php print_r($row['gender'])?>">
                                    </div>
                                    <div class="col-md-12 pt-2 ">
                                        <label for="input1" class="form-label">date of joining</label>
                                        <input type="date" class="form-control  " id="input1"
                                            placeholder="Enter date of your first day here!"  name="joining" value = "<?php print_r($row['date of joining--'])?>">
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Card 2 -->
            <div class="card mb-4 shadow-sm">
                <div class="row g-0">
                    <div class="page-header mb-4">
                        <h2 class="fw-semibold p-1" style="background-color: #046b70;">Personal details</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="johnwick@gmail.com"  name="email" value = "<?php print_r($row['email'])?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Contact</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="567856785678"  name="contact"  value = "<?php print_r($row['contact'])?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">D.O.B</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput2"
                                        placeholder="10/04/2002"  name="dob" value = "<?php print_r($row['dob'])?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Adhaar No</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="2434546576"  name="adhaar" value = "<?php print_r($row['adhaar'])?>">
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <label for="formGroupExampleInput2" class="form-label">Address</label>
                                    <textarea type="text" class="form-control"
                                        id="formGroupExampleInput2" name="address"><?php print_r($row['address'])?></textarea>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Card 3 -->
            <div class="card mb-4 shadow-sm">
                <div class="row g-0 ">
                    <div class="page-header mb-4">
                        <h2 class="fw-semibold  p-1" style="background-color: #046b70;">Professional details</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="60000"  name ="salary" value = "<?php print_r($row['salary'])?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Granted paid leaves</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="2"  name="leaves" value = "<?php print_r($row['granted paid leaves'])?>">
                                </div>
                                <div class= "col-md-4 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Allowance</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="600.00"  name="allowance" value = "<?php print_r($row['allowance'])?>">
                                 </div>
                                <div class="col-md-4 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Bank Account No</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="234254676867979"  name ="accountno" value ="<?php print_r($row['account no'])?>"/>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">IFSC Code</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="SBIIFC"  name ="ifsc code" value = "<?php print_r($row['ifsc code'])?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Account Type</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Savings"  name="accounttype" value = " <?php print_r($row['account type'])?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Bank name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="State bank of india"  name ="bankname" value = "<?php print_r($row['bank name'])?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Branch name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Kota , Rajasthan" name ="branchname" value = "<?php print_r($row['branch name'])?>">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" name = "update" class="btn btn-dark">update</button>
            <button type="submit" name = "delete" class="btn btn-dark">delete</button> 
            
            

        </div>
      </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>