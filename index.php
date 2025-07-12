<?php
  include "connection.php";

  //collecting post request
  if(isset($_POST['submit'])){
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
  //$image = $_FILES['image'];
  $tmp_name = $_FILES['image']['tmp_name'];      // temp path
$upload_path = 'uploads/' . uniqid() . '_' . $_FILES['image']['name']; // destination

move_uploaded_file($tmp_name, $upload_path);   // moves file to uploads/

     
   $sql = "INSERT INTO `uiinfo` (
    `branch name`, `full name`, `id code`, `department`, `designation`,
    `job type`, `gender`, `date of joining--`, `email`, `contact`,
    `dob`, `adhaar`, `address`, `salary`, `granted paid leaves`,
    `allowance`, `account no`, `ifsc code`, `account type`, `bank name`,`image`
) VALUES (
    '$bankbranch', '$name', '$idcode', '$department', '$designation',
    '$jobtype', '$gender', '$joiningdate', '$email', '$contact',
    '$dob', '$adhaar', '$address', '$salary', '$leaves',
    '$allowance', '$accountno', '$ifsc', '$accounttype', '$bankname',' $upload_path'
)";
    


     if(mysqli_query($conn , $sql)){
        echo " <script>alert('sucessfully submitted')</script>" ;
    }
    else{
        echo "error".mysqli_error($conn);
    };
  
}  

