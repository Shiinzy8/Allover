<?php
/**
 * Created by PhpStorm.
 * User: Ros
 * Date: 15.06.16
 * Time: 23:11
 */
/*
 * Задачи (практика):
 */

/*Задача №8
Создать HTML-форму. Внутри формы создать поля для ввода: имени, фамилии, отчества, даты рождения,
пароля и подтверждения пароля. Также, ко всем полям ввода нужно привязать метки label, в которых
будет выведено имя поля. Метки должны находится с левой стороны от полей ввода. Форма должна
содержать поле-флаг, который будет нужен для подтверждения лицензионного соглашения и радио-кнопки
для выбора гендерной принадлежности. Внизу формы должна быть кнопка для отправки введенных данных.
*/
?>
<form>
    <table>
        <tr>
            <td colspan="2"> <p> Форима согласно задания:</p></td>
        </tr>
        <tr>
            <td>
                Имя
            </td>
            <td>
                <input type="text" name="answer">
            </td>
        </tr>
        <tr>
            <td>
                Фамилия
            </td>
            <td>
                <input type="text" name="answer">
            </td>
        </tr>
        <tr>
            <td>
                Отчество
            </td>
            <td>
                <input type="text" name="answer">
            </td>
        </tr>
        <tr>
            <td>
                Дата рождения
            </td>
            <td>
                <input type="date" name="answer">
            </td>
        <tr>
            <td>
                Пароль
            </td>
            <td>
                <input type="password" name="answer">
            </td>
        </tr>
        </tr>
        <tr>
            <td>
                Повторите пароль
            </td>
            <td>
                <input type="password" name="answer">
            </td>
        </tr>
        <tr>
            <td>
                Лицензионное соглашение
            </td>
            <td>
                <input type="checkbox" name="answer">
            </td>
        </tr>
        <tr>
            <td>
                Гендерная принадлежность
            </td>
            <td>
                М<input type="radio" name="answer">
                Ж<input type="radio" name="answer">
            </td>
        </tr>
        <tr>
            <td colspan="2"> <input value="Отправить" type="submit" /></td>
        </tr>
    </table>
</form>

<br>


<?php


/*Задача №49
Дан массив $arr с ключами 'Коля', 'Вася', 'Петя' с элементами '200', '300', '400'.
С помощью цикла foreach выведите на экран столбец строк такого формата: 'Коля — зарплата 200 долларов.'
 */
$arr=array('Коля'=>200,'Вася'=>300,'Петя'=>400);
foreach ($arr as $key=>$value){
    echo "{$key} — зарплата {$value} долларов.<br>";
}
echo '<br>';


/*Задача №50
Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en,
а русские — в массив $ru.

$arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');

$en = array('green', 'red','blue'); $ru = array('зеленый', 'красный', 'голубой');
 */

$arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
$en = array('green', 'red','blue');
$ru = array('зеленый', 'красный', 'голубой');

foreach ($arr as $key=>$value){
    $en[]=$value;
    $ru[]=$key;
}
echo '<pre>';
print_r($en);
print_r($ru);
echo '</pre>';


/*Задача №67
Вам нужно разработать программу, которая считала бы сумму цифр числа введенного пользователем.
Например: есть число 123, то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.

По желанию можете сделать проверку на корректность введения данных пользователем
 */
echo '<br>';
$q=123;
$e=array_sum(str_split($q));
echo $e;
echo '<br>';


/*Задача №68
Вам нужно разработать программу, которая считала бы количество вхождений какой­нибуть выбранной
вами цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза
 */
echo '<br>';
$che = 442158755745;
$arr = str_split($che);
$result = count((array_keys($arr, 5)));
echo $result;
echo '<br>';
echo '<br>';

/*Задача №72
Создать форму с двумя элементами textarea. При отправке формы скрипт
должен выдавать только те слова, которые есть и в первом и во
втором поле ввода. Реализацию этой логики необходимо поместить в
функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами
 */
?>

