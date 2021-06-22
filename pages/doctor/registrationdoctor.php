<!DOCTYPE html>
<html>

<head>
  <title>Doctor Registration</title>
  <script src="../javascript/jquery.min.js"></script>
</head>

<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap.css.map">
<link rel="stylesheet" href="../css/bootstrap.min.css.map">

<body class="bg-light">

  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary" style="background-color: tomato">
      <div>
        <a href="../home.php" class="navbar-brand"> MedApp </a>
      </div>

      <ul class="navbar-nav">
        <li><a href="../client/registrationclient.php" class="nav-link">Client Register</a></li>
        <li><a href="../client/loginclient.php" class="nav-link">Client Login</a></li>
        <li><a href="logindoctor.php" class="nav-link">Doctor Login</a></li>
      </ul>
      <form class="d-flex" action="../search.php"  method="get">
        <input class="form-control me-2" name="criteria" type="search" placeholder="Search" aria-label="Search" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </nav>
  </header>
  <form class="row g-3 container mx-auto mt-4" id="register">
    <div class="col-md-6">
      <label for="inputFirst name" class="form-label">First name</label>
      <input type="text" class="form-control" id="inputFirstname" placeholder="First name" name="firstname" required>
    </div>
    <div class="col-md-6">
      <label for="inputLast name" class="form-label">Last name</label>
      <input type="text" class="form-control" id="inputLastname" placeholder="Last name" name="lastname" required>
    </div>
    <div class="col-12">
      <label for="inputDate of birth" class="form-label">Date of birth</label>
      <input type="date" class="form-control" id="inputDateOfBirth" name="date_of_birth" required>
    </div>
    <div class="col-md-6">
      <label for="inputPhone" class="form-label">Phone</label>
      <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phonenumber" required>
    </div>
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Password</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required><br>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Register as Doctor</button>
    </div>

    <div id="emailExist" class="text-danger error col-md-6">
      Email address exist
	  </div>
    <div id="emailInvalid" class="text-danger error col-md-6">
      Email address invalid
	  </div>
    <div id="wrongPassword" class="text-danger error col-md-6">
      Password must include letters, numbers and special characters
	  </div>
  </form>

  <script>
	
    $(document).ready(function(){
      $(".error").hide();
        
      $("#register").on("submit", function(e){
        $(".error").hide();
          $.ajax({
              url: '../../routes/doctor/doctorSignUp.php',
              type: 'post',
              data: $('#register').serialize(),
              dataType: 'json',
              success: function() {
                window.location.href = 'homedoctor.php';  
              },
              error: function(request, status, error) {
                if(request.status == 400){
                  let jsonResponse = request.responseJSON;
                  if(jsonResponse.emailExist){
                    $("#emailExist").show();
                  }
                  if(jsonResponse.emailInvalid){
                    $("#emailInvalid").show();
                  }
                  if(jsonResponse.wrongPassword){
                    $("#wrongPassword").show();
                  }
                }
              }
          });
          e.preventDefault();
      });
    });
    
	</script> 

</body>

</html>