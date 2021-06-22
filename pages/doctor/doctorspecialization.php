<!DOCTYPE html>
<html>
    <head>
        <title>Doctor Specialization</title>
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
                    <li><a href="doctoraddress.php" class="nav-link">Address</a></li>
                    <li><a href="doctorsetting.php" class="nav-link">Setting</a></li>
                    <li><a href="../../routes/auth/doctorSignOut.php" class="nav-link">Sign Out </a></li>
                </ul>
                
            </nav>
        </header>
        <main>
            <div class="container mt-5">
                <form class="row g-3" id="newDoctorSpecialization">
                    <div class="col-md-6">
                        <label for="specialization" class="form-label">New Specialization</label>
                        <select class="form-control" id="specialization" name="specializationId" required></select><br>
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Add New Specialization</button><br>
                    </div>

                    <div id="repeat" class="text-danger error col-md-6">
                        Specialization has already been added
                    </div><br>

                </form>

                <div class="col-md-6"><br>
                    <label for="specialization" class="form-label"> Doctor Specializations</label>
                </div>

                <div class="col-md-6"><br>
                    <ul class="list-group col-md-6" id="doctorSpecializationsList"></ul>
                </div>
            </div>
        </main>
    </body>
    <script>
        function getSpecializationByDoctor(){
            $.ajax({
                url:'../../routes/doctor/DoctorSpecialization/getSpecializationByDoctorId.php',
                type:'get',
                dataType: 'json',
                success :function(data){
                    $('#doctorSpecializationsList').html("");
                    data.forEach(function each(doctorSpecialization){
                        $("#doctorSpecializationsList").append(
                            "<li class=\"list-group-item\">"+ doctorSpecialization.specialization +" &nbsp;&nbsp; <button class=\"btn btn-danger\" onClick=\"deleteDoctorSpecialization(" + doctorSpecialization.id + ")\">Remove</button></li>"
                        );
                    });  
                }
            });
        }
        function deleteDoctorSpecialization(id){
            $.ajax({
                url : "../../routes/doctor/DoctorSpecialization/deleteDoctorSpecialization.php",
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

        $.ajax({
            url:'../../routes/specialization/getSpecialization.php',
            type:'get',
            cache: false,
			dataType: 'json',
            success :function(data){
                $('#specialization').html("");
                data.forEach(function each(specialization){
                    $("#specialization").append(
                        "<option value='" + specialization.id + "'>" + specialization.specialization + "</option>"
                    );
                });  
            }
        });

        getSpecializationByDoctor();

        $(document).ready(function(){
            $(".error").hide();

            $("#newDoctorSpecialization").on("submit", function(e){
                $(".error").hide();
                    $.ajax({
                        url: '../../routes/doctor/DoctorSpecialization/newDoctorSpecialization.php',
                        type: 'post',
                        data: $('#newDoctorSpecialization').serialize(),
                        dataType: 'json',
                        success: function() {
                            getSpecializationByDoctor();
                        },
                        error: function(request, status, error) {
                            if(request.status == 400){
                                let jsonResponse = request.responseJSON;
                                if(jsonResponse.repeat){
                                    $("#repeat").show();
                                }
                            }
                        }
                    });
                e.preventDefault();
            });

            
  	    });
    </script>
</html>