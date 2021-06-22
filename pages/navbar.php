<?php
    session_start();

    if(isset($_SESSION['client'])) {
?>
<div>
    <a href="client/homeclient.php" class="navbar-brand"> MedApp </a>
</div>

<ul class="navbar-nav">
    <li><a
        href="client/clientappointmentrecord.php"
        class="nav-link">Appointment Records</a></li>
    <li><a href=""
        class="nav-link">Chatbot</a></li>
    <li><a href="client/clientSetting.php"
        class="nav-link">Setting</a></li>
    <li><a href="../routes/auth/clientSignOut.php"
        class="nav-link">Sign Out </a></li>
</ul>

<?php }  else {  ?>
<div>
    <a href="home.php" class="navbar-brand"> MedApp </a>
</div>

<ul class="navbar-nav">
    <li><a href="client/registrationclient.php"
        class="nav-link">Client Register</a></li>
    <li><a href="client/loginclient.php"
        class="nav-link">Client Login</a></li>
    <li><a
        href="doctor/registrationdoctor.php"
        class="nav-link">Doctor Register</a></li>
    <li><a href="doctor/logindoctor.php"
        class="nav-link">Doctor Login</a></li>
</ul>
<?php    
}
?>