<form action="" method="GET">
    <table>
        <tr>
            <td colspan="2"> <p> Задача №72 - Создать форму с двумя элементами textarea. При отправке формы скрипт
                    должен выдавать только те слова, которые есть и в первом и во
                    втором поле ввода. Реализацию этой логики необходимо поместить в
                    функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами</p></td>
        </tr>
        <tr>
            <td>
Строчка
            </td>
            <td>
                <textarea name="S1"></textarea>
            </td>
        </tr>
        <tr>
            <td>
Строчка
            </td>
            <td>
                <textarea name="S2"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"> <input value="Отправить" type="submit" /></td>
        </tr>
    </table>
</form>

<?php


$a=$_GET['S1'];
$arr1=explode(" ", $a);
$b=$_GET['S2'];
$arr2=explode(" ", $b);
echo '<pre>';
print_r($arr1);
print_r($arr2);
$q=array();
function getCommonWords($a, $b) {
    return $result = array_intersect($a, $b);
};

print_r(getCommonWords($arr1,$arr2));

echo '</pre>';
/*Задача №73
Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных
 слов в тексте. Реализовать с помощью функции
 */
?>
    <form action="" method="GET">
        <table>
            <tr>
                <td colspan="2"> <p> Задача №73 -
                        Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных
                        слов в тексте. Реализовать с помощью функции</p></td>
            </tr>
            <tr>
                <td>
                    Введите строку
                </td>
                <td>
                    <textarea name="S3"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"> <input value="Отправить" type="submit" /></td>
            </tr>
        </table>
    </form>
<?php
$q=$_GET['S3'];
$arr=explode(" ", $q);
print_r($arr);
usort($arr, function ($a, $b) {
    return (mb_strlen($b) < mb_strlen($a)) ? -1:1;
    //return mb_strlen($b) - mb_strlen($a); ?????
});
echo '<br>';
echo '<br>';
print_r($arr);
echo '<pre>';
print_r(array_slice($arr, 0, 3));
echo '</pre>';

/*function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$a = array(0,3, 2, 5, 6, 1,9);

usort($a, "cmp");
echo '<pre>';
foreach ($a as $key => $value) {
    echo "$key: $value\n";
}
echo '</pre>';
*/
?>
<pre>
Задача №74
Есть текстовый файл. Необходимо удалить из него все слова, длина которых превышает N символов.
Значение N задавать через форму. Проверить работу на кириллических строках - найти ошибку и ее решение

    </pre>
<?php
$file="/Applications/XAMPP/htdocs/MYHW/test.txt";
$words = file_get_contents($file);
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
print_r($words);
echo '<br>';
echo '<br>';
$f = fopen($file, 'r+');
$wordsMy = file_get_contents($file);
$expWords=multiexplode(array(",",".","|",":"," ","\n"), $wordsMy);
print_r($expWords);
echo '<br>';
echo '<br>';
function ydalenie($r1,$r2){
    foreach ($r1 as $value) {
        $result = strlen($value);
        return $result;
    }
        if ($result<=$r2){
            $result == "";}
    }


$r3=ydalenie($expWords,2);
print_r($r3);
echo '<br>';
echo '<br>';
$newWord = str_replace($wordsMy, $r3, $f);
print_r($newWord);
echo '<br>';
echo '<br>';
fwrite($newWord, 'w');
fclose($f);



echo '<br>';
echo '<br>';
?>
<pre>
Задача №76
Написать функцию, которая выводит список' файлов в заданной директории, где в содержании файла
должно быть искомое слово. Директория и искомое слово задаются как параметры функции
    </pre>

<?php
$dir = "/Applications/XAMPP/htdocs/MYHW/";
$word='Задача';
// Открыть известный каталог и начать считывать его содержимое

function poiskSlovDir($dir,$word)
{ // Открываем известный каталог и начанаем считывать его содержимое
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                // Переводим фаил в строку
                $words1 = file_get_contents($file);
                // Ищем в строке слово если есть выводим имя файла и тип
                if (preg_match("/$word/i", $words1)) {
                    echo "файл: $file : тип: " . filetype($dir . $file) . "<br>";
                }
            }
            closedir($dh);
        }
    }
}

