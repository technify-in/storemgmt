<link rel='stylesheet' id='fancybox-css'  href='style.css' type='text/css' media='screen' />
<?php
if (isset($_REQUEST['msg']) ){
//3.1.1 Assigning posted values to variables.
$msg = $_REQUEST['msg'];
echo $msg;

}
?>
<h1>Login</h1>
<form action="login.php" method="POST">
<p><label>User Name : </label>
<input id="username" type="text" name="username" placeholder="username" /></p>
<p><label>Password&nbsp;&nbsp; : </label>
<input id="password" type="password" name="password" placeholder="password" /></p>

<input class="btn register" type="submit" name="submit" value="Login" />
</form>
</div>
