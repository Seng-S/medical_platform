<!DOCTYPE html>
<html>
<head>
	<title>Appointment Records</title>
	<script src="../javascript/jquery.min.js"></script>
	<script src="../javascript/doctorauthentication.js"></script>
	<link rel="stylesheet" href="../css/style.css?id=100">
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
				<li><a href="doctorschedule.php"
					class="nav-link">Schedule</a></li>
                <li><a 
					href="doctorsetting.php"
					class="nav-link">Setting</a></li>
				<li><a 
					href="doctorspecialization.php"
					class="nav-link">Specialization</a></li>
				<li><a 
					href="doctoraddress.php"
					class="nav-link">Address</a></li>
                <li><a href="../../routes/auth/doctorSignOut.php"
					class="nav-link">Sign Out </a></li>
			</ul>
		</nav>
	</header>

	<main>
		<div class="container mt-5">
			<h2>Appointment Records</h2>
			<div id="doctorRecord">
			</div>
		</div>
	</main>

	<script>

		function deleteAppointmentByDoctorId(id){
            $.ajax({
                url : "../../routes/appointments/deleteAppointmentByDoctorId.php",
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
            url:'../../routes/appointments/getClientAppointment.php',
            type:'get',
            success :function(data){
                $("#doctorRecord").html("");
				let notificationCount = 0
				$("#notificationCount").html("");

				data.forEach(function each(appointment){
					let removeButton = "";
					
					var d = new Date(appointment.dateOfAppointment);
					var appointmentTimestamp = d.getTime()/1000;
					if(Math.floor(Date.now() / 1000) < appointmentTimestamp){
						removeButton = "<button class=\"btn btn-danger\" onClick=\"deleteAppointmentByDoctorId(" + appointment.appointmentsId + ")\">Remove</button>";
						notificationCount++;
					}
					$("#doctorRecord").append(
						'<div class="container record p-3 my-3 border">' +
							"<div class=\"thumbnail\">" +
								"<div class=\"caption\">"+
									"<p> Date of Appointment: " + appointment.dateOfAppointment +" &nbsp;&nbsp;" + removeButton + "</p>"+
									"<p> Name: " + appointment.firstname + " " + appointment.lastname + "</p>"+  
									"<p> Phonenumber: " + appointment.phonenumber + "</p>"+
									"<p> Email: " + appointment.email + "</p>"+
								"</div>" +
							"</div>" +
						"</div>"
					);
				});
				if(notificationCount) {
					$("#notificationCount").html(notificationCount);
				}
            }
        });

	</script>
</html>