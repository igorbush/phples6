<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>test</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="admin.php">
<input type="file" name="uploaded_file">
	<input type="submit" value="Загрузить">
</form>


<?php
	$file_dir = "tests/";
	if(isset($_FILES['uploaded_file']['name']) && !empty($_FILES['uploaded_file']['name']))
	{
		$filename = htmlspecialchars($_FILES['uploaded_file']['name']);
		$target_file = $file_dir . basename($_FILES['uploaded_file']['name']);
		$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
		if($file_type != "json") 
		{
		    echo "Ошибка: файл НЕ загружен! Файл должен быть типа .json<br>";
		    exit;
	    }
		if($_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file))
		{
			echo "Файл загружен" . "<br>";
		}
		else
		{
			echo "Файл НЕ загружен" . "<br>";
		}
		
	}
?>
<a href="list.php">Список тестов</a><br>

	
</body>
</html>