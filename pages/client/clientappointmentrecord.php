<!DOCTYPE html>
<html>
    <head>
        <title>Appointment Records</title>
        <script src="../javascript/jquery.min.js"></script>
        <script src="../javascript/clientauthentication.js"></script>
        <link rel="stylesheet" href="../css/style.css?id=100">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css.map">
        <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    </head>

    <body class="bg-light">

        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-primary" style="background-color: tomato">
                <div>
                    <a href="homeclient.php" class="navbar-brand"> MedApp </a>
                </div>

                <ul class="navbar-nav">
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
                <h2>Appointment Records</h2>
                <div id="clientRecord">
                </div>
            </div>
        </main>
        
    </body>

	<script>

		function deleteAppointmentByClientId(id){
            $.ajax({
                url : "../../routes/appointments/deleteAppointmentByClientId.php",
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
            url:'../../routes/appointments/getDoctorAppointment.php',
            type:'get',
            success :function(data){
                $("clientRecord").html("");
                data.forEach(function each(appointment){
                    let removeButton = "";
                    var d = new Date(appointment.dateOfAppointment);
                    var appointmentTimestamp = d.getTime()/1000;
                    if(Math.floor(Date.now() / 1000) < appointmentTimestamp){
                        removeButton = "<button class=\"btn btn-danger\" onClick=\"deleteAppointmentByClientId(" + appointment.appointmentsId + ")\">Remove</button>";
                    }
                    
                    $("#clientRecord").append(
                        '<div class="container record p-3 my-3 border">' +
                            "<div class=\"thumbnail\">" +
                                "<div class=\"caption\">"+
                                    "<p> Date of Appointment: " + appointment.dateOfAppointment +" &nbsp;&nbsp;" + removeButton + "</p>"+
                                    "<p> Name: " + appointment.firstname + " " + appointment.lastname + "</p>"+  
                                    "<p> Phonenumber: " + appointment.phonenumber + "</p>"+
                                    "<p> Email: " + appointment.email + "</p>"+
                                    "<p> Address: " + appointment.address + "</p>"+
                                    "<p> Departement: " + appointment.departement + "</p>"+
                                    "<p> Region: " + appointment.region + "</p>"+
                                    "<p> Postal Code: " + appointment.postalCode + "</p>"+
                                "</div>" +
                            "</div>" +
                        "</div>"
                    );
                });
            }
        });

	</script>
</html>

