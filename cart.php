<?php
include("DB.php");
date_default_timezone_set('Asia/Kolkata');
$u_id=$_REQUEST['id'];
// echo $u_id;
$query="select * from users as u left join cart as c on u.id=c.user_id left join products as prod on prod.p_id=c.prod_id where u.id=$u_id";
$res=mysqli_query($connection, $query);
		              
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cart</title>
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
	.card-body{
		border: 1px solid silver;
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>
<body>
  <div class='navbar'>
     <a href='dashboard.php'><button class="btn btn-primary">Home</button></a> 
       <nav>
         <ul id='MenuItems'>
           <li><a href="logout.php"><button class="btn btn-danger">Log Out</button></a></li>
           <li><a href="my_order.php?id=<?= $u_id; ?>"><button class="btn btn-warning">My Orders</button></a></li>
        </ul>
       </nav>
    </div>
	    <div class="container">
		  <h1 class="text-center">Your Cart</h1>
		<?php 
		$a=1; 
		$amt =0; 
		while($row=mysqli_fetch_assoc($res)){
			$_SESSION['p_id'] = $row['p_id'];
			$amt=$amt+$row['price'];
		 ?>
		 <div class="row<?php echo $a; ?> mt-5">
		            <div class="col-md-12 offset-2">
		                <div class="card">
		                    <div class="card-header ">
		                    	<div class="card-body">
		                    		<form method="post">
										<div class="Img">
			                    		  <div class="col-md-5">
			                    			<img name="img" id="img_src<?= $a; ?>" src="upload/<?= $row['file']; ?>" style="width:100%; height: 251px;">
			                    		  </div>
										</div>
										<div class="Product">
			                    		<div class="col-md-7"><br/>
			                    		<h2>Product : <?= $row['p_name']; ?></h2><br/>
			                    		Schedule Date & Time: <input type="datetime-local" id="datetime"><br/><br/>
			                    		Weight(in kg) :
										
										<input type="button" value="-" onclick="sub<?php echo $a; ?>()"/>
										<input type="number" class="weight<?= $a; ?>" name="prod_qty" id="q<?php echo $a; ?>" value="1" style="width:30px;"/>
										<input type="button" value="+" onclick="add<?php echo $a; ?>()"/><br/><br/>
										Total Price : <input  id="t" class="text-center" name="tamt" value="<?php echo $amt; ?>" readonly style="width:75px;"/>
			                    		</div>
										<div class="text-center">
			                    		  <input type="hidden" id="p_ids<?= $a; ?>" name="hidden" value="<?php echo $row['p_id'];?>">
										  <button type="submit" name="delete<?= $a; ?>" id="delete<?= $a; ?>" class="btn btn-danger from-control">Remove</button>
		                          		  <button type="submit" name="place_order<?= $a; ?>" id="place_order<?= $a; ?>" class="btn btn-primary from-control">Place Order</button>
										</div>
										</div>
		                    		</form>
		                    	</div>
		                    	
		                    </div>
		            	</div>
		        	</div>
				</div>

			<script>
			function add<?php echo $a; ?>()
			{
				var a=$(".row<?= $a; ?> #q<?= $a; ?>").val();			
				a=Number(a);
				var result=a+1;
				$(".row<?php echo $a; ?> #q<?= $a; ?>").val(result);
				//var p=$("#p<?= $a; ?>").html();
				//$("#p<?= $a; ?>").html(parseInt(p)+<?php echo $row['price'] ?>);
				var amount=$('.row<?= $a; ?> #t').val();
				//alert(amount);
				$('.row<?php echo $a; ?> #t').val(parseInt(amount)+<?php echo $row['price'] ?>);
			}
			function sub<?php echo $a; ?>()
			{
				var a=$(".row<?php echo $a; ?> #q<?php echo $a; ?>").val();
				a=Number(a);
				if(a<=1)
				{
				
				}
			else
			{				
				var a=$(".row<?php echo $a; ?> #q<?php echo $a; ?>").val();
				a=Number(a);	
				var result=a-1;			
				$(".row<?php echo $a; ?> #q<?php echo $a; ?>").val(result);
				// var p=$("#p<?php echo $a; ?>").html();				
				// $("#p<?php echo $a; ?>").html(parseInt(p)-<?php echo $row['price']; ?>);
				var amount=$('.row<?php echo $a; ?> #t').val();
				//alert(amount);
				$('.row<?php echo $a; ?> #t').val(parseInt(amount)-<?php echo $row['price'];?>);
			}
		}
		</script>

		<script type="text/javascript">
	$(document).ready(function(){
				$('#place_order<?= $a; ?>').on('click', function() {
				var p_id = $('#p_ids<?= $a; ?>').val();
				//alert(p_id);   
				var total_amt = $('#t').val();
				//alert(total_amt);   //60
        		var weight = $('.weight<?= $a; ?>').val();
               //alert(weight);   //60
        		var img_src = $('#img_src<?= $a; ?>').attr('src');
        		var arr = img_src.split('/');
        		var file = arr[arr.length-1];
        		var date = $("#datetime").val();
        		$.ajax({
		                url: "ajax.php",
		                type: "POST",
		                data: {
		                    prod_id: p_id,
		                    tamt: total_amt,
		                    prod_qty: weight,
		                    file: file,
		                    date: date,
		                    action:"insert_order"
		                },
		                cache: false,
		                success: function(result){
		                    alert('Your Order Has Placed Succesfully');
		                    console.log(result);
		                    // alert(result);
		            }
		        });
		    });
       	});	

		$(document).ready(function(){
				$('#delete<?= $a; ?>').on('click', function() {
				var p_id = $('#p_ids<?= $a; ?>').val();
        		$.ajax({
		                url: "ajax.php",
		                type: "POST",
		                data: {
		                    prod_id: p_id,
		                    action:"delete_cart"
		                },
		                cache: false,
		                success: function(result){
		                    alert('deleted');
		                    console.log(result);
		                     alert(result);
		            }
		        });
		    });
       	});	
</script>


	<?php $a++; } ?>

</div>
<!-- <p class="text-center"><?php echo Date("d-m-Y h:i:s A",time()); ?></p> -->
</body>
</html>




		
				