<!doctype html>
<html lang="en">

<?php
include("functions.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css">
        <title>Chandrapur Corporation Bank</title>
</head>

<body class="B">



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
    <div>
        <div class="header">
            <h1>CHANDRAPUR CORPORATION BANK</h1>
            <p style="font-size: 30px;">Secure your money here and we'll secure your future.</p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images (2).png" height="60" width="100 ">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Features.html">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contacts.html">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container my-4">
        <h2 class="shadow-lg text-center" >User Details</h2>
        <?php
    if (isset($_GET['customer_id'])) {
      $c_id = $_GET['customer_id'];
      $get_customers = "select * from userdetails where id='$c_id'";
      $run_customers = mysqli_query($con, $get_customers);

      while ($row_customers = mysqli_fetch_array($run_customers)) {
        $customer_id = $row_customers['id'];
        $customer_name = $row_customers['name'];
        $customer_email = $row_customers['email'];
        $current_balance = $row_customers['balance'];

        echo "
                       <br>
                       <br>
                        <table class='table table-bordered' style='text-align: center; font-size: 18px;'>
                            <tr>
                                <th scope='col'>Customer ID</th>
                                <td>$customer_id</td>
                            </tr>
                            <tr>
                                <th scope='col'>Customer Name</th>
                                <td>$customer_name</td>
                            </tr>
                            <tr>
                                <th scope='col'>Customer Email</th>
                                <td>$customer_email</td>
                            </tr>
                            <tr>
                                <th scope='col'>Current Balance</th>
                                <td>$current_balance</td>
                            </tr>
                        </table>
                        </div>
                          

                        <div class='row'>
                        <div class='col-sm-3'></div>
                            <div class='col-12 col-sm-3'>
                              
                                     
                                        <a href='customers.php' style='text-decoration: none;' class='btn res ' role='button'>Back to all customers</a>
                                     
                               
                                </div>
                  
                            <div class='col-12 col-sm-3 '>
                               
                                   
                                        <a href='transfer.php?customer_id=$c_id' style='text-decoration: none;'class='btn res' role='button'>Transfer Money</a>
                                   
                               
                            </div>
                            <div class='col-sm-3'></div>
                        </div>
                    ";
      }
    }
    ?>
  </div>










  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <footer>
        <p>Created By Anup Shaha</p>
    </footer>
</body>

</html>