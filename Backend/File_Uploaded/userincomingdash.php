<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="img/Logo.png">
    <link rel="stylesheet" href="userdashboard.css">
</head>
<body>

     <!-- =============== Navigation ================ -->
     <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="img/Logo.png" >
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="userdashboard.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="apps"></ion-icon>
                    </span>
                    <span class="title">Dashboard<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>
                    

                         <li class="sub_dash"><a href="userincomingdash.php">Incoming</a></li>
                         <li class="sub_dash"><a href="useroutgoingdash.php">Outgoing</a></li>
                         <li class="sub_dash"><a href="userapprovedash.php">Approved</a></li>
                
                <li>
                    <a href="useroutgoing.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="add-circle"></ion-icon>
                    </span>
                    <span class="title">Upload Document</span>
                    </a>
                </li>

                <li>
                    <a href="/qcpl/Backend/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                
                
            <form action="/qcpl/Backend/locator.php" method="GET">
                <div class="search">
                    <label>
                        <input type="number" name="locator" placeholder="Search here">
                        <input type="submit" id="sub_hide" name="find">
                        <ion-icon name="search-outline" name="locate"></ion-icon>
                    </label>
                </div>
            </form>
               

                <div class="user">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>INCOMING</h2>   
                        </div>
                    <div class="sum_tb">
                        <table aria-describedby="tableDescription">
                        <table><tr><th>Locator Number</th><th>Division</th><th>Section</th><th>Received From</th><th>Received Date</th><th>Category</th><th>Status</th><th>Action</th></tr><tr><td>123456789</td><td>Technical Division</td><td>Cataloging Section</td><td>GUIMO</td><td>2024-06-22</td><td>Incoming</td><td>Approved</td><td id='table_th'><center><a href='useraccountlocator.php?locator_num=123456789' target='_self' aria-label='View details for 123456789'>View</a></td></tr><tr><td>136462070066</td><td>Publication Division</td><td>Publishing Section</td><td>QCPL</td><td>2024-06-22</td><td>Incoming</td><td>Approved</td><td id='table_th'><center><a href='useraccountlocator.php?locator_num=136462070066' target='_self' aria-label='View details for 136462070066'>View</a></td></tr><tr><td>222</td><td>Readers Service Division</td><td>Law Research Section</td><td>22</td><td>2024-06-22</td><td>Incoming</td><td>Approved</td><td id='table_th'><center><a href='useraccountlocator.php?locator_num=222' target='_self' aria-label='View details for 222'>View</a></td></tr><tr><td>110011</td><td></td><td></td><td>king</td><td>2024-06-24</td><td>Incoming</td><td>Second Review</td><td id='table_th'><center><a href='useraccountlocator.php?locator_num=110011' target='_self' aria-label='View details for 110011'>View</a></td></tr></table><div style='text-align: center; margin-top: 20px;'><a href='?page=1'>1</a> </div>
                    </div> 
                    
                </div>
               
    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>