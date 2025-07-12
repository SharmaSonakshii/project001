<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>filter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="filter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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

          <!--live dropdown here -->
        
         

        </ul>
      </div>
    </nav>
  </nav>


  <div class="form-group pull-right">
    <form action="" method="get">
      <input type="text" class="search form-control" placeholder="What are you looking for ?" id="search">

      
    </form>

  </div>
  <span class="counter pull-right"></span>
  <table class="table table-hover table-bordered results" >
    <thead>
      <tr>
      <th>#</th>
      <th class="col-md-3 col-xs-3">Name</th>
      <th class="col-md-3 col-xs-3">Email</th>
      <th class="col-md-3 col-xs-3">adhaar</th>
      <th class="col-md-3 col-xs-3">Contact</th>
      <th class="col-md-3 col-xs-3">Designation</th>
      <th class="col-md-3 col-xs-3">Gender</th>
      <th class="col-md-3 col-xs-3">Joining</th>
      <th class="col-md-3 col-xs-3">D.O.B</th>
      

    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
    </thead>
    <tbody id = "result">
       <!-- Results will load here via AJAX -->
        
      
      
    
  </tbody>
  </table>
   <script>
    const search = document.getElementById('search');
    const result = document.getElementById('result');

    search.addEventListener('keyup' , ()=>{
       const query = search.value ;
       const xhr =  new XMLHttpRequest(); //xmlhttprequest
       xhr.open('POST', 'livesearch.php' , true); // initiallise the request
       xhr.setRequestHeader('Content-type' , 'application/x-www-form-urlencoded'); // whithout this headder php may not recognize the $_post['query]
       xhr.onload = function(){
           if(this.status == 200){
           result.innerHTML = this.responseText; 
           }; 
        };

     xhr.send('query=' + encodeURIComponent(query));
    });

   </script>
</body>

</html>