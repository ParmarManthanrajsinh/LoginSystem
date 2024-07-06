<?php
$loggedin = false;
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $loggedin = true;
}

print '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Login">
            <h1 style="margin-bottom: 15px">🪪</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/Login/home.php">Home</a>
                </li>';

                if(!$loggedin){
                    print '<li class="nav-item">
                        <a class="nav-link" href="/Login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/Login/signup.php">Singup</a>
                    </li>';
                }

                if($loggedin){
                    print '<li class="nav-item">
                    <a class="nav-link " href="/Login/logout.php">Logout</a>
                    </li>';
                }


                
            print '</ul>
        </div>
    </div>
</nav>';
?>