echo poiskSlovDir($dir,$word);

echo '<br>';
echo '<br>';
?>
<pre>
Задача №77
Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные
фото должны помещаться в папку uploads и выводиться на странице в виде таблицы
     </pre>


    <form enctype="multipart/form-data" action="#" method="POST">
        Отправить этот файл: <input type="file" name="image" accept="image/jpeg, image/jpg, image/png"/><br>
        <input type="submit" value="Отправить" />
    </form>



<?php
echo "<pre>";
print_r($_FILES);
echo "</pre>";
const COM_CON='uploads';

function saveFile (){
    if (!file_exists('uploads')){
        mkdir('uploads');
    }
    if (move_uploaded_file($_FILES['image']['tmp_name'], COM_CON .'/'. $_FILES['image']['name'])) {
        print "File is valid, and was successfully uploaded.";
    }
    else {
        print "There some errors!";
    }
    return 0;

}
saveFile();
$w = COM_CON .'/'.$_FILES['image']['name'];
echo '<br>';
echo '<br>';
echo '<img src="'.$w.'"/>';
echo '<br>';
echo '<br>';


$e2=1;


for ($a=0;$a<1;$a++) {
echo '<table style="border: solid 2px">';
    for ($i = 0; $i < $e2; $i++) {
    echo '<tr>';
        for ($y = 0; $y < $e2;$y++) {
        echo '<td><img src="'.$w.'"/></td.>';
            }
            echo '</tr>';
    }echo '</table>';
}
?>
<pre>
Задача №77
Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные
фото должны помещаться в папку uploads и выводиться на странице в виде таблицы
</pre>


    <form enctype="multipart/form-data" action="#" method="POST">
    Отправить этот файл: <input type="file" name="file[0]" accept="image/jpeg, image/jpg, image/png" multiple="true"/><br>
Отправить этот файл: <input type="file" name="file[1]" accept="image/jpeg, image/jpg, image/png" multiple="true"/><br>
Отправить этот файл: <input type="file" name="file[2]" accept="image/jpeg, image/jpg, image/png" multiple='true'/><br>
Отправить этот файл: <input type="file" name="file[3]" accept="image/jpeg, image/jpg, image/png" multiple='true'/><br>
        <input type="submit" value="Отправить" />
    </form>



<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

const DIR_UPLOAD='uploads/';

function saveAllFile (){
foreach($_FILES['file']['name'] as $k=>$f) {
    if (!$_FILES['file']['error'][$k]) {
        if (is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$k], DIR_UPLOAD.$_FILES['file']['name'][$k])) {
                echo 'Файл: '.$_FILES['file']['name'][$k].' загружен.<br />';
            }
        }
    }
}}
saveAllFile();

$w1 = DIR_UPLOAD .'/'.$_FILES['file']['name'][0];
$w2 = DIR_UPLOAD .'/'.$_FILES['file']['name'][1];
$w3 = DIR_UPLOAD .'/'.$_FILES['file']['name'][2];
$w4 = DIR_UPLOAD .'/'.$_FILES['file']['name'][3];
echo '<br>';
echo '<br>';
echo '<img src="'.$w1.'"/>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<img src="'.$w2.'"/>';
echo '<br>';
echo '<br>';
echo '<img src="'.$w3.'"/>';
echo '<br>';
echo '<br>';
echo '<img src="'.$w4.'"/>';
echo '<br>';






/*Задача №78
Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле
и добавить его. Все добавленные комментарии выводятся над текстовым полем
 */
?>
<form action="" method="GET">
    <table>
        <tr>
            <td colspan="2"> <p> Задача №78
Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле
и добавить его. Все добавленные комментарии выводятся над текстовым полем</p></td>
        </tr>
        <tr>
            <td>
                Введите сообщение
            </td>
            <td>
                <textarea name="massage" cols="60" rows="20" required></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2"> <input value="Отправить" type="submit" /></td>
        </tr>
    </table>
</form>
<?php







