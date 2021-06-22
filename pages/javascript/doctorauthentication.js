$.ajax({
    url:'../../filter/DoctorAuthenticateFilter.php',
    type:'get',
    success :function(data){

    } ,
    error :function(data){
        window.location.href = '../doctor/logindoctor.php';
    }
});	
