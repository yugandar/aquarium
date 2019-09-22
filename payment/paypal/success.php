<!DOCTYPE html>
<html>
<head>
<title>MakersBox</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12 text-center" style="padding-top: 200px">
              
<?php
include("../../admin/inc/config.php");
include("../../admin/inc/functions.php");
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="e5iIg1jwi8";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
  else {    

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
     $hash = hash("sha512", $retHashSeq);
     
       if ($hash != $posted_hash) {
          echo "<img style='margin:auto !important; padding:0px !important; width:100px !important' src='https://cdn.dribbble.com/users/936407/screenshots/2536049/load.gif' />";
         echo "<h3 style='color:red'>Invalid Transaction. Please try again</h3>";
         $statement = $pdo->prepare("DELETE FROM tbl_payment WHERE txnid=?");
         $sql = $statement->execute(array($_POST['txnid']));
       }
     else {


          echo "<img style='margin:auto !important; padding:0px !important; width:100px !important' src='https://leiguskjol-production.s3.amazonaws.com/icons/success-icon.gif' class='img-responsive' />";

          echo "<h3 style='color:green'>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4 style='color:green'>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4 style='color:green'>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
           $statement = $pdo->prepare("UPDATE tbl_payment SET 
                        payment_status=?
                        WHERE txnid=?");
         $sql = $statement->execute(array(
                        'Completed',
                         $txnid

                    ));
         header('Refresh: 30; URL=https://aquariumcraze.com/payment_success.php');



           
       }         
?>

            </div>
        </div>
    </div>
</div>


</html>