echo "<pre>";
print_r($_FILES);
echo "</pre>";

  


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vertical Cards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  
  <nav class="navbar navbar-dark ">
    <!-- Navbar content -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="info.php">saved profile <span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="edit.php">edit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="filter.php">filter your details</a>
          </li>

          <!-- -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" role="buttton">
              Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              

              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Select ID Code
              </a>
              <?php 
               include "drop.php";
           
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <?php echo  '<li><a class="dropdown-item" href="show.php?id=' . urlencode($row['id code']) . '">' . htmlspecialchars($row['id code']) . '</a></li>';
                } 
              
                ?>
            </ul>
          </li>


          <!-- dropdown2 -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" role="buttton">
              Dropdown link2
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <li class="px-3 py-2">
               <input type="text" class="form-control" id="dropdownSearch" placeholder="Search ID code...">
               </li>

              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Select ID Code
              </a>
             <div id ="response">
            
             </div>
            </ul>
          </li>



        </ul>
      </div>
    </nav>
  </nav>




  <form action="index.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
    <div class="container my-5" class="rounded">

      <div class="page-header mb-4 ">
        <h2 class="fw-semibold  p-1">Welcome !</h2>
      </div>

      <!-- Card 1 -->
      <div class="card mb-4 shadow-sm">
        <div class="row g-0">
          <div class="col-md-4 p-3">
            <div class="card text-center " style="width: 18rem;">
              <div id = profile> <img src="307ce493-b254-4b2d-8ba4-d12c080d6651.jpg" class="rounded-top  p-3 pb-0 " class="card-img-top"
                alt="..."> </div>
                <input type="file" name="image" placeholder="Choose a profile pic" value = "" >
              <div class="card-body">
                <h4 class="card-text" class="fw-bold"></h4>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card p-3 ">
                <!-- Row 1-->
                <div class="row mb-3">
                  <div class="col-md-6 pt-2">
                    
                    <label for="input1" class="form-label">Full Name</label>
                    <input type="text" class="form-control text-dark" id="input1" placeholder="Enter full name"
                      name="name" required>
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                    <div class="valid-feedback">
                      looks good!
                    </div>

                  </div>
                  <div class="col-md-6 pt-2">
                    <label for="input2" class="form-label">ID code</label>
                    <input type="number" class="form-control" id="input2" placeholder="Enter Id code" name="id"
                      required>
                    <div class="invalid-feedback">
                      Please choose a valid id code.
                    </div>
                    <div class="valid-feedback">
                      looks good!
                    </div>
                  </div>
                  <div class="col-md-6 pt-2">
                    <label for="input1" class="form-label">Designation</label>
                    <input type="text" class="form-control" id="input1" placeholder="Enter designation"
                      name="designation" required>
                    <div class="invalid-feedback">
                      Please choose a valid designation.
                    </div>
                    <div class="valid-feedback">
                      looks good!
                    </div>
                  </div>
                  <div class="col-md-6 pt-2">
                    <label for="input1" class="form-label">Department</label>
                    <input type="text" class="form-control" id="input1" placeholder="Enter department" name="department"
                      required>
                    <div class="invalid-feedback">
                      Please choose a valid department
                    </div>
                    <div class="valid-feedback">
                      looks good!
                    </div>
                  </div>
                  <div class="col-md-6 pt-2">
                    <label for="input1" class="form-label">Job type</label>
                    <input type="text" class="form-control" id="input1" placeholder="Enter job type" name="jobtype"
                      required>
                    <div class="invalid-feedback">
                      Please choose a valid jon type.
                    </div>
                    <div class="valid-feedback">
                      looks good!
                    </div>
                  </div>
                  <div class="col-md-6 pt-2">
                    <label for="input1" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="input1" placeholder="Enter gender" name="gender"
                      required>
                    <div class="invalid-feedback">
                      Please choose a valid gender.
                    </div>
                    <div class="valid-feedback">
                      looks good!
                    </div>
                  </div>
                  <div class="col-md-12 pt-2 ">
                    <label for="input1" class="form-label">date of joining</label>
                    <input type="date" class="form-control  " id="input1"
                      placeholder="Enter date of your first day here!" name="joining" required>
                    <div class="invalid-feedback">
                      Please choose a valid date .
                    </div>
                    <div class="valid-feedback">
                      looks good!
                    </div>
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
                  <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="johnwick@gmail.com"
                    name="email" required>
                  <div class="invalid-feedback">
                    Please choose a valid email.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="formGroupExampleInput2" class="form-label contact">Contact</label>
                  <input type="text" class="form-control" id="contactInput" placeholder="567856785678" name="contact"
                    required pattern="[0-9]{10}" maxlength="10" minlength="10">
                  <div class="invalid-feedback">
                    Please choose a valid contact.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="formGroupExampleInput2" class="form-label ">D.O.B</label>
                  <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="10/04/2002"
                    name="dob" required>
                  <div class="invalid-feedback">
                    Please choose a date.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Adhaar No</label>
                  <input type="text" class="form-control" id="adhaarInput" placeholder="2434546576" name="adhaar"
                    required pattern="[0-9]{12}" maxlength="12" minlength="12">
                  <div class="invalid-feedback">
                    Please choose a adhaar.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-12 mb-3 ">
                  <label for="formGroupExampleInput2" class="form-label address">Address</label>
                  <textarea type="text" class="form-control" id="formGroupExampleInput2" name="address"
                    required>Kota</textarea>
                  <div class="invalid-feedback">
                    Please choose a valid address.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
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
                  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="60000"
                    name="salary" required>
                  <div class="invalid-feedback">
                    Please choose a valid salary.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Granted paid leaves</label>
                  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="2" name="leaves"
                    required>
                  <div class="invalid-feedback">
                    Please choose a valid number.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Allowance</label>
                  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="600.00"
                    name="allowance" required>
                  <div class="invalid-feedback">
                    Please choose a valid allowance.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Bank Account No</label>
                  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="234254676867979"
                    name="accountno" required>
                  <div class="invalid-feedback">
                    Please choose a account no.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">IFSC Code</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="SBIIFC" name="ifsc"
                    required>
                  <div class="invalid-feedback">
                    Please choose a valid ifsc.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Account Type</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Savings"
                    name="accounttype" required>
                  <div class="invalid-feedback">
                    Please choose a account type.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Bank name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="State bank of india"
                    name="bankname" required>
                  <div class="invalid-feedback">
                    Please choose a bank name.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Branch name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Kota , Rajasthan"
                    name="branchname" required>
                  <div class="invalid-feedback">
                    Please choose a branch name.
                  </div>
                  <div class="valid-feedback">
                    looks good!
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- <button type="submit" name = "submit" class="btn btn-dark">Submit</button> -->
      <input type="submit" name="submit" class="btn btn-dark" value="Submit">

    </div>
  </form>


  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const input = document.getElementById("contactInput");

      input.addEventListener("keydown", function (e) {
        const allowedKeys = [
          "Backspace", "Delete", "ArrowLeft", "ArrowRight", "Tab"
        ];

        // Allow numbers and allowed keys
        if (
          (e.key >= "0" && e.key <= "9") ||
          allowedKeys.includes(e.key)
        ) {
          return;
        }

        // Block everything else
        e.preventDefault();
      });

      // Optional: Remove any non-digit character if pasted
      input.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, '');
      });
    });

    document.addEventListener("DOMContentLoaded", function () {
      const input = document.getElementById("adhaarInput");

      input.addEventListener("keydown", function (e) {
        const allowedKeys = [
          "Backspace", "Delete", "ArrowLeft", "ArrowRight", "Tab"
        ];

        // Allow numbers and allowed keys
        if (
          (e.key >= "0" && e.key <= "9") ||
          allowedKeys.includes(e.key)
        ) {
          return;
        }

        // Block everything else
        e.preventDefault();
      });

      // Optional: Remove any non-digit character if pasted
      input.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, '');
      });
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()

  </script>
  <script>
    const search = document.getElementById('dropdownSearch');
    const results = document.getElementById('response');
    search.addEventListener('keyup',()=>{
      const query = search.value;
      const xhr = new XMLHttpRequest(); // xmlhttp object
      xhr.open('POST' , 'drop2.php' , true); // initializing the request
      xhr.setRequestHeader('Content-type' , 'application/x-www-form-urlencoded');
      xhr.onload = function(){
        if(this.status == 200){
        results.innerHTML = this.responseText;
        }
      }
       xhr.send('query=' + encodeURIComponent(query));
    })
  </script>
  <script>
    const profile = document.getElementById('profile');
    profile.addEventListener('input' , ()=>{
      profile.innerHTML = '<img src="307ce493-b254-4b2d-8ba4-d12c080d6651.jpg"  class="rounded-top p-3 pb-0 card-img-top" 
                >';
    });
  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!-- -->
