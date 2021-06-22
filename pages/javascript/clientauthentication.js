$.ajax({
    url:'../../filter/clientAuthenticateFilter.php',
    type:'get',
    success :function(data){

    } ,
    error :function(data){
        window.location.href = '../client/loginclient.php';
    }
});	
