
<?php
include 'config.php';


if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customer where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customer where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['BALANCE']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        echo '<script>alert("Are you sure you want to transfer?")</script>';
        
                // deducting amount from sender's account
                $newbalance = $sql1['BALANCE'] - $amount;
                $sql = "UPDATE customer set BALANCE=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['BALANCE'] + $amount;
                $sql = "UPDATE customer set BALANCE=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['CUSTOMER_NAME'];
                $receiver = $sql2['CUSTOMER_NAME'];
                $sql = "INSERT INTO transaction(`sender`, `reciever`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

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
</div>
<br>
<br>
 <div class="dropdown" style="margin-left: 700px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    How can we help you?
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
        <h2 class="text-center pt-4" style="color : black;">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  CUSTOMER where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : black;">
                    <th class="text-center">Id</th>
                    <th class="text-center">CUSTOMER_NAME</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">BALANCE</th>
                </tr>
                <tr style="color : black;">
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['CUSTOMER_NAME'] ?></td>
                    <td class="py-2"><?php echo $rows['EMAIL'] ?></td>
                    <td class="py-2"><?php echo $rows['BALANCE'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM CUSTOMER where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['CUSTOMER_NAME'] ;?> (Balance: 
                    <?php echo $rows['BALANCE'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer</button>
        </form>
    </div>
    <footer class="text-center mt-5 py-2">
            <img src="download.png" width="120" height="120" class="d-inline-block align-center">
            <p>&copy 2021. Made by <b>Mandar Mohite</b> <br> Bank of India</p>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>