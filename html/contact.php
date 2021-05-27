<?php session_start(); ?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/contact.css">
    <script src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- START Top page -->
<?php include('menus.php')?>
<!-- END Top page -->


<div class="grid-container">
    <div class="left">
        <p>Address: <i>Polanenweg 23, 5616 EH Eindhoven</i> </p>
        <p>Telephone: +31756756756</p>
        <p>Email: contact@meubilair.nl</p>
        <p>Website:<a>www.meubilair.com</a></p>

        <p><b>Banking details</b></p>
        <p>IBAN: NL89 RABO 4346 8345 44</p>
        <p>Derdelegelden Meubilair BV</p>
        <p>BIC: RABONL2U</p>

    </div>

    <div class="right">
        <h2>Contact us</h2>
        <form id="f-contact" method="POST" action="../processes/send_email.php">
        
            <label for="name">Full name</label>
            <p><input type="text" id="name" name="name" value="">
            </p>

            <label for="email">Email</label>
            <p><input type="text" id="email" name="email" value="" autocapitalize="off" autocorrect="off">
            </p>
        
            <!--
                <label for="phone-nr">Phone number</label>
            <p><input type="text" name="contact" value=""></p>
             -->
            

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write something.."></textarea>

            <button id="send-mail" name = "send-mail" type="submit">Send</button>
        </form> 
    </div>
</div>
</body>

</html>