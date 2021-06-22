<!DOCTYPE html>
<html>

<head>
    <title>CLient Login</title>
    <script src="../javascript/jquery.min.js"></script>
</head>

<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap.css.map">
<link rel="stylesheet" href="../css/bootstrap.min.css.map">

<body class="bg-light">

    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary" style="background-color: tomato">
            <div>
                <a href="../home.php" class="navbar-brand"> MedApp </a>
            </div>

            <ul class="navbar-nav">
                <li><a href="registrationclient.php" class="nav-link">Client Register</a></li>
                <li><a href="../doctor/registrationdoctor.php" class="nav-link">Doctor Register</a></li>
                <li><a href="../doctor/logindoctor.php" class="nav-link">Doctor Login</a></li>
            </ul>
            <form class="d-flex" action="../search.php"  method="get">
                <input class="form-control me-2" name="criteria" type="search" placeholder="Search" aria-label="Search" required>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </nav>
    </header>
    <form id="login"  class="container mx-auto mt-4">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="InputPassword" name="password">
        </div>
        <div>
        <button type="submit" class="btn btn-primary">Submit</button><br>
        </div>

        <div id="credentialInvalid" class="text-danger error col-md-6">
            Credential Invalid
        </div>

    </form>

    <script>
	$(document).ready(function(){

        $(".error").hide();	 
            
        $("#login").on("submit", function(e){
            $.ajax({
                url: '../../routes/auth/clientSignIn.php',
                type: 'post',
                data: $('#login').serialize(),
                dataType: 'json',
                success: function() {
                window.location.href = 'homeclient.php';  
                },
                error: function(request, status, error) {
                    if(request.status == 401){
                        let jsonResponse = request.responseJSON;
                        if(jsonResponse.credentialInvalid){
                            $("#credentialInvalid").show();
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