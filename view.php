<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<a href="index.php">На Главную?</a>
<a href="add.php">Добавить новый ОГ?</a>
<?php
require_once 'connection.php'; // подключаем скрипт

    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
     $sql2 = mysqli_query($link, "DELETE FROM ogne WHERE id = ".$_GET['del_id']); //удаляем строку из таблицы
    }

    if (isset($_GET['red_id'])) { //Проверяем, передана ли переменная на редактирования
        if (isset($_POST['number']))
        {

        $number = $_POST['number'];
        $date = $_POST['date'];
        $place = $_POST['place'];
        $type = $_POST['type'];
        $izg = $_POST['izg'];
        $number_zav = $_POST['number_zav'];
        $date_izg = $_POST['date_izg'];
        $model = $_POST['model'];
        $red_id = $_POST['red_id'];
        $sql3 = mysqli_query($link, "UPDATE ogne SET number = '$number', date = '$date', place = '$place', type = '$type', izg = '$izg', number_zav = '$number_zav', date_izg = '$date_izg', model = '$model' WHERE id = ".$_GET['red_id']);
            }

    }

    $sql = mysqli_query($link, "SELECT id, number, date, place, type, izg, number_zav, date_izg, model FROM ogne");
    echo "<table border = 1><tr><th>Номер</th><th>Дата введения</th><th>Место установки</th><th>Тип и марка</th><th>Завод-изготовитель</th><th>Заводской номер</th><th>Дата изготовления</th><th>Марка</th></tr>";
    while ($result = mysqli_fetch_array($sql))
    {

        echo '<tr><td>'.$result['number'].'</td><td>'.$result['date'].'</td><td>'.$result['place'].'</td><td>'.$result['type'].'</td><td>'.$result['izg'].'</td><td>'.$result['number_zav'].'</td><td>'.$result['date_izg'].'</td><td>'.$result['model'].'</td><td><a href="?red_id='.$result['id'].'">Изменить</a></td><td><a href="?del_id='.$result['id'].'"><font color="red">Удалить</font></a></td></tr>';

    }
       echo "</table>";


     if (isset($_GET['red_id'])) { //Если передана переменная на редактирование
        //Достаем запсись из БД
        $sql3 = mysqli_query($link, "SELECT id, number, date, place, type, izg, number_zav, date_izg, model FROM ogne WHERE id=".$_GET['red_id']); //запрос к БД
        $result = mysqli_fetch_array($sql3); //получение самой записи

        //Отрисовываем форму. Обратите внимание, что фигурную скобку условия if мы закроем только после формы.
        //Т.е. если переменная red_id не передана, то форма не отрисуется
        //И не важно, что посреди цыкла мы закрываем тег PHP , его работа продолжается, пока скобка не закроется
        ?>
<table>
<form action="" method="POST">
    <tr>
        <td>Номер:</td>
        <td><input type="text" name="number" value="<?php echo ($result['number']); ?>"></td>
    </tr>
    <tr>
        <td>Дата введения:</td>
        <td><input type="date" name="date" value="<?php echo ($result['date']); ?>"></td>
    </tr>
    <tr>
        <td>Место установки:</td>
        <td><input type="text" name="place" value="<?php echo ($result['place']); ?>"></td>
    </tr>
     <tr>
        <td>Тип и марка:</td>
        <td><input type="text" name="type" value="<?php echo ($result['type']); ?>"></td>
    </tr>
     <tr>
        <td>Завод-изготовитель:</td>
        <td><input type="text" name="izg" value="<?php echo ($result['izg']); ?>"></td>
    </tr>
     <tr>
        <td>Заводской номер:</td>
        <td><input type="text" name="number_zav" value="<?php echo ($result['number_zav']); ?>"></td>
    </tr>
    <tr>
        <td>Дата изготовления:</td>
        <td><input type="date" name="date_izg" value="<?php echo ($result['date_izg']); ?>"></td>
    </tr>
     <tr>
        <td>Модель:</td>
        <td><input type="text" name="model" value="<?php echo ($result['model']); ?>"></td>
    </tr>

    <tr>
        <td><input type="submit" value="OK"></td>
    </tr>
</form>
</table>
<?php
    }

?>
</body>
</html>
