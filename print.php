

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
        }
        .container{
            box-shadow: 0 0 50px 0 #3F0C1F;
            border: 2px solid #3F0C1F;
            background-color:white;
            width:750px;
        }

    </style>
</head>
<header>
<body style="background-color : #BDC3C7;">
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
<button onclick="myFunction()"style="background-color : #BDC3C7;">PRINT</button>
</div>
<script>

function myFunction() {

window.print();

}

</script>
</nav>

</header>
<br><br>
<div class="container">
<h1 style="text-align: center;">
    
     TRANSACTION RECIEPT
</h1>
 </a> 
        <?php
            include 'config.php';
            $sno=$_GET['sno'];
            $sql = "SELECT * FROM  transaction where sno=$sno";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
            $rows=mysqli_fetch_assoc($result);
        ?>
    <div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1">DATE AND TIME:</p></div>
<div class="col-lg-6 col-md-6" style="text-align:center;border: 0.1px solid black;"><p class="p1"> <?php echo $rows['datetime']; ?></p></div>
</div>
<div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border:0.1px solid black;"><p class="p1">SENDER:</p></div>
<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><?php echo $rows['sender']; ?></p></div>
</div>
<div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border:0.1px  solid black;"><p class="p1">RECEIVER:</p></div>
<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><?php echo $rows['reciever'];?></p></div>
</div>
<div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1">AMOUNT:</p></div>
<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><?php echo $rows['balance']; ?></p></div>
 </div>

 </div>
 <footer class="text-center mt-5 py-2">
            <p><b>Thank you for using our services . Continue banking with us</b></p>
            <p><b>BANK OF INDIA </b></p>
        </footer>

 </div>

</body>

</html>
    