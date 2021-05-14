  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>

<body style="background-color : #BDC3C7;;">
<header>
  <nav class="navbar navbar-dark bg-dark" style="height: 120px;">

 <!--  <a style="height: 50px;" class="navbar-brand" href="#">
    <div>
    <img src="download.png"  style="max-height: 60px;">
     <b>Bank Of India</b>
    </div>
  </a> -->
  <a class="navbar-brand" href="#">
    <img src="download.png" width="80" height="90" class="d-inline-block align-center" alt=""> Bank of India
    
  </a>
  <!-- <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    How can we help you?
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#"></a>
    <a class="dropdown-item" href="#"></a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div> -->
</div>
<br>
<br>
 <div class="dropdown" style="margin-left: 700px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    How can we help you?
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="index1.php">Home</a>
    <a class="dropdown-item" href="customer.php">Show all Customers</a>
    <a class="dropdown-item" href="transactionhistory.php">View Transactions</a>
    <a class="dropdown-item" href="customer.php">Transfer Money</a>
  </div>

</div>
 <div class="dropdown" style="margin-right: 100px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Contact Us
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="https://www.facebook.com/BankOfIndia/">Facebook</a>
    <a class="dropdown-item" href="https://twitter.com/BankofIndia_IN?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">Twitter</a>
    <a class="dropdown-item" href="tel:+919082206501">Phone </a>
  </div>
</nav>
      </header>


	<div class="container">
        <h2 class="text-center pt-4" style="color : black;">Transaction History</h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead style="color : black;">
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
                <th class="text-center">PRINT</th>
                   
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr style="color : black;">
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['reciever']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            <td><a href="print.php?sno= <?php echo $rows['sno'] ;?>"> <button type="button" class="btn" style="background-color : #A569BD;">PRINT</button></a></td> 
                   
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<footer class="text-center mt-5 py-2">
         <img src="download.png" width="120" height="120" class="d-inline-block align-center">
            <p>&copy 2021. Made by <b>Mandar Mohite</b> <br> Bank of India</p>
        
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>