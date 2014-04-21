<?php
//Source: Documentation from Stripe.com
require 'stripe/stripe-php/lib/Stripe.php';

if ($_POST) {
  Stripe::setApiKey("1mqmb3ctftL9Lvm27iAaRG9ycc0UfNtX");
  $error = '';
  $success = '';
  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");

    $amount = (int) ($_POST['amount'] * 100);
    
    if($amount == 1000)
    	$item = "an AADT T-shirt";
    else if($amount == 2500)
    	$item = "AADT Sweatpants";
    else if($amount == 2000)
    	$item = "an AADT Sweatshirt";
    else if($amount == 1500)
    	$item = "a pair of AADT Yoga Pants";
    	
    Stripe_Charge::create(array("amount" => $amount,
                                "currency" => "usd",
                                "card" => $_POST['stripeToken'],
                                "description" => htmlspecialchars($_POST['name']) . " purchased " . $item));
    $success = 'Your payment was successful.';
    
    // send mail to person
    $to = htmlspecialchars($_POST['email']);
		$subject = "AADT - Thank you for your purchase!";
		$message = "Dear " . htmlspecialchars($_POST['name']) .
							 ",\n \n You purchased " . $item .
							 " for " . "$" . htmlspecialchars($_POST['amount']) . ".\n\n Best, \n AADT";
		$headers = 'From: hoang@college.harvard.edu' . "\r\n";
		$headers .= 'Bcc: graceqi92@gmail.com';
		mail($to, $subject, $message, $headers);
    
  }
  catch (Exception $e) {
    $error = $e->getMessage();
	$success = '';
  }
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>    
  	<link href="styles.css" rel="stylesheet" type="text/css">
    <title>AADT: Harvard Asian-American Dance Troupe</title>
		<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js"></script>
		<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
		<script type="text/javascript">

				// this identifies your website in the createToken call below
				Stripe.setPublishableKey('pk_8pAie11uLxnFsaHCPVB6rX4loKXGN');

				function stripeResponseHandler(status, response) {
						if (response.error) {
								// re-enable the submit button
								$('.submit-button').removeAttr("disabled");
								// show the errors on the form
								$(".payment-errors").html(response.error.message);
						} else {
								var form$ = $("#payment-form");
								// token contains id, last4, and card type
								var token = response['id'];
								// insert the token into the form so it gets submitted to the server
								form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
								// and submit
								form$.get(0).submit();
						}
				}

				$(document).ready(function() {
						$("#payment-form").submit(function(event) {
								// disable the submit button to prevent repeated clicks
								$('.submit-button').attr("disabled", "disabled");
								var chargeAmount = parseFloat($('.payment-amount').val())*100; //amount you want to charge, in cents. e.g.: 1000 = $10.00
								// createToken returns immediately - the supplied callback submits the form if there are no errors
								Stripe.createToken({
										name: $('.person-name').val(),
										number: $('.card-number').val(),
										cvc: $('.card-cvc').val(),
										exp_month: $('.card-expiry-month').val(),
										exp_year: $('.card-expiry-year').val()
								}, chargeAmount, stripeResponseHandler);
								return false; // submit from callback
						});
				});
		</script>
  </head>
  <body id="store">
		<div id="wrapper">
			<? include("nav.php"); ?>
    	<div class="center" id="transparent">
    	</div>
    	<div class="center">
        <h1>Buy AADT Gear!</h1>
        <span class="payment-errors"><?= $error ?></span>
        <span class="payment-success"><?= $success ?></span>
        <table>
        <form action="" method="POST" id="payment-form">
            <tr><div class="form-row">
                <td><label for="name" class="stripeLabel">Name</label></td>
                <td><input type="text" name="name" autocomplete="off" class="person-name" /></td>
            </div></tr>
            <tr><div class="form-row">
                <td><label>E-Mail</label></td>
                <td><input type="text" name="email" autocomplete="off" class="person-email" /></td>
            </div></tr>
            <tr><div class="form-row">
                <td><label>Card Number</label></td>
                <td><input type="text" size="20" autocomplete="off" class="card-number" /></td>
            </div></tr>
            <tr><div class="form-row">
                <td><label>CVC</label></td>
                <td><input type="text" size="4" autocomplete="off" class="card-cvc" /></td>
            </div></tr>
            <tr><div class="form-row">
                <td><label>Expiration (MM/YYYY)</label></td>
                <td><input type="text" size="2" class="card-expiry-month"/>
                <span> / </span>
                <input type="text" size="4" class="card-expiry-year"/></td>
            </div></tr>
            <div class="form-row">
                <tr><td>Item</td><td><input type="radio" name="amount" value="20.00" class="payment-amount"/>Sweatshirt - $20.00</td></tr>
								<tr><td></td><td><input type="radio" name="amount" value="10.00" class="payment-amount"/>T-Shirt - $10.00</td></tr>
								<tr><td></td><td><input type="radio" name="amount" value="25.00" class="payment-amount"/>Sweats - $25.00</td></tr>
								<tr><td></td><td><input type="radio" name="amount" value="15.00" class="payment-amount"/>Yoga Pants - $15.00</td></tr>
            </div>        
            <tr>
            <td></td>
            <td><button type="submit" class="submit-button">Submit Payment</button></td>
            </tr>
        </form>
        </table>
			</div>
		</div>
    <? include("footer.php"); ?>
  </body>
</html>