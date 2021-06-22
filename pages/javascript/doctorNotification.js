$(document).ready(function(){
    $.ajax({
        url:'../../routes/appointments/countAppointmentByDoctorId.php',
        type:'get',
        success :function(data){
            $("#notificationCount").html("");
            if(data.number_of_appointment) {
                $("#notificationCount").html(data.number_of_appointment)
            }
        }
    });
});