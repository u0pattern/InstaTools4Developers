<form action="" method="post">
<center>
<font color="red">
Username : <input type="text" name="username"><br><br>
Password : <input type="text" name="password"><br><br>
Email : <input type="text" name="email"><br><br>
Name : <input type="text" name="name"><br><br>
</font>
<br><br>
<input type="submit" name="submit" value="instagramecking">
</center>
</form>
<?
$username = $_POST['username'];
$password = $_POST['username'];
$email = $_POST['username'];
$name = $_POST['username'];
$instagram = curl_init(); 
curl_setopt($instagram, CURLOPT_URL, "https://www.instagram.com/accounts/web_create_ajax/"); 
curl_setopt($instagram, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($instagram, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($instagram, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($instagram, CURLOPT_HTTPHEADER, array(
	'Host: www.instagram.com',
	'X-CSRFToken: EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I',
	'X-Instagram-AJAX: 1',
	'X-Requested-With: XMLHttpRequest',
	'Referer: https://www.instagram.com/',
	'Cookie: csrftoken=EJMrAsTOEi1SKiZLHzNf2RMBEZTQkI9I;'
));
curl_setopt($instagram, CURLOPT_POSTFIELDS, "email=$email&password=$password&username=$username&first_name=$name");
curl_setopt($instagram, CURLOPT_HEADER, 1);
curl_setopt($instagram, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
echo $response = curl_exec($instagram);
?>
