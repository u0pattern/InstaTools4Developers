<form action="" method="post">
<center>
$~ Dev By <font color="red">You</font> :)<br>
<font color="red"> Username :<textarea cols="10" rows="6" type="text" name="usernames"></textarea></font><br><br>
<input type="submit" name="submit" value="Checking">
</center>
</form>
<?
$users = explode("\r\n", $_POST['usernames']);
foreach($users as $username)
{
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/accounts/web_create_ajax/"); 
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
	curl_setopt($ch, CURLOPT_POSTFIELDS, "email=a@hotmail.com&password=1234&username=$username&first_name=aaa");
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	$check = curl_exec($ch);
	if(eregi("Sorry, that username is taken.", $check))
		{
			echo "<center><font color='red'> Taken -> $username </font></center>";
		}
		else
		{
			if(eregi("Your username cannot contain only numbers.", $check))
				{
					echo "<center><font color='blue'> Your username cannot contain only numbers :( -> $username </font></center>";
				}
				else
				{
					if(eregi("A user with that username already exists.", $check))
						{
							echo "<center><font color='black' Blocked -> $username </font></center>";
						}
						else
						{
							echo "<center><font color='green' Available -> $username </font></center>";
						}
				}
		}
}