<!DOCTYPE html>
<html>

<head></head>

<body>
<h1>Reset your password</h1>
<p>You will receive an email with the instructions for resetting your password</p>


<form action="../processes/update_password.php" method="POST">
    <label for="email">Email</label>
    <input type="text" name="email">
    <input type="submit" name="update_password" value="Get email">
</form>

</body>

</html>