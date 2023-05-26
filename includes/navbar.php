<?php

$user_data = check_login($con);

 echo '<nav class="navbar navbar-expand-lg" data-bs-theme="dark" id="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand fs-1 fw-bold logo">LIBRARYHUB</a> 

            <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navmenu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">';

                if ($user_data['accountId'] == 1) {
                    echo '<li class="nav-item p-3">
                     <a href="return.php" class="nav-link">To Return</a>
                 </li>';
                 }
                 echo'
                    <li class="nav-item p-3">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>';
                    if ($user_data['accountId'] != 1) {
                       echo '<li class="nav-item p-3">
                        <a href="borrow.php" class="nav-link">Borrow</a>
                    </li>';
                    }
                    if ($user_data['accountId'] == 1) {
                       echo '<li class="nav-item p-3">
                        <a href="book.php" class="nav-link" >Manage</a>
                    </li>';
                    }
    
                echo '<!-- <li class="nav-item p-3">
                        <a href="book.php" class="nav-link" >Books</a>
                    </li> -->
                    <li class="nav-item p-3">
                        <a href="logout.php" class="nav-link">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';