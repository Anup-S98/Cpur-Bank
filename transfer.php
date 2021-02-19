<!doctype html>
<html lang="en">
<?php
include("functions.php");
?>
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
    <div >
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
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
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



  <div class="container">
    <?php
    if (isset($_GET['customer_id'])) {
      $c_id = $_GET['customer_id'];
      $get_customers = "select * from userdetails where id='$c_id'";
      $run_customers = mysqli_query($con, $get_customers);
      $row_customers = mysqli_fetch_array($run_customers);
      $customer_id = $row_customers['id'];
      $customer_name = $row_customers['name'];
      $current_balance = $row_customers['balance'];

      echo "
                      <form action='transfer.php?customer_id=$c_id' method='post' enctype='multipart/form-data'>
                          <label for='from' style='font-size: 20px;'>Transferring from</label>
                          <div class='form-row'>
                              <div class='col-lg-4 col-md-8 col-sm-12 mb-3 mx-auto'>
                                  <label for='from_acc'>Customer ID</label>
                                  <input type='number' class='form-control' name='from_acc' value='$customer_id' readonly>
                              </div>
                              <div class='col-lg-4 col-md-8 col-sm-12 mb-3 mx-auto'>
                                  <label for='from_acc_name'>Customer Name</label>
                                  <input type='text' class='form-control' name='from_acc_name' value='$customer_name' readonly>
                              </div>
                              <div class='col-lg-4 col-md-8 col-sm-12 mb-3 mx-auto'>
                                  <label for='curr_bal'>Current Balance</label>
                                  <input type='number' class='form-control' name='curr_bal' value='$current_balance' readonly>
                              </div>
                          </div>
                          <br>
                          <label for='to' style='font-size: 20px;'>Transfer to</label>
                          <div class='form-row'>
                              <div class='col-lg-4 col-md-8 col-sm-12 mb-3 mx-auto'>
                                  <label for='to_acc'>Customer Name</label>
                                  <select class='form-control' name='to_acc' required>
                                      <option value='0'>Select Name on Account</option>
                  ";
      $get_customers = "select * from userdetails";
      $run_customers = mysqli_query($con, $get_customers);
      while ($row_customers = mysqli_fetch_array($run_customers)) {
        $customer_id = $row_customers['id'];
        $customer_name = $row_customers['name'];
        echo "<option value='$customer_id'>$customer_name</option>";
      }
      echo "
                                  </select>
                              </div>
                              <div class='col-lg-4 col-md-8 col-sm-12 mb-3 mx-auto'>
                                  <label for='transfer_amt'>Transfer Amount</label>
                                  <input type='number' class='form-control' name='transfer_amt' placeholder='Amount' required>
                              </div>
                          </div>
                          <div class='form-row'>
                              <div class='col-lg-4 col-md-8 col-sm-12 mb-3 mx-auto'>
                                  <label for='transfer_msg'>Message for the reciever</label>
                                  <input type='text' class='form-control' name='transfer_msg' placeholder='Message'>
                              </div>
                          </div>
                          <div class='row'>
                          <div class='col-sm-3'></div>
                          <div class='col-12 col-sm-3 '>
                          <center>
                              <button type='submit' class='btn  res ' name='transfer'>Transfer Now</button>
                          </center>
                          </div>
                          <div class='col-12 col-sm-3'>
                         
                          <center>
                             
                                  <a href='customers.php' style='text-decoration: none';  class='btn res res1' role='button'>Cancel Transfer</a>
                             
                          </center>
                      </div>
                          </div>
                      </form>
                     
                      
                  ";
    }
    ?>
  </div>


  <footer>
        <p>Created By Anup Shaha</p>
    </footer>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php
if (isset($_POST['transfer'])) {
  $curr_bal = $_POST['curr_bal'];
  $transfer_date = date('d-m-Y H:i:s a');
  $from_acc = $_POST['from_acc'];
  $from_acc_name = $_POST['from_acc_name'];
  $to_acc = $_POST['to_acc'];
  $transfer_amt = $_POST['transfer_amt'];
  $transfer_msg = $_POST['transfer_msg'];

  if ($to_acc != 0) {
    $get_customer = "select balance from userdetails where id=$from_acc";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);

    if ($transfer_amt <= $row_customer['balance']) {
      $f_customer = "update userdetails set balance=$curr_bal-$transfer_amt where id=$from_acc";
      $run_f_customer = mysqli_query($con, $f_customer);

      $t_customer = "select balance from userdetails where id=$to_acc";
      $run_t_customer = mysqli_query($con, $t_customer);
      $row_t_customer = mysqli_fetch_array($run_t_customer);
      $to_curr_bal = $row_t_customer['balance'];

      $t_customer_1 = "update userdetails set balance=$to_curr_bal+$transfer_amt where id=$to_acc";
      $run_t_customer_1 = mysqli_query($con, $t_customer_1);

      $insert_transfer = "insert into userpayment (transfer_date, from_acc, from_acc_name, to_acc, transfer_amt, transfer_msg) values ('$transfer_date', $from_acc, '$from_acc_name', $to_acc, $transfer_amt, '$transfer_msg')";
      $run_transfer = mysqli_query($con, $insert_transfer);
      if ($run_f_customer && $run_t_customer && $run_t_customer_1 && $run_transfer) {
        echo '<script>alert("Transfer complete")</script>';
        echo '<script>window.open("customers.php", "_self")</script>';
      } else {
        echo '<script>alert("Unable to transfer")</script>';
      }
    } else {
      echo '<script>alert("Insufficient Balance!!!")</script>';
    }
  } else {
    echo '<script>alert("Please select an account!!!")</script>';
  }
}
?>