<?php
session_start();
include('DB.php');
// print_r($_SESSION);
$id=$_SESSION['user_id'];
$select="select * from products";
$result=mysqli_query($connection,$select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        b{
            color: red;
        }
        .btn{
            background: blue;
            font-size: 15px;
        }
        h2{
            font-family: 'Dancing Script', cursive;
        }
        h1{
            font-family: 'Dancing Script', cursive;
        }
        .navbar{
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="navbar">
       <div class='logo'>
          <a href='#'><h1>Welcome to E-CommeX</h1></a>
      </div>
       <nav>
         <ul id='MenuItems'>
           <li><a href="logout.php"><button class="btn btn-danger">Log Out</button></a></li>
           <li><a href="cart.php?id=<?= $id; ?>"><button class="btn btn-warning">View Cart</button></a></li>
           <li><a href="my_order.php?id=<?= $id; ?>"><button class="btn btn-info">My Orders</button></a></li>
        </ul>
       </nav>
    </div>
    <h1><marquee><b>E-CommeX</b> Website developed by the team of: <b>InfoDeltaSys Software Solutions Pvt. Ltd.</b></marquee></h1>
    <div class="row">
        <h2 class="text-center"> Please visit my all products</h2>
        <?php
    while($row=mysqli_fetch_assoc($result)){
        //print_r($row);
    ?>
        <div class="col-sm-3" style="height: 400px; border:1px solid skyblue;">
                <div  style=" float: left;">
                    <br/><br/>
                    <img src="upload/<?php echo $row['picture']; ?>" class="responsive" style=" max-width:100%; height:250px;">
                </div>
                <div id="myDIV" style="max-width:100%">                    
                    <div class="col-sm-6"><br/><br/>
                        <p><?php echo $row['p_name'];?></p>
                        <strong>₹<?php echo $row['price'];?></strong>
                    </div>
                    <div class="col-sm-6 text-right"><br/><br/>
                       <a href="buy.php"><button class="btn btn-warning">Buy Now</button></a>
                    </div>
                </div>
        </div> 
        <?php
    }
    ?>
    <div class="col-sm-9" style="height: 400px; border:1px solid skyblue;">
     <div class="text-center">
        <h2 class="mt-5">E-CommeX Website developed by the team of: <br><b>InfoDeltaSys Software Solutions Pvt. Ltd.</b><br> Thanks to our inspiring collections and our impeccable customer service,<br> we have been highly successful since day one.<br> Browse through our site <br>and check out the latest additions to our collection,<br> and feel free to get in touch with our team if <br>you need any assistance.<br><b>Happy shopping...!<b></p></h2>
     </div>
     <div>
       <h1 class="text-center mt-5">Thanks for connecting with Us...!</h1>
    </div>
    </div>
    </div>
    <br>
   
    
</body>
</html>