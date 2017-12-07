<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
<a href="admin.php">Админ</a>
<a href="list.php">Список </a>
    
<form method="post" action="test.php">
<?php
if (!empty($_GET['test'])) 
{
	$file_dir = "tests/";
	$test_name = $_GET['test'];
	$test = file_get_contents($file_dir . $test_name . '.json');
	$test = json_decode($test, true);
	foreach($test as $qnumber => $qobj)
	{
	    if (isset($qnumber) && isset($qobj['answers']) && isset($qobj['question'])) 
	    {
		    echo $qobj['question'] . '<br>';
		    foreach ($qobj['answers'] as $key => $answer) 
		    {
		        echo '<input type="radio" name="a' . $qnumber . '" value="' . $key . '"> ';
		        echo $answer . "<br>";
	    	}
		}
	else 
	{
	    echo 'недопустимое содержание теста';
	    exit;
	}
	}
echo '<input type="hidden" name="test" value="' . $test_name . '">';
echo '<input type="submit" value="Отправить">';
}
?>
</form>
</body>
</html>

<?php
$true = 0;
$false = 0;
if (!empty($_POST)) 
{
	$file_dir = "tests/";
	$test_name = $_POST['test'];
	$test = file_get_contents($file_dir . $test_name . '.json');
	$test = json_decode($test, true); 
	    foreach($test as $qnumber => $qobj)
		{ 
	    	if (isset($qnumber) && isset($_POST['a' . $qnumber])) 
	    	{
	    		if( $qobj['corrected'] == $_POST['a' . $qnumber] ) 
	    		{
	        		$true++; 
	    		} 
	    		else 
	    		{
	       			$false++;
				}
			} else 
			{
	    		echo "Вы не ответили на все вопросы";
	    		exit;
			}
		}
	echo 'Правильно: ' . $true . '<br>';
	echo 'Неправильно: ' . $false . '<br>';
}
?>