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
                    <li><a href="doctorsetting.php" class="nav-link">Setting</a></li>
                    <li><a href="doctorspecialization.php" class="nav-link">Specialization</a></li>
                    <li><a href="../../routes/auth/doctorSignOut.php" class="nav-link">Sign Out </a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="container mt-5">
                <form  class="row g-3 container mx-auto mt-4" id="newAddress">
                    <div class="col-md-6">
                        <label for="inputFirst name" class="form-label">Address</label>
                        <input type="text" class="form-control" id="NewAddress" name="address" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputLast name" class="form-label">Department</label>
                        <input type="text" class="form-control" id="NewDepartment" name="departement" required>
                    </div>
                    <div class="col-12">
                        <label for="inputDate of birth" class="form-label">Region</label>
                        <input type="text" class="form-control" id="NewRegion" name="region" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" id="NewPostalCode" name="postalCode" required><br>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Add New Address</button>
                    </div>

                    <div id="addressExist" class="text-danger error col-md-6">
                        Address Already Added
                    </div>

                </form>
                <div class="col-md-6"><br>
                    <h3>Doctor Addresses</h3>
                    <ul class="list-group" id="doctorAddressesList"></ul>
                </div>
            </div>
        </main>
    </body>
    <script>
    
        function getAddressByDoctor(){
            $.ajax({
                url:'../../routes/doctor/Address/getDoctorAddress.php',
                type:'get',
                cache: false,
                dataType: 'json',
                success :function(data){
                    $('#doctorAddressesList').html("");
                    data.forEach(function each(doctorAddress){
                        $("#doctorAddressesList").append(
                            "<li class=\"list-group-item\">"+ doctorAddress.address + ", " + doctorAddress.departement + ", " + doctorAddress.region + ", " + doctorAddress.postal_code +" &nbsp;&nbsp; <button class=\"btn btn-danger\" onClick=\"deleteDoctorAddress(" + doctorAddress.id + ")\">Remove</button></li>"
                        );
                    });  
                }
            });
        }

        function deleteDoctorAddress(id){
            $.ajax({
                url : "../../routes/doctor/Address/deleteDoctorAddress.php",
                type: "post",
                dataType: 'json',
                data: {'id': id},
                success: function(result){
                    location.reload();
                },
                error: function(xhr,status,error){
                    
                }
            });
        };

        getAddressByDoctor();

       $ (document).ready(function(){
            $(".error").hide();

            $("#newAddress").on("submit", function(e){
                $(".error").hide();
                    $.ajax({
                        url: '../../routes/doctor/Address/newDoctorAddress.php',
                        type: 'post',
                        data: $('#newAddress').serialize(),
                        dataType: 'json',
                        success: function() {
                            getAddressByDoctor(); 
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


</html>