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
<a href="report_three.php">Назад?</a>
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
$sql = mysqli_query($link,"SELECT ogne.number,DATE_FORMAT(pere.date_isp, '%d.%m.%Y') AS date_isp,pere.rez1,DATE_FORMAT(pere.next_plan, '%d.%m.%Y') AS next_plan,DATE_FORMAT(pere.date_pere, '%d.%m.%Y') AS date_pere,pere.mark,pere.rez3,DATE_FORMAT(pere.next_date, '%d.%m.%Y') AS next_date,pere.fio3 from pere LEFT JOIN ogne on ogne.id=pere.ogne_id WHERE pere.ogne_id='$var_value'");


echo "<div id='MessForPrint'>
<div class=WordSection1>

<table>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid;
  height:120.0pt'>
  <td width=67 valign=top style='width:50.35pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:
  90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>№ и марка огнетушителя</p>
  </td>
  <td width=114 valign=top style='width:85.85pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Дата проведения испытания и перезарядки; организация, проводившая техобслуживание</p>
  </td>
  <td width=78 valign=top style='width:58.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Результаты осмотра и испытания на прочность</p>
  </td>
  <td width=52 valign=top style='width:38.85pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Срок следующего планового испытания</p>
  </td>
  <td width=76 valign=top style='width:2.0cm;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Дата проведения перезарядки огнетушителя</p>
  </td>
  <td width=57 valign=top style='width:42.55pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Марка (концентрация) заряженного ОТВ</p>
  </td>
  <td width=47 valign=top style='width:35.15pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Результат осмотра после перезарядки</p>
  </td>
  <td width=66 valign=top style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Дата следующей плановой перезарядки</p>
  </td>
  <td width=66 valign=top style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;mso-rotate:90;height:120.0pt'>
  <p class=MsoNormal style='margin-top:0cm;margin-right:5.65pt;margin-bottom:
  0cm;margin-left:5.65pt;margin-bottom:.0001pt;line-height:normal'>Должность, фамилия, инициалы и подпись ответственного лица</p>
  </td>
 </tr>";
 while ($result = mysqli_fetch_array($sql))
    {
 echo '
 <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
  <td width=67 valign=top style="width:50.35pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['number'].'</o:p></p>
  </td>
  <td width=114 valign=top style="width:85.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['date_isp'].'</o:p></p>
  </td>
  <td width=78 valign=top style="width:58.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['rez1'].'</o:p></p>
  </td>
  <td width=52 valign=top style="width:38.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['next_plan'].'</o:p></p>
  </td>
  <td width=76 valign=top style="width:2.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['date_pere'].'</o:p></p>
  </td>
  <td width=57 valign=top style="width:42.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['mark'].'</o:p></p>
  </td>
  <td width=47 valign=top style="width:35.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['rez3'].'</o:p></p>
  </td>
  <td width=66 valign=top style="width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['next_date'].'</o:p></p>
  </td>
  <td width=66 valign=top style="width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class=MsoNormal style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal"><o:p>'.$result['fio3'].'</o:p></p>
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
