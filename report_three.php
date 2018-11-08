<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<a href="index.php">На Главную?</a>
<a href="report.php">Назад?</a>
<?php
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));
$sql1 = mysqli_query($link, "SELECT id,number FROM ogne ORDER BY id");
?>

<table>
<tr>
	<a href="report_three_go_all.php">Общий отчет</a>
</tr>
<form action="report_three_go.php">
    <tr>
        <td>Выбрать номер для отчета:</td>
        <td><select name="vibor" onclick="javascript:document.getElementById('id').value = this.value;">
          <option value=""></option>
          <?php

          while($object = mysqli_fetch_array($sql1)):
          echo "<option value =' ".$object['id']." '>".$object['number']."</option>";
           endwhile;?>
        </select>
        </td>
        <input type='text' id='id' name='id' id='id_div' style='display:none;' />
    </tr>
    <tr>
        <td><input type="submit" value="Сформировать?""></td>
    </tr>
</form>
</table>
</body>
</html>
