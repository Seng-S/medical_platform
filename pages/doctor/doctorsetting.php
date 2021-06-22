<!DOCTYPE html>
<html>

<head>
    <title>Doctor Setting</title>
    <script src="../javascript/jquery.min.js"></script>
	<script src="../javascript/doctorauthentication.js"></script>
	<script src="../javascript/doctorNotification.js"></script>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css.map">
	<link rel="stylesheet" href="../css/bootstrap.min.css.map">
</head>

<body class="bg-light">

    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary" style="background-color: tomato">
            <div>
                <a href="homedoctor.php" class="navbar-brand"> MedApp </a>
            </div>

            <ul class="navbar-nav">
                <li><a href="doctorschedule.php" class="nav-link">Schedule</a></li>
                <li><a href="doctorappointmentrecord.php" class="nav-link">Patient Records <span id="notificationCount"></span></a></li>
                <li><a href="doctorspecialization.php" class="nav-link">Specialization</a></li>
				<li><a href="doctoraddress.php" class="nav-link">Address</a></li>
                <li><a href="../../routes/auth/doctorSignOut.php" class="nav-link">Sign Out </a></li>
            </ul>
            
        </nav>
    </header>
    <form class="row g-3 container mx-auto mt-4" id="updateDoctor">
        <div class="col-md-6">
            <label for="inputFirst name" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="col-md-6">
            <label for="inputLast name" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="col-12">
            <label for="inputDate of birth" class="form-label">Date of birth</label>
            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" required>
        </div>
        <div class="col-md-6">
            <label for="inputPhone" class="form-label">Phonenumber</label>
            <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required><br>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
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

        $.ajax({
            url:'../../routes/doctor/getDoctor.php',
            type:'get',
            success :function(data){
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);
                $('#date_of_birth').val(data.date_of_birth);
                $('#phonenumber').val(data.phonenumber);
                $('#email').val(data.email);
            }
        });

       $ (document).ready(function(){
            $(".error").hide();

            $("#updateDoctor").on("submit", function(e){
                $(".error").hide();
                    $.ajax({
                        url: '../../routes/doctor/updateDoctor.php',
                        type: 'post',
                        data: $('#updateDoctor').serialize(),
                        dataType: 'json',
                        success: function() {
                        window.location.href = '#';  
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