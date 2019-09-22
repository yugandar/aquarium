<?php

include("../../admin/inc/config.php");
include("../../admin/inc/functions.php");
ob_start();
session_start();

// $MERCHANT_KEY = "ePbRIDPr";
// $SALT = "ce5ntpHVeM";
$return_url = 'https://aquariumcraze.com/payment/paypal/success.php';
$cancel_url = 'https://aquariumcraze.com/payment/paypal/failure.php';
$item_name = 'Product Item(s)';
$item_amount = $_POST['final_total'];
$item_number = time();
$payment_date = date('Y-m-d H:i:s');

$id = $_SESSION['customer']['cust_id'];
$name = $_SESSION['customer']['cust_name'];
$email = $_SESSION['customer']['cust_email'];
$mobile =$_SESSION['customer']['cust_phone'];
//$PAYU_BASE_URL = "https://test.payu.in"; // LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in"; // LIVE mode
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$posted = [
    'key' => $MERCHANT_KEY,
    'txnid' => $txnid ,
    'amount' => $item_amount,
    'productinfo' => $item_name,
    'firstname' => $name,
    'email' => $email,
    'phone' => $mobile,
    'surl' => $return_url,
    'furl' => $cancel_url,
    'service_provider' => 'payu_paisa', 
];

// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

$hashVarsSeq = explode('|', $hashSequence);
$hash_string = '';

foreach($hashVarsSeq as $hash_var) {
  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
  $hash_string .= '|';
}

$hash_string .= $SALT;
$posted['hash'] = $hash = strtolower(hash('sha512', $hash_string));

$action = $PAYU_BASE_URL . '/_payment';

$statement = $pdo->prepare("INSERT INTO tbl_payment (
	customer_id,
	customer_name,
	customer_email,
	payment_date,
	txnid, 
	paid_amount,
	card_number,
	card_cvv,
	card_month,
	card_year,
	bank_transaction_info,
	payment_method,
	payment_status,
	shipping_status,
	payment_id
	) 
	VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$sql = $statement->execute(array(
	$_SESSION['customer']['cust_id'],
	$_SESSION['customer']['cust_name'],
	$_SESSION['customer']['cust_email'],
	$payment_date,
	$txnid,
	$item_amount,
	'',
	'',
	'',
	'',
	'',
	'PayPal',
	'Pending',
	'Pending',
	$item_number
));

$i=0;
    foreach($_SESSION['cart_p_id'] as $key => $value) 
    {
        $i++;
        $arr_cart_p_id[$i] = $value;
    }

	$i=0;
    foreach($_SESSION['cart_p_name'] as $key => $value) 
    {
        $i++;
        $arr_cart_p_name[$i] = $value;
    }

    $i=0;
    foreach($_SESSION['cart_size_name'] as $key => $value) 
    {
        $i++;
        $arr_cart_size_name[$i] = $value;
    }

   	$i=0;
    foreach($_SESSION['cart_color_name'] as $key => $value) 
    {
        $i++;
        $arr_cart_color_name[$i] = $value;
    }

    $i=0;
    foreach($_SESSION['cart_p_qty'] as $key => $value) 
    {
        $i++;
        $arr_cart_p_qty[$i] = $value;
    }

    $i=0;
    foreach($_SESSION['cart_p_current_price'] as $key => $value) 
    {
        $i++;
        $arr_cart_p_current_price[$i] = $value;
    }


    $i=0;
    $statement = $pdo->prepare("SELECT * FROM tbl_product");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
    foreach ($result as $row) {
    	$i++;
    	$arr_p_id[$i] = $row['p_id'];
    	$arr_p_qty[$i] = $row['p_qty'];
    }


for($i=1;$i<=count($arr_cart_p_name);$i++) {
	$statement = $pdo->prepare("INSERT INTO tbl_order (
					product_id,
					product_name,
					size, 
					color,
					quantity, 
					unit_price, 
					payment_id
					) 
					VALUES (?,?,?,?,?,?,?)");
	$sql = $statement->execute(array(
					$arr_cart_p_id[$i],
					$arr_cart_p_name[$i],
					$arr_cart_size_name[$i],
					$arr_cart_color_name[$i],
					$arr_cart_p_qty[$i],
					$arr_cart_p_current_price[$i],
					$item_number
				));

	// Update the stock
	for($j=1;$j<=count($arr_p_id);$j++)
	{
		if($arr_p_id[$j] == $arr_cart_p_id[$i]) 
		{
			$current_qty = $arr_p_qty[$j];
			break;
		}
	}
	$final_quantity = $current_qty - $arr_cart_p_qty[$i];
	$statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
	$statement->execute(array($final_quantity,$arr_cart_p_id[$i]));

}


unset($_SESSION['cart_p_id']);
unset($_SESSION['cart_size_id']);
unset($_SESSION['cart_size_name']);
unset($_SESSION['cart_color_id']);
unset($_SESSION['cart_color_name']);
unset($_SESSION['cart_p_qty']);
unset($_SESSION['cart_p_current_price']);
unset($_SESSION['cart_p_name']);
unset($_SESSION['cart_p_featured_photo']);

?>
<html>
<head>
  <title>payment processs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
  <body>
  
	
	<div class="page">
    <div class="container">
	 
	<div class="row">
            <div class="col-md-offset-3 col-md-6">
			<img src="https://www.j2store.org/images/extensions/payment_plugins/payumoney.png" class="img-responsive" />
			</div>
			</div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6 thumbnail">
			
			<h3 class="text-center">Pay Your Amount</h3>
				
<table class="table table-responsive table-hover">
    
    <tbody>
      <tr>
        <td>Name</td>
        <td><?php echo $name ?></td>

      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $email ?></td>
        
      </tr>
      <tr>
        <td>Mobile</td>
        <td><?php echo $mobile ?></td>
        
      </tr>
	  <tr>
        <td>Amount</td>
               <td><?php echo $item_amount ?></td>

        
      </tr>
    </tbody>
  </table>
			<?php
    foreach ($posted as $key => $value){
    }
?>
			    <form action="<?php echo $action; ?>" method="post" name="payuForm">
        <input type="hidden" name="key"         value="<?php echo $posted["key"        ] ?>" />
        <input type="hidden" name="hash"        value="<?php echo $posted["hash"       ] ?>" />
        <input type="hidden" name="txnid"       value="<?php echo $posted["txnid"      ] ?>" />
        <input type="hidden" name="amount"      value="<?php echo $posted["amount"     ] ?>" />
        <input type="hidden" name="productinfo" value="<?php echo $posted["productinfo"] ?>" />
        <input type="hidden" name="firstname"   value="<?php echo $posted["firstname"  ] ?>" />
        <input type="hidden" name="email"       value="<?php echo $posted["email"      ] ?>" />
        <input type="hidden" name="phone"       value="<?php echo $posted["phone"      ] ?>" />
        <input type="hidden" name="surl"        value="<?php echo $posted["surl"       ] ?>" />
        <input type="hidden" name="furl"        value="<?php echo $posted["furl"       ] ?>" />

        <input type="hidden" name="service_provider" value="<?php echo $posted["service_provider"] ?>" />
        <input type="submit" class="btn btn-success pull-right" value="Pay" />
    </form>
			</div>
		 
			</div>
			</div>
			</div>


 

     
 

  </body>
</html>