<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<a href="index.php">На Главную?</a>
<a href="view.php">Просмотреть все ОГ?</a>	
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['number'],$_POST['date'],$_POST['place'],$_POST['type'],$_POST['izg'],$_POST['number_zav'],$_POST['date_izg'],$_POST['model']))
{
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $number = htmlentities(mysqli_real_escape_string($link, $_POST['number']));
    $date = htmlentities(mysqli_real_escape_string($link, $_POST['date']));
    $place = htmlentities(mysqli_real_escape_string($link, $_POST['place']));
    $type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
    $izg = htmlentities(mysqli_real_escape_string($link, $_POST['izg']));
    $number_zav = htmlentities(mysqli_real_escape_string($link, $_POST['number_zav']));
    $date_izg = htmlentities(mysqli_real_escape_string($link, $_POST['date_izg']));
    $model = htmlentities(mysqli_real_escape_string($link, $_POST['model'])); 
    // создание строки запроса
    $query = "INSERT INTO ogne VALUES(NULL, '$number','$date','$place','$type','$izg','$number_zav','$date_izg','$model')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<br><span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>
<h2>Добавить новую модель</h2>
<form method="POST">
<p>Номер присвоенный огнетушителю:<br> 
<input type="text" name="number" /></p>
<p>Дата введения огнетушителя в эксплуатацию:<br> 
<input type="date" name="date" /></p>
<p>Место установки огнетушителя:<br> 
<input type="text" name="place" /></p>
<p>Тип и марка огнетушителя:<br> 
<input type="text" name="type" /></p>
<p>Завод-изготовитель огнетушителя:<br> 
<input type="text" name="izg" /></p>
<p>Заводской номер:<br> 
<input type="text" name="number_zav" /></p>
<p>Дата изготовления огнетушителя:<br> 
<input type="date" name="date_izg" /></p>
<p>Марка (концентрация) заряженного ОТВ:<br> 
<input type="text" name="model" /></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>