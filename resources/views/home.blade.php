<?php
$email ='younes.aitouahda@gmail.com';
$to = 'marocyounes12@example.com';
		$subject = 'New Contact Form Submission';
		$body = "Name:\n me  Email:\n theone@gmail.com \nMessage:\n yes";
		$headers = "From: $email";

		if(mail($to, $subject, $body, $headers))
			echo '<p>Your message has been sent. Thank you!</p>';
?>