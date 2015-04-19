<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title?></title>
</head>
<body>
	<form action="<?= base_url()?>admin/autherize" method="post">
		Username : <input type="text" name="username"><br>
		Password : <input type="password" name="password"><br>
		<input type="submit" value="送出">
	</form>
</body>
</html>