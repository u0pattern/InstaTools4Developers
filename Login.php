<form action="" method="post">
<center>
$~ Dev By <font color="red">You</font> :)<br>
<font color="red"> Username :<input type="text" name="username"></font><br><br>
<font color="red"> Password :<input type="text" name="password"></font><br><br>
<input type="submit" name="submit" value="Login">
</center>
</form>
<?
$username = $_POST['username'];
$password = $_POST['password'];
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/accounts/login/ajax/"); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.instagram.com',
    'X-CSRFToken: EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I',
    'X-Instagram-AJAX: 1',
    'X-Requested-With: XMLHttpRequest',
    'Referer: https://www.instagram.com/',
    'Cookie: csrftoken=EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I;'
    ));
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$username&password=$password");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$check = curl_exec($ch);
if(eregi("true", $check))
	{
		echo "<center>Logged -> $username:$password </center>";
	}
	else
	{
		if(eregi("checkpoint", $check))
		{
			echo "<center>Logged But CheckPoint :( -> $username:$password </center>";
		}
		else
		{
			if(eregi("Please wait a few minutes before you try again.", $check))
			{
				echo "<center> Use Proxy </center>";
			}
			else
			{
				echo "<center> Failed -> $username:$password </center>";
			}
		}
	}
curl_close($ch);