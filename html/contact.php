<?php session_start(); ?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meubilair</title>
    <link rel="stylesheet" href="../css/contact.css">
    <script defer src="https://kit.fontawesome.com/6cf6e5ecb9.js" crossorigin="anonymous"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" defer src="../js/contact.js" ></script>
    <noscript><p>Please enable JavaScript in your browser for better use of the website.</p></noscript>
</head>

<body>
<?php 
include('menus.php');
include_once('../processes/userQueries.php');

$FullName = $Email = "";
if(isset($_SESSION['email']))
{
    $result = UserQueries::GetUserDetails($_SESSION['email']);
    $FullName = $result['first_name'] . " " . $result['last_name'];
    $Email = $result['email'];
}
?>



<div class="grid-container">
    <div class="left">
        <p>Address: <i>Polanenweg 23, 5616 EH Eindhoven</i> </p>
        <p>Telephone: +31756756756</p>
        <p>Email: contact@meubilair.nl</p>
        <p>Website:<a>www.meubilair.com</a></p>

        <p><b>Banking details</b></p>
        <p>IBAN: NL89 RABO 4346 8345 44</p>
        <p>Derdelegelden Meubilair BV</p>

    </div>

    <div class="right">
        <h2>Contact us</h2>
        <form id="f-contact" method="POST" action="../processes/contact.php">
            <label for="name">Full name</label>
            <p><input type="text" id="name" name="name" value="<?php echo "$FullName"; ?>" placeholder="Full name..">
            </p>

            <label for="email">Email</label>
            <p><input type="text" id="email" name="email" value="<?php echo "$Email"; ?>" autocapitalize="off" autocorrect="off" placeholder="Email..">
            </p>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write something.."></textarea>

            <button id="send_mail" name = "send_mail" type="submit">Send</button>
            <p class="form-message"></p>
        </form> 
    </div>
</div>
</body>
</html>