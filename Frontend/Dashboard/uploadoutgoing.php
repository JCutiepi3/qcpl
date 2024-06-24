<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>


     <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="style.css">

    <!-- ======= Boxiocns ====== -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

     <!-- =============== Navigation ================ -->
     <div class="sidebar close">
        <div class="logo-details">
            <span class="img">
                <img src="imgs/logo.png" >
            </span>
          <span class="logo_name">Quezon City Public Library</span>
        </div>
        
        <ul class="nav-links">
    
          
          <li>
            <div class="iocn-link">
              <a href="receiving.php">
                <i class='bx bxs-grid'></i>
                <span class="link_name">Dashboard</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="receiveincoming.php">Incoming</a></li>
              <li><a href="receiveoutgoing.php">Outgoing</a></li>
              <li><a href="receivingapproved.php">Approved</a></li>
            </ul>
          </li>
    
    
          <li>
            <div class="iocn-link">
              <a href="uploadincoming.php">
              <i class='bx bxs-file-plus' ></i>
              <span class="link_name">Upload Document</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="uploadincoming.php">Incoming</a></li>
              <li><a href="uploadoutgoing.php">Outgoing</a></li>

            </ul>
          </li>
    
          <li>
            <a href="/qcpl/Backend/logout.php">
              <i class='bx bxs-log-out' ></i>
              <span class="link_name">Sign Out</span>
            </a>
          </li>
    
      </li>
      </ul>
      </div>

        <!-- ========================= Main ==================== -->
        <section class="home-section">
            <div class="home-content">
              <i class='bx bx-menu' ></i>
        
            </div>

         <!-- ========================= Summary ==================== -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>OUTGOING</h2>
                        <form action="/qcpl/Backend/fileupload.php" method="POST" enctype="multipart/form-data">

                            <label id = "lb_loc">Locator Number: </label>
                            <input id = "in_loc" type="number" name="locator_num" required><br>

                            <label id = "lb_rec">Received Date: </label>
                            <input id = "in_rec" type="datetime-local" name="received_date" required><br>
                        
                            <label id = "lb_from" for="">Received From: </label>
                            <input id = "in_from" type="text" name="received_from" required><br>

                            <label id = "lb_sub" for="">Subject: </label>
                            <input id = "in_sub" type="text" name="subject" required><br>

                            <label id = "lb_dec" for="">Description: </label>
                            <input id = "in_dec" type="text" name="description" required><br>

                            <label id="lb_filetype">File Type:</label>
                            <select name="type" id="in_sel" required>
                                <option value="" disabled selected>Select Document Format</option>
                                <option value="DOCS">Document</option>
                                <option value="PDF">Portable Document Format</option>
                                <option value="IMG">Image</option>
                            </select>
                            <br>    

                            <input id = "in_file" type="file" name="fileName" required><br>
                            <input id = "in_submit" type="submit" name="outgoingupload" value="Submit">
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- ========================= Script ==================== -->
<script src="main.js"></script>

<!-- ========================= Ionicons ==================== -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
       