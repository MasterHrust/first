<?php
echo '<html>
<head>
<meta charset="utf-8">
<title>Внесение данных</title>
</head>
<body>
<a href="index.php">На Главную?</a>
<a href="report.php">Назад?</a>
</body>
</html>';
require_once 'connection.php'; // подключаем скрипт
 //запрос к БД
        //$result = mysqli_fetch_array($sql);
$link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));
$sql = mysqli_query($link, "SELECT id,number FROM ogne ORDER BY id");
?>
<script>
function forma()
{form_hid.style.display="block";}
</script>

<table>
<form action="">
    <tr>
        <td>Выбрать номер:</td>
        <td><select name="vibor" onclick="javascript:document.getElementById('number').value = this.value;">
        	<option value=""></option>
        	<?php while($object = mysqli_fetch_array($sql)):
        	echo "<option value =' ".$object['id']." '>".$object['number']."</option>";
        	 endwhile;?>
        </select>
        </td>
    </tr>
    <tr>
        <td><input type="button" value="Внести?" onClick="forma()"></td>
    </tr>
</form>
</table>


<form method="POST" name="myForma" id='form_hid' style='display:none;'>
<h2>Внесение данных</h2>
<input type="text" id="number" name="number" id="id_div" style='display:none;'/>
<p>Дата:<br>
<input type="date" name="date" value="<?=date('Y-m-d');?>" /></p>
<p>Вид тех. обслуживания:<br>
<select name="vid">
	<option value="Ежеквартальное">Ежеквартальное</option>
	<option value="Первоначальное">Первоначальное</option>
	<option value="Годовое">Годовое</option>
</select></p>
<p>Состояние узлов:<br>
<select name="vn_vid">
	<option value="Без замечаний">Без замечаний</option>
	<option value="Замечания">Замечания</option>
</select></p>
<p>Полная масса:<br>
<input type="text" name="weight" /></p>
<p>Давление:<br>
<input type="text" name="power" /></p>
<p>Состояние:<br>
<select name="sost">
	<option value="Удовлетворительное">Удовлетворительное</option>
	<option value="Неудовлетворительное">Неудовлетворительное</option>
</select></p>
<p>Принятые меры:<br>
<input type="text" name="meri" /></p>
<p>ФИО:<br>
<input type="text" name="fio" /></p>
<input type="submit" value="Внести!">
</form>
<?php

if(isset($_POST['number'],$_POST['date'],$_POST['vid'],$_POST['vn_vid'],$_POST['weight'],$_POST['power'],$_POST['sost'],$_POST['meri'],$_POST['fio']))
{


    $ob = htmlentities(mysqli_real_escape_string($link, $_POST['number']));

    $date = htmlentities(mysqli_real_escape_string($link, $_POST['date']));
    $vid = htmlentities(mysqli_real_escape_string($link, $_POST['vid']));
    $vn_vid = htmlentities(mysqli_real_escape_string($link, $_POST['vn_vid']));
    $weight = htmlentities(mysqli_real_escape_string($link, $_POST['weight']));
    $power = htmlentities(mysqli_real_escape_string($link, $_POST['power']));
    $sost = htmlentities(mysqli_real_escape_string($link, $_POST['sost']));
    $meri = htmlentities(mysqli_real_escape_string($link, $_POST['meri']));
    $fio = htmlentities(mysqli_real_escape_string($link, $_POST['fio']));

$query = "INSERT INTO kvart(ogne_id,date,vid,vn_vid,weight,power,sost,meri,fio) VALUES((SELECT id FROM ogne WHERE `id` = '$ob'),'$date','$vid','$vn_vid','$weight','$power','$sost','$meri','$fio')";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result)
    {
        echo "<br><span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
}
?>
</body>
</html>
