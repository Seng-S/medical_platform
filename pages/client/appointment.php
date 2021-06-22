<!DOCTYPE html>
<html>
    <head>
        <title>MedApp Appointment</title>
        <script src="../javascript/jquery.min.js"></script>
        <script src="../javascript/jquery-ui.min.js"></script>
        <script src="../javascript/clientauthentication.js"></script>
        <script src="../javascript/clientNotification.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css.map">
        <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    </head>


    <body class="bg-light">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-primary"
                style="background-color: tomato">
                <div>
                    <a href="homeclient.php" class="navbar-brand"> MedApp </a>
                </div>

                <ul class="navbar-nav">
                    <li><a
                        href="clientappointmentrecord.php"
                        class="nav-link">Appointment Records <span id="notificationCount"></span></a></li>
                    <li><a href=""
                        class="nav-link">Chatbot</a></li>
                    <li><a href="clientSetting.php"
                        class="nav-link">Setting</a></li>
                    <li><a href="../../routes/auth/clientSignOut.php"
                        class="nav-link">Sign Out </a></li>
                </ul>
                <form class="d-flex" action="../search.php"  method="get">
                    <input class="form-control me-2" name="criteria" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </nav>
        </header>
        
        <main>
            <div class="container mt-5">
                <h2>Please pick an appointment with Dr. <?php echo $_GET['firstname'].' '.$_GET['lastname']; ?></h2>
                <form id="appointment">
                    <div class="col-md-6">
                        <label for="appointmentDate" class="form-label">Select a date</label>
                        <input type="date" id="appointmentDate" name="appointmentDate" onchange="onDateSelected(event);"/>
                    </div>
                    <div id="doctorHourContainer" class="col-md-3"><br>
                        <label for="doctorWorkingHour" class="form-label">Pick a time for your appointment</label>
                        <select class="form-control" id="doctorWorkingHour" name="appointmentTime" required></select><br>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Book Appointment</button><br>
                        </div>
                    </div>
                        
                    <input type="hidden" name="doctorId" value="<?php echo $_GET['doctorId']; ?>"/>
                    
                    <div id="error" class="text-danger error col-md-6">
                        Selected datetime is no longer available
                    </div>
                </form>
            </div>
        </main>
    </body>
    <script>
        
        let today = new Date();
        let dd = today.getDate();
        let mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        let yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("appointmentDate").setAttribute("min", today);
        $("#error").hide();
        $("#appointment").on("submit", function(e){
            $("#error").hide();
            $.ajax({
                url: '../../routes/appointments/newAppointment.php',
                type: 'post',
                data: $('#appointment').serialize(),
                dataType: 'json',
                success: function() {
                    window.location.href = 'clientappointmentrecord.php';
                },
                error: function(request, status, error) {
                    if(request.status == 400){
                        let jsonResponse = request.esponseJSON;
                        if(jsonResponse.unavailableDatetime){
                            $("#error").show();
                        }
                    }
                }
            });
            e.preventDefault();
        });

        function onDateSelected(event) {
            let dayOfTheWeek = (new Date(event.target.value)).getDay();
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            $("#doctorHourContainer").show();
            $.ajax({
                url: '../../routes/appointments/getAppointmentByDoctorIdAndDate.php?doctorId=' + params['doctorId'] + '&date=' + event.target.value,
                type: 'get',
                dataType: 'json',
                success: function(appointments) {
                    const unavailableHours = appointments.map(appointment => {
                        const dateTime = new Date(appointment.date_of_appointment).toTimeString();
                        return dateTime.split(' ')[0].substring(0, 5);
                    });
                    $.ajax({
                        url: '../../routes/doctor/Schedule/getWorkingHourByDay.php?doctorId=' + params['doctorId'] + '&dayId=' + dayOfTheWeek,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            $('#doctorWorkingHour').html("");
                            
                            data.forEach(function each(workingHour){
                                const workingHourStart = parseFloat(workingHour.starting_hour.substr(0, 5).replace(':', '.'));
                                const workingHourEnd = parseFloat(workingHour.ending_hour.substr(0, 5).replace(':', '.'));
                                // Loop from current hour number to 23
                                for(let i = 0; i < 24; i++){
                                    const hourMark = parseFloat(i + ".00");
                                    const halfHourMark = parseFloat(i + ".30");
                                    let doctorWorkingHour = "";
                                    if(hourMark >= workingHourStart && hourMark < workingHourEnd) {
                                        doctorWorkingHour = i + ":00";
                                        if(!unavailableHours.includes(doctorWorkingHour)) {
                                            $("#doctorWorkingHour").append("<option value='" + doctorWorkingHour + "'>" + doctorWorkingHour + "</option>");
                                        }
                                    }
                                    if(halfHourMark >= workingHourStart && halfHourMark < workingHourEnd) {
                                        doctorWorkingHour = i + ":30";
                                        if(!unavailableHours.includes(doctorWorkingHour)) {
                                            $("#doctorWorkingHour").append("<option value='" + doctorWorkingHour + "'>" + doctorWorkingHour + "</option>");
                                        }
                                    }
                                }
                            });
                            if (data.length == 0) {
                                $("#doctorWorkingHour").append("<option value='' disabled selected>Unavailable today</option>");
                            }
                        },
                        error: function(request, status, error) {}
                    });
                }
            });
            
        }
	</script>	 

</html>