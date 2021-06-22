<!DOCTYPE html>
<html>
    <head>
        <title>Schedule</title>
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
                    <li><a href="doctorappointmentrecord.php" class="nav-link">Patient Records <span id="notificationCount"></span></a></li>
                    <li><a href="doctorspecialization.php" class="nav-link">Specialization</a></li>
                    <li><a href="doctoraddress.php" class="nav-link">Address</a></li>
                    <li><a href="doctorsetting.php" class="nav-link">Setting</a></li>
                    <li><a href="../../routes/auth/doctorSignOut.php" class="nav-link">Sign Out </a></li>
                </ul>
                
            </nav>
        </header>

        <main>
            <div class="container mt-5">
                <div class="row align-items-start">
                    <form class="col" id="addWorkingHour">
                        <h2>Set your working hours</h2><br>
                        <label for="dayOfTheWeek" class="form-label">Pick the day of the week</label><br>
                        <select class="form-control" id="dayOfTheWeek" name="dayId">
                            <option value='0'>Sunday</option>
                            <option value='1'>Monday</option>
                            <option value='2'>Tuesday</option>
                            <option value='3'>Wednesday</option>
                            <option value='4'>Thursday</option>
                            <option value='5'>Friday</option>
                            <option value='6'>Saturday</option>  
                        </select><br>
                        <label for="doctorStartingHour" class="form-label">Pick a starting time</label>
                        <select class="form-control" id="doctorStartingHour" name="startingHour" required></select><br>
                        <label for="doctorEndingHour" class="form-label">Pick an ending time</label>
                        <select class="form-control" id="doctorEndingHour" name="endingHour" required></select>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit Working Hour</button><br>
                        <div id="repeat" class="text-danger error col-md-6">
                            Working hour has already been added
                        </div><br>
                    </form>

                    <form class="col" id="addUnavailability">
                        <h3>Set your unavailable days of the week</h3><br>
                        <label for="dayOfTheWeek" class="form-label">Pick the day of the week</label><br>
                        <select class="form-control" id="dayOfTheWeek" name="dayId">
                            <option value='0'>Sunday</option>
                            <option value='1'>Monday</option>
                            <option value='2'>Tuesday</option>
                            <option value='3'>Wednesday</option>
                            <option value='4'>Thursday</option>
                            <option value='5'>Friday</option>
                            <option value='6'>Saturday</option>  
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit Unavailability</button><br>
                        <div id="repeat" class="text-danger error col-md-6">
                            Unavailability has already been added
                        </div><br>
                    </form>
                </div>
                <div class="row align-items-start">
                    <div class="col">
                        <h2>Your working hours</h2><br>
                        <div id="workingContainerSunday">
                            <h3>Sunday</h3>
                            <ul class="list-group col-md-6" id="doctorWorkingHourListSunday"></ul>
                        </div>
                        <div id="workingContainerMonday">
                            <h3>Monday</h3>
                            <ul class="list-group col-md-6" id="doctorWorkingHourListMonday"></ul>
                        </div>
                        <div id="workingContainerTuesday">
                            <h3>Tuesday</h3>
                            <ul class="list-group col-md-6" id="doctorWorkingHourListTuesday"></ul>
                        </div>
                        <div id="workingContainerWednesday">
                            <h3>Wednesday</h3>
                            <ul class="list-group col-md-6" id="doctorWorkingHourListWednesday"></ul>
                        </div>
                        <div id="workingContainerThursday">
                            <h3>Thursday</h3>
                            <ul class="list-group col-md-6" id="doctorWorkingHourListThursday"></ul>
                        </div>
                        <div id="workingContainerFriday">
                            <h3>Friday</h3>
                            <ul class="list-group col-md-6" id="doctorWorkingHourListFriday"></ul>
                        </div>
                        <div id="workingContainerSaturday">
                            <h3>Saturday</h3>
                            <ul class="list-group col-md-6" id="doctorWorkingHourListSaturday"></ul>
                        </div>
                    </div>
                    
                    <div class="col">
                        <h2>Your Unavailable days</h2><br>
                        <ul class="list-group col-md-6" id="doctorUnavailableDaysList"></ul>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script>
        
        
        function getDoctorWorkingHourByDay(dayIndex, dayOfTheWeek){
            $.ajax({
                url:'../../routes/doctor/Schedule/getWorkingHourByDay.php?dayId=' + dayIndex,
                type:'get',
                dataType: 'json',
                success :function(data){
                    if(data.length == 0){
                        $("#workingContainer" + dayOfTheWeek).hide();
                    }else {
                        $("#workingContainer" + dayOfTheWeek).show();
                        data.forEach(function each(workingHour){
                            $("#doctorWorkingHourList" + dayOfTheWeek).append(
                                "<li class=\"list-group-item\">"+ workingHour.starting_hour + "-" + workingHour.ending_hour + "&nbsp;&nbsp; <button class=\"btn btn-danger\" onClick=\"deleteDoctorWorkingHour(" + workingHour.id + ")\">Remove</button></li>"
                            );
                        });
                    }
                }
            });
        }

        function getDoctorWorkingHour(){
            getDoctorWorkingHourByDay(0, "Sunday");
            getDoctorWorkingHourByDay(1, "Monday");
            getDoctorWorkingHourByDay(2, "Tuesday");
            getDoctorWorkingHourByDay(3, "Wednesday");
            getDoctorWorkingHourByDay(4, "Thursday");
            getDoctorWorkingHourByDay(5, "Friday");
            getDoctorWorkingHourByDay(6, "Saturday");
        }

        function getDoctorUnavailability(){
            $.ajax({
                url:'../../routes/doctor/Schedule/getUnavailability.php',
                type:'get',
                dataType: 'json',
                success: function(data){
                    $('#doctorUnavailableDaysList').html("");
                    data.forEach(function each(unavailableDay){
                        $("#doctorUnavailableDaysList").append(
                            "<li class=\"list-group-item\">"+ unavailableDay.day + "&nbsp;&nbsp; <button class=\"btn btn-danger\" onClick=\"deleteDoctorUnavailableDay(" + unavailableDay.id + ")\">Remove</button></li>"
                        );
                    });  
                }
            });
        }

        function deleteDoctorWorkingHour(id){
            $.ajax({
                url : "../../routes/doctor/Schedule/WorkingHour/deleteDoctorWorkingHour.php",
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

        function deleteDoctorUnavailableDay(id){
            $.ajax({
                url : "../../routes/doctor/Schedule/UnavailableDay/deleteDoctorUnavailability.php",
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

        $("#addWorkingHour").on("submit", function(e){
            $.ajax({
                url: '../../routes/doctor/Schedule/WorkingHour/newDoctorWorkingHour.php',
                type: 'post',
                data: $('#addWorkingHour').serialize(),
                dataType: 'json',
                success: function() {
                    getDoctorWorkingHour();
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

        $("#addUnavailability").on("submit", function(e){
            $.ajax({
                url: '../../routes/doctor/Schedule/UnavailableDay/newDoctorUnavailability.php',
                type: 'post',
                data: $('#addUnavailability').serialize(),
                dataType: 'json',
                success: function() {
                    getDoctorUnavailability();
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

        $(document).ready(function(){
            $(".error").hide();
            for(let i = 0; i < 24; i++){
                const hourMark = i + ":00";
                $("#doctorStartingHour").append("<option value='" + hourMark + "'>" + hourMark + "</option>");
                $("#doctorEndingHour").append("<option value='" + hourMark + "'>" + hourMark + "</option>");
                
                const halfHourMark = i + ":30";
                $("#doctorStartingHour").append("<option value='" + halfHourMark + "'>" + halfHourMark + "</option>");
                $("#doctorEndingHour").append("<option value='" + halfHourMark + "'>" + halfHourMark + "</option>");
            }
            getDoctorWorkingHour();
            getDoctorUnavailability();
        });
    </script>	 

</html>