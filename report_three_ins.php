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
<p>Результаты осмотра:<br>
<select name="rez1">
  <option value="Соответствует">Соответствует</option>
  <option value="Несоответсвует">Несоответсвует</option>
</select></p>
<p>Марка заряженного ОТВ:<br>
<input type="text" name="mark"></p>
<p>Результат осмотра:<br>
<select name="rez3">
    <option value="Замечания">Замечания</option>
    <option value="Без замечаний">Без замечаний</option>
</select></p>
<p>ФИО:<br>
<input type="text" name="fio3" /></p>
<input type="submit" value="Внести!">
</form>
<?php
if(isset($_POST['number']))
{


    $ob = htmlentities(mysqli_real_escape_string($link, $_POST['number']));
    $rez1 = htmlentities(mysqli_real_escape_string($link, $_POST['rez1']));
    $mark = htmlentities(mysqli_real_escape_string($link, $_POST['mark']));
    $rez3 = htmlentities(mysqli_real_escape_string($link, $_POST['rez3']));
    $fio3 = htmlentities(mysqli_real_escape_string($link, $_POST['fio3']));
$sq=mysqli_query($link,"SET GLOBAL sql_mode=''");    
$query = "INSERT INTO pere(ogne_id,date_isp,rez1,next_plan,date_pere,mark,rez3,next_date,fio3)
select ogne_id,max(recharge),'$rez1',ADDDATE(max(recharge), INTERVAL 5 YEAR),max(recharge),'$mark','$rez3',ADDDATE(max(recharge), INTERVAL 5 YEAR),'$fio3'from to_one WHERE ogne_id = '$ob'";


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
