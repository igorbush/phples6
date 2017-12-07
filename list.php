<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>test</title>
</head>
<body>

<a class="main" href="admin.php">Админ</a>

<?php
$file_dir = "tests/";
if ($file_dir = opendir($file_dir)) 
{
    while (false !== ($entry = readdir($file_dir))) 
    {
        if ($entry != "." && $entry != "..") 
        {
        	$test_name = explode('.',$entry)[0];
?>
<a href="test.php?test=<?=$test_name?>"><?= $test_name ?></a>
<?php
        }
    }
    closedir($file_dir);
}
?>


</body>
</html>