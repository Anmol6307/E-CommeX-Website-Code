<?php
session_start();
include("DB.php");
$uid = $_SESSION['user_id'];
$select="select * from orders as o left join products as p on o.prod_id=p.p_id where o.user_id = '$uid' order by o.status desc";
$results=mysqli_query($connection, $select);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Orders</title>
	<style>
	   *{
        font-family: 'Comfortaa', cursive;
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	.navbar{
        background-color: green;
    }
	.Product:hover{
        border: none;
		box-shadow: 2px 2px 4px rgba(0,0,0,0,2);
		transform: scale(1.02);
	}
	.Img:hover{
        border: none;
		box-shadow: 2px 2px 4px rgba(0,0,0,0,2);
		transform: scale(1.01);
	}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body>
<div class='navbar'>
     <a href='dashboard.php'><button class="btn btn-primary">Home</button></a> 
       <nav>
         <ul id='MenuItems'>
		   <li><a href="cart.php?id=<?= $uid; ?>"><button class="btn btn-warning text-light">View Cart</button></a></li>
           <li><a href="logout.php"><button class="btn btn-danger">Log Out</button></a></li>
        </ul>
       </nav>
    </div>    
	
    <h1 class="mt-3 bg-info text-light text-center">My Orders</h1>
<?php
    while($rows=mysqli_fetch_assoc($results)){
    	//print_r($rows);
		         if($rows['status'] == 2 ){
		         ?>
			
			<div class="col-md-12">
    	        <div class="card row">
		                    <div class="card-header ">
		                    	<div class="card-body">
		                    		<h2 class="ml-3">Current</h2>
									<div class="Img">
			                    		<div class="col-md-6">
			                    			<img src="upload/<?= $rows['file']; ?>" style="width:200px;height: 200px;">
			                    		</div>
									</div>
										<div class="Product">
			                    		<div class="col-md-6">
			                    			<strong>Id : <?= $rows['id']; ?></strong><br>
			                    			<strong>Product : <?= $rows['p_name']; ?></strong><br/>
			                    			<strong>Total Price : <?= $rows['price']; ?></strong><br/>
			                    			<strong>Scheduled Date : <?= $rows['scheduled_date']; ?></strong>
			                    		</div>
										</div>
			                    		<form method="post">
			                    			<input type="hidden" name="hidden" id="hidden" value="<?= $rows['id'];?>">
			                    			<button type="submit" class="btn btn-danger mt-2 ml-3" id="cancel" >Cancel Order</button>
			                    		</form>
		                    	</div>
		                    </div>
		           </div>
			   </div>
		
		         <?php
		       }
		         if($rows['status'] == 1){
		         ?>
				
				   <div class="col-md-12">
		              <div class="card mt-5 row">
		                    <div class="card-header ">
		                    	<div class="card-body ">
		                    		<h2 class="ml-3">Completed</h2>
									<div class="Img">
			                    		<div class="col-md-6">
			                    			<img src="upload/<?= $rows['file']; ?>" style="width:200px;height: 200px;">
			                    		</div>
									</div>
										<div class="Product">
			                    		<div class="col-md-6">
			                    			<strong>Id : <?= $rows['id']; ?></strong><br>
			                    			<strong>Product : <?= $rows['p_name']; ?></strong><br/>
			                    			<strong>Total Price : <?= $rows['price']; ?></strong><br/>
			                    			<strong>Scheduled Date : <?= $rows['scheduled_date']; ?></strong>
			                    		</div>
										</div>
			                    		<form method="post">
			                    			<input type="hidden" name="hidden" id="hidden" value="<?= $rows['id'];?>">
											<p class="text-success">Completed</p>			                    		
			                    		</form>
		                    	</div>
		                    </div>
					  </div>
				   </div>
		        
		       <?php } 
		       if($rows['status'] == 0)
		       {
		       ?>
			  
			      <div class="col-md-12">
		             <div class="card mt-5 row">
		                    <div class="card-header ">
		                    	<div class="card-body ">
		                    		<h2 class="ml-3">Cancelled</h2>
									 <div class="Img">
			                    		<div class="col-md-6">
			                    			<img src="upload/<?= $rows['file']; ?>" style="width:200px;height: 200px;">
			                    		</div>
									 </div>
										<div class="Product">
			                    		<div class="col-md-6">
			                    			<strong>Id : <?= $rows['id']; ?></strong><br>
			                    			<strong>Product : <?= $rows['p_name']; ?></strong><br/>
			                    			<strong>Total Price : <?= $rows['price']; ?></strong><br/>
			                    			<strong>Scheduled Date : <?= $rows['scheduled_date']; ?></strong>
			                    		</div>
										</div>
			                    		<form method="post">
			                    			<input type="hidden" name="hidden" id="hidden" value="<?= $rows['id'];?>">
											<p class="text-danger ml-3">Cancelled</p>			                    		
										</form>
		                    	</div>
		                    </div>
				      </div>
		         </div>
		       <?php } ?>
		    
		</div>
  <?php
    }
?>
</body>
</html>
<script>
			$(document).ready(function(){
				$('#cancel').on('click', function() {
				var id = $('#hidden').val();
     		$.ajax({
		                url: "ajax.php",
		                type: "POST",
		                data: {
		                    id: id,
		                    action:"update_status"
		                },
		                cache: false,
		                success: function(result){
		                    alert('Your Order Has Cancelled Succesfully');
		                }
		            });
		        });
       			});		 	
			
</script>