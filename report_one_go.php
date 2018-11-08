<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" language="javascript"><!--
  function atoprint(aId) {
    var atext = document.getElementById(aId).innerHTML;
    var captext = window.document.title;
    var alink = window.document.location;
    var prwin = open('');
    prwin.document.open();
    prwin.document.writeln('<html><head><title>ПЕЧАТЬ??<\/title><\/head><body text="#000000" bgcolor="#FFFFFF"><div onselectstart="return false;" oncopy="return false;">');
    prwin.document.writeln('<div style="margin-bottom:5px;"><a href="javascript://" onclick="window.print();">Печать<\/a> • <a href="javascript://" onclick="window.close();">Закрыть окно<\/a><\/div><hr>');
    prwin.document.writeln('<h1>'+captext+'<\/h1>');
    prwin.document.writeln(atext);
    
    prwin.document.writeln('<div style="margin-top:5px;"><a href="javascript://" onclick="window.print();">Печать<\/a> • <a href="javascript://" onclick="window.close();">Закрыть окно<\/a><\/div>');
    prwin.document.writeln('<\/div><\/body><\/html>');
  }
  --></script>
</head>
<body>
<a href="index.php">На Главную?</a>
<a href="report_one.php">Назад?</a>
<a href="javascript://" onclick="atoprint('MessForPrint');">ПЕЧАТЬ??</a>
<?php
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link,'utf8');
?>

<?php
//$ob = htmlentities(mysqli_real_escape_string($link, $_GET['number']));
$var_value = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
//$var_value= $_GET['number_ob'];
$sql = mysqli_query($link,"SELECT ogne.number,DATE_FORMAT(kvart.date, '%d.%m.%Y') AS date,kvart.vid,kvart.vn_vid,kvart.weight,kvart.power,kvart.sost,kvart.meri,kvart.fio from kvart LEFT JOIN ogne on ogne.id=kvart.ogne_id WHERE kvart.ogne_id= '$var_value'");
$sql2 = mysqli_query($link,"SELECT number, DATE_FORMAT(date, '%d.%m.%Y') AS date, place, type, izg, number_zav, date_izg, model FROM ogne WHERE id = '$var_value'");
if ($result2 = mysqli_fetch_array($sql2)){
echo '<div id="MessForPrint"><p>
1. Номер, присвоенный огнетушителя: '.$result2['number'].'</br>
2. Дата введения огнетушителя в эксплуатацию: '.$result2['date'].'</br>
3. Место установки огнетушителя: '.$result2['place'].'</br>
4. Тип и марка огнетушителя: '.$result2['type'].'</br>
5. Завод-изготовитель огнетушителя: '.$result2['izg'].'</br>
6. Заводской номер:'.$result2['number_zav'].'</br>
7. Дата изготовления огнетушителя:'.$result2['date_izg'].'</br>
8. Марка (концентрация) заряженного ОТВ: '.$result2['model'].'
</p>';
}

echo "<div class=WordSection1>
<table>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:16.5pt'>
  <td width=113 rowspan=2 valign=top style='width:84.45pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>Дата и вид </p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>Проведенного</p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>технического </p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'>обслуживания</p>
  </td>
  <td width=814 colspan=7 valign=top style='width:610.3pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Результаты технического обслуживания огнетушителя</p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:36.75pt'>
  <td width=130 colspan=2 valign=top style='width:97.85pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:36.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Внешний вид и состояние узлов огнетушителя</p>
  </td>
  <td width=101 valign=top style='width:75.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:36.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Полная масса огнетушителя</p>
  </td>
  <td width=119 valign=top style='width:89.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:36.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Давление (при наличии индикатора <span
  class=GramE>давления)*</span> или масса газового баллона**</p>
  </td>
  <td width=114 valign=top style='width:85.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:36.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Состояние ходовой части передвижного огнетушителя</p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:36.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Принятые меры по устранению отмеченных недостатков</p>
  </td>
  <td width=227 valign=top style='width:170.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:36.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Должность, фамилия, инициалы и подпись ответственного лица</p>
  </td>
 </tr>";
 while ($result = mysqli_fetch_array($sql))
 	{
 	 echo
 	 '<tr style="mso-yfti-irow:2;mso-yfti-lastrow:yes;height:3.5pt">
  <td width=113 valign=top style="width:84.45pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"<o:p>'.$result['date'].' / '.$result['vid'].' </o:p></p>
  </td>
  <td width=130 valign=top style="width:97.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['vn_vid'].'</o:p></p>
  </td>
  <td width=101 colspan=2 valign=top style="width:75.9pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>&nbsp;'.$result['weight'].'</p>
  </td>
  <td width=119 valign=top style="width:89.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['power'].'</o:p></p>
  </td>
  <td width=114 valign=top style="width:85.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['sost'].'</o:p></p>
  </td>
  <td width=123 valign=top style="width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['meri'].'</o:p></p>
  </td>
  <td width=227 valign=top style="width:170.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:3.5pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['fio'].'</o:p></p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=107 style="border:none"></td>
  <td width=104 style="border:none"></td>
  <td width=0 style="border:none"></td>
  <td width=104 style="border:none"></td>
  <td width=89 style="border:none"></td>
  <td width=108 style="border:none"></td>
  <td width=94 style="border:none"></td>
  <td width=113 style="border:none"></td>
 </tr>
 <![endif]>';
}
echo "

</table>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>
</div>
</div>";


?>

</body>
</html>
