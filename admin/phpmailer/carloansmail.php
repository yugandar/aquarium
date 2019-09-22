<?php
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
if($_POST['submit'])
{
                               
								
										
								$txtApName=$_POST['name'];
										$txtApAddress=$_POST['address'];
										$txtApState=$_POST['state'];
										$txtApCity=$_POST['city'];
										$txtApPin=$_POST['pin'];
										$txtApMobile=$_POST['phone'];
										$txtApEmail=$_POST['email'];
										
										$txtAppanno=$_POST['ac'];
										$dobDD=$_POST['date'];
										$dobMM=$_POST['month'];
										$dobYY=$_POST['year'];
										$cost_car=$_POST['vechilecost'];
										$loan_amt=$_POST['amtrequired'];
										 $mss="Application for Car Loan"; 
								
										$message = "<html><body><table>



                                       <tr><td>&nbsp;</td><td><strong><u>".$mss."</u></strong></td></tr>
													
                                          <tr><td>Full name of first/sole applicant:</td><td>".$txtApName."</td></tr>
													 <tr><td>Address:</td><td>".$txtApAddress."</td></tr>
													 <tr><td>State:</td><td>".$txtApState."</td></tr>
													  <tr><td>City:</td><td>".$txtApCity."</td></tr>
													 <tr><td>Pin:</td><td>".$txtApPin."</td></tr>
													   <tr><td>Mobile:</td><td>".$txtApMobile."</td></tr>
													  <tr><td>Email:</td><td>".$txtApEmail."</td></tr>
													   <tr><td>PAN NO:</td><td>".$txtAppanno."</td></tr>
													  <tr><td>Date of Birth:</td><td>".$dobDD."/".$dobMM."/".$dobYY."</td></tr>
													 
													 <tr><td>Cost of vehicle (on road price):</td><td>".$cost_car."</td></tr>
													 <tr><td>Loan amt. required:</td><td>".$loan_amt."</td></tr>
													
													 </table></body></html>";
										
									

   // we'll begin by assigning the To address and message subject
$mail = new PHPMailer(); // create a new object

$mail->isSendmail();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "phani@brihaspathi.com";
$mail->Password = "lucky477";
$mail->SetFrom("cmcr.apgvb@gmail.com");
$mail->Subject ="Enquiry";
$mail->Body = $message;

$mail->AddAddress("cmcr.apgvb@gmail.com");//email sent to this address
$mail->addCC("admin@apgvbank.in");//cc email sent to this address
	$mail->addBCC("nagendra@brihaspathi.com");//bcc email sent to this address

 if(!$mail->Send()) {
    echo "Mailer Error: ";
 } else {
    echo "Message sent";
 }
}
?>
		<script type="text/javascript">
					alert("Thankyou for Contacting us...we will get back you soon.....");
											
			                </script>
                                        
                                        
							<script language="javascript"> location.href="index.php"; </script>
  