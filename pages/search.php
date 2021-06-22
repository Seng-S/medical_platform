<!DOCTYPE html>
<html>
    <head>
        <title>MedApp Search Result</title>
        <script src="javascript/jquery.min.js"></script>
        <script src="javascript/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="css/style.css?id=100">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css.map">
        <link rel="stylesheet" href="css/bootstrap.min.css.map">
    </head>
    

    <body class="bg-light">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-primary"
                style="background-color: tomato">

                <?php
                    require_once 'navbar.php';
                ?>
                    
                <form class="d-flex" action="search.php"  method="get">
                    <input class="form-control me-2" name="criteria" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </nav>
        </header>
        <main>
            <div class="container mt-5">
                <h2>Search result</h2>

                <div id = "searchResults">

                </div>
            </div>
        </main>
    </body>
    <script>
        $(document).ready(function(){
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            $.ajax({
                url: '../routes/search/getDoctorByCriteria.php?criteria=' + params['criteria'],
                type: 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    $("searchResults").html("");
                    data.forEach(function each(doctor){
                        $("#searchResults").append(
                            '<div class="container record p-3 my-3 border">' +
                                "<div class=\"thumbnail\">" +
                                    "<div class=\"caption text-info\">"+
                                        "<h4><a href=\"client/appointment.php?doctorId=" + doctor.doctorId + "&firstname=" + doctor.firstname + "&lastname=" + doctor.lastname + "\">Book</a></h4>"+
                                        "<p> Name: " + doctor.firstname + " " + doctor.lastname + "</p>"+
                                        "<p> Specialization: " + doctor.specialization + "</p>"+
                                        "<p> Phonenumber: " + doctor.phonenumber + "</p>"+
                                        "<p> Email: " + doctor.email + "</p>"+
                                        "<p> Address: " + doctor.address + "</p>"+
                                        "<p> Departement: " + doctor.departement + "</p>"+
                                        "<p> Region: " + doctor.region + "</p>"+
                                        "<p> Postal Code: " + doctor.postalCode + "</p>"+
                                    "</div>" +
                                "</div>" +
                            "</div>"
                        );
                    });
                }
            });
        });
    </script>	 

</html>