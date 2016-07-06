<?php
# Include the Autoloader (see "Libraries" for install instructions)
require 'Mailgun/vendor/autoload.php';
use Mailgun\Mailgun;

include 'mailgun-settings.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Update in version 1.1 - added validation to stop blank emails
if ($email){
    # Instantiate the client.
    $mgClient = new Mailgun($mailgunKey);
    $domain = $mailgunDomain;

    # Make the call to the client.
    $result = $mgClient->sendMessage("$domain",
                      array('from'    => "Website <postmaster@$mailgunDomain>",
                            'to'      => $yourEmail,
                            'subject' => 'Message from Website',
                            'html'    => 'Hello,<br><br>'.$name.' -'.$email.' sent you following message from website footer.:<br>'.$message));


    $result = $mgClient->sendMessage("$domain",
                      array('from'    => "$fromName <postmaster@$mailgunDomain>",
                            'to'      => $email,
                            'subject' => $subject,
                            'html'    => "Hello $name,<br><br>".$thankYouMsg));
}