?>
<pre>
/*Задача №79
Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и
добавить его. Все добавленные комментарии выводятся над текстовым полем. Реализовать
проверку на наличие в тексте запрещенных слов, матов. При наличии таких слов -
выводить сообщение "Некорректный комментарий". Реализовать удаление из комментария
всех тегов, кроме тега <b>
 */
        </pre>
        <?php


/*Задача №80
Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba".
Ввод текста реализовать с помощью формы
 */

?>
    <form action="" method="GET">
        <table>
            <tr>
                <td colspan="2"> <p> Задача №80 -
                        Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba".
                        Ввод текста реализовать с помощью формы</p></td>
            </tr>
            <tr>
                <td>
                    Введите строку
                </td>
                <td>
                    <textarea name="S4"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"> <input value="Отправить" type="submit" /></td>
            </tr>
        </table>
    </form>
<?php
$q=$_GET['S4'];

function rec($a){
    return strrev($a);
}
echo rec($q);


/*Задача №81
Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются
пробелами. Текст должен вводиться с формы
 */
?>
    <form action="" method="GET">
        <table>
            <tr>
                <td colspan="2"> <p> Задача №81 -
                        Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются
                        пробелами. Текст должен вводиться с формы</p></td>
            </tr>
            <tr>
                <td>
                    Введите строку
                </td>
                <td>
                    <textarea name="S5"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"> <input value="Отправить" type="submit" /></td>
            </tr>
        </table>
    </form>
<?php
$q=$_GET['S5'];

function uni($q)
{
    $words = explode(" ", $q);
    $word = array_unique($words);
    return $word;
}

$e=uni($q);
echo count($e);

/*Задача №82
Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким
образом, что каждое новое предложение начиняется с большой буквы.

Пример:

Входная строка: 'а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь,
все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.
а там хоть трава не расти.';

Строка, возвращенная функцией: 'А Васька слушает да ест. А воз и ныне там.
А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый.
А ларчик просто открывался.А там хоть трава не расти.'
 */
?>

    <form action="" method="GET">
        <table>
            <tr>
                <td colspan="2"> <p> Задача №82 -
                        Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким
                        образом, что каждое новое предложение начиняется с большой буквы.</p></td>
            </tr>
            <tr>
                <td>
                    Введите строку
                </td>
                <td>
                    <textarea name="S6"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"> <input value="Отправить" type="submit" /></td>
            </tr>
        </table>
    </form>
<?php



/*Задача №83
Написать функцию, которая в качестве аргумента принимает строку,
и форматирует ее таким образом, что предложения идут в обратном порядке.

Пример:

Входная строка: 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь,
все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';

Строка, возвращенная функцией : 'А там хоть трава не расти. А ларчик просто открывался.
 король-то — голый. А вы друзья как ни садитесь, все в музыканты не годитесь. А воз и ныне там.А Васька слушает да ест.'
 */

/*Задача №84
Есть строка $string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня
яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня
 вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';

Подсчитайте, сколько раз каждый фрукт встречается в этой строке. Выведите в виде списка
 в порядке уменьшения количества:

Пример вывода:

яблоко – 12
черешня – 8
груша – 5
слива - 3

Задача №85
Разработать web-страницу, на которой будет возможность выбора изображения на локальном
компьютере и подальшая загрузка их на сервер. Также, должно быть отображение загруженных
изображений в виде портфолио.

Требования:

Размер изображения не должен превышать 3Мб.
Изображения могут быть, только, форматов: jpg, png, gif.
Изображения на сервере должны сохранятся в директории uploads.
Имя загруженного на сервер изображения должно формироваться на серверной стороне.
В портфолио можно загрузить максимум 7 изображений.
При просмотре порфолио, при наведении на изображение, поверх самого изображения, должна отображаться дата загрузки и оригинальное имя этого же изображения.
Для придания стилей используйте bootstrap CSS framework.
Для сохранения оригинального имени, даты загрузки и модифицированного имени изображения используйте файл, в который вы будете записывать сериализованный массив данных.
PHP скрипт и HTML код должен быть в разных файлах, в HTML выводите только данные (переменные, циклы).
*/
