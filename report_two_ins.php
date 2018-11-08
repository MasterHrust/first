<?php
echo '<html>
<head>
<meta charset="utf-8">
<title>Внесение данных</title>
<script type="text/javascript">
  function showOrHide(cb, cat) {
    cb = document.getElementById(cb);
    cat = document.getElementById(cat);
    if (cb.checked) cat.style.display = "block";
    else cat.style.display = "none";
  }
</script>
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
//$sql2 = mysqli_query($link, "SELECT date FROM kvart");
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
<?php
//if ($object2 = mysqli_fetch_array($sql2)){
//echo "<input type='date' name='check_date_o' value='".$object2['date']."' disabled/></p>";} ?>
<p>Проверка узлов огнетушителя:<br>
<select name="check_o">
	<option value="Замечания">Замечания</option>
	<option value="Без замечаний">Без замечаний</option>
</select></p>
<p>Проверка качества ОТВ:<br>
<select name="check_otv">
	<option value="Соответствует">Соответствует</option>
	<option value="Несоответсвует">Несоответсвует</option>
</select></p>
<p>Проверка индикатора:<br>
<select name="check_ind">
    <option value="Соответствует">Соответствует</option>
    <option value="Несоответсвует">Несоответсвует</option>
</select></p>
<p>Перезарядка огнетушителя:<br>
  <input type="date" name="recharge" value="" /></p>
  
<p>Испытания узлов:<br>
<select name="test">
    <option value="Соответствует">Соответствует</option>
    <option value="Несоответсвует">Несоответсвует</option>
</select></p>
<p>Замечания:<br>
<input type="text" name="zam2" /></p>
<p>Принятые меры:<br>
<input type="text" name="meri2" /></p>
<p>ФИО:<br>
<input type="text" name="fio2" /></p>
<input type="submit" value="Внести!">
</form>
<?php
if(isset($_POST['number']))
{


    $ob = htmlentities(mysqli_real_escape_string($link, $_POST['number']));
    $checko = htmlentities(mysqli_real_escape_string($link, $_POST['check_o']));
    $checkdate = htmlentities(mysqli_real_escape_string($link, $_POST['check_date_o']));
    $check_otv_date = $check_date_ind = $test_date = $checkdate;
    $check_otv = htmlentities(mysqli_real_escape_string($link, $_POST['check_otv']));
    $check_ind = htmlentities(mysqli_real_escape_string($link, $_POST['check_ind']));
    $recharge = htmlentities(mysqli_real_escape_string($link, $_POST['recharge']));
    $test = htmlentities(mysqli_real_escape_string($link, $_POST['test']));
    $zam2 = htmlentities(mysqli_real_escape_string($link, $_POST['zam2']));
    $meri2 = htmlentities(mysqli_real_escape_string($link, $_POST['meri2']));
    $fio2 = htmlentities(mysqli_real_escape_string($link, $_POST['fio2']));

if(empty($_POST['recharge'])){ 

$recharge = "0000-00-00";
    
}else{ 
    $recharge = $_POST['recharge']; 
} 
$query = "INSERT INTO to_one(ogne_id,check_o,check_date_o,check_otv,check_date_otv,check_ind,check_date_ind,recharge,test,test_date,zam2,meri2,fio2) VALUES((SELECT id FROM ogne WHERE `id` = '$ob'),'$checko',(SELECT max(date) FROM kvart WHERE `ogne_id` = '$ob'),'$check_otv',(SELECT max(date) FROM kvart WHERE `ogne_id` = '$ob'),'$check_ind',(SELECT max(date) FROM kvart WHERE `ogne_id` = '$ob'),'$recharge','$test',(SELECT max(date) FROM kvart WHERE `ogne_id` = '$ob'),'$zam2','$meri2','$fio2')";

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
