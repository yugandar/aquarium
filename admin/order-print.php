<?php include("inc/config.php") ;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
<style>
	
 
	body,textarea{font-family: arial !important}
</style>
</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		<?php
	$get=$_GET['id'];

       $statement = $pdo->prepare("SELECT tbl_payment.id, tbl_customer.cust_name,tbl_customer.cust_address,tbl_customer.cust_phone,tbl_customer.cust_city,tbl_customer.cust_state FROM tbl_payment INNER JOIN tbl_customer ON tbl_payment.customer_id=tbl_customer.cust_id WHERE tbl_payment.id =".$_GET['id']);
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
            	foreach ($result as $row) {

				
?>
		<label>Name:</label><?php echo $row['cust_name'];?><br>
		<label>Address:</label><?php echo $row['cust_address'];?><br>
		<label>Phone No:</label><?php echo $row['cust_phone'];?><br>
		<label>City:</label><?php echo $row['cust_city'];?><br>
		<label>State:</label><?php echo $row['cust_state'];?>

			
				<?php } ?>
            
             <img id="image" src="logo.png" alt="logo" style="
    height: 94px;
    text-align: right;
    /* margin: 0 0 0; */
    float: right;
">
           
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

<?php

       $statement = $pdo->prepare("SELECT * FROM tbl_payment where id=".$_GET['id']);
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
            	foreach ($result as $row) {

?>

    <h4><?php echo $row['customer_name']; ?></h4>

            <table id="meta">
                <tr>
                    <td class="meta-head">Bill no #</td>
                    <td><?php echo $row['customer_id']; ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><?php echo $row['payment_date']; ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"><?php echo $row['paid_amount']; ?></div></td>
                </tr>

            </table>
		<?php	}?>
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  <?php
                           $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
                           $statement1->execute(array($row['payment_id']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($result1 as $row1) {
                                
                           
                           ?>
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><?php echo $row1['product_name']; ?>
		      <td class="description"><?php echo $row1['size']; ?></td>
		      <td><?php echo $row1['unit_price']; ?></td>
		      <td><?php echo $row1['quantity']; ?></td>
		      <td><span class="price"><?php echo $row1['unit_price']; ?></span></td>
		  </tr>
		  <?php                           }
                           ?>
		  
		  
		  
		  <tr style="border-top:1px solid">
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php echo $row['paid_amount']; ?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total"><?php echo $row['paid_amount']; ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid"></textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"><?php echo $row['paid_amount']; ?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>Waranty is not applicable for any physical Damages & Electrical burns</textarea>
		</div>
	
	</div>
	
</body>

</html>