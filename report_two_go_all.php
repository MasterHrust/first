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
<a href="report_two.php">Назад?</a>
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
$sql = mysqli_query($link,"SELECT ogne.number,DATE_FORMAT(to_one.check_date_o, '%d.%m.%Y') AS check_date_o,to_one.check_o,DATE_FORMAT(to_one.check_date_otv, '%d.%m.%Y') AS check_date_otv,to_one.check_otv,DATE_FORMAT(to_one.check_date_ind, '%d.%m.%Y') AS check_date_ind,to_one.check_ind,DATE_FORMAT(to_one.recharge, '%d.%m.%Y') AS recharge,to_one.test,DATE_FORMAT(to_one.test_date, '%d.%m.%Y') AS test_date,to_one.zam2,to_one.meri2,to_one.fio2 from to_one LEFT JOIN ogne on ogne.id=to_one.ogne_id");

echo "<div id='MessForPrint'>
<div class=WordSection1>
<table>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid;
  height:15.9pt'>
  <td width=62 rowspan=2 valign=top style='width:46.5pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:
  90;height:15.9pt'>
  <p class=MsoNormal align=center style='margin-top:0cm;margin-right:5.65pt;
  margin-bottom:0cm;margin-left:5.65pt;margin-bottom:.0001pt;text-align:center;
  line-height:normal'>№ и марка огнетушителя</p>
  </td>
  <td width=309 colspan=5 valign=top style='width:232.05pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:15.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>Техническое обслуживание (вид и дата)</p>
  </td>
  <td width=109 rowspan=2 valign=top style='width:82.05pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:15.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Замечания о
  техническом состоянии</p>
  </td>
  <td width=92 rowspan=2 valign=top style='width:68.85pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:15.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Принятые
  меры</p>
  </td>
  <td width=117 rowspan=2 valign=top style='width:88.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:15.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Должность,
  фамилия, инициалы и подпись ответственного лица</p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:81.9pt'>
  <td width=62 valign=top style='width:46.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:
  90;height:81.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Проверка
  узлов огнетушителя</p>
  </td>
  <td width=62 valign=top style='width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:
  90;height:81.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Проверка качества
  ОТВ</p>
  </td>
  <td width=62 valign=top style='width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:
  90;height:81.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Проверка индикатора
  давления</p>
  </td>
  <td width=62 valign=top style='width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:
  90;height:81.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Перезарядка
  огнетушителя</p>
  </td>
  <td width=62 valign=top style='width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:
  90;height:81.9pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Испытания
  узлов огнетушителя</p>
  </td></tr>";


 while ($result = mysqli_fetch_array($sql))
    {
     echo'
 <tr style="mso-yfti-irow:2;mso-yfti-lastrow:yes">
  <td width=62 valign=top style="width:46.5pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['number'].'</o:p></p>
  </td>
  <td width=62 valign=top style="width:46.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['check_date_o'].' / '.$result['check_o'].'</o:p></p>
  </td>
  <td width=62 valign=top style="width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['check_date_otv'].' / '.$result['check_otv'].'</o:p></p>
  </td>
  <td width=62 valign=top style="width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['check_date_ind'].' / '.$result['check_ind'].'</o:p></p>
  </td>
  <td width=62 valign=top style="width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['recharge'].'</o:p></p>
  </td>
  <td width=62 valign=top style="width:46.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['test_date'].' / '.$result['test'].'</o:p></p>
  </td>
  <td width=109 valign=top style="width:82.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['zam2'].'</o:p></p>
  </td>
  <td width=92 valign=top style="width:68.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['meri2'].'</o:p></p>
  </td>
  <td width=117 valign=top style="width:88.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['fio2'].'</o:p></p>
  </td>
 </tr>';
}
echo "
</table>
<p class=MsoNormal><o:p>&nbsp;</o:p></p>
</div>";
echo "
</div>";


?>

</body>
</html>
