<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="resume" content="resume, summary, worker, recruitment" />
    <title>Arkhyliuk Andrii</title>
    <link href="Lesson_01_28.05.16_HW.css" rel="stylesheet">
</head>

<body>

<?php
    $surname = "Архилюк";
    $name = "Андрей";
    $patronymic = "Викторович";

    $email = "AndriiArkhyliuk@gmail.com";
    $phone_number = "+38-066-78-12-829";

    $i_am = "Я энергичный и коммуникабельный молодой человек, стремящийся сделать
        карьеру, которая будет соответствовать моим профессиональным навыкам и 
        современным тенденциям. Мои личностные качества укрепят Ваш коллектив,
        помогут в достижении новых целей и освоении новых горизонтов. Я приложу
        максимум усилий для процветания Вашей компании и своего профессионального роста.";

    $computer_skills = "<p>C, C++, C#, JavaScript, HTML, CSS, XML<br/>
                    Microsoft Office (Word, Excel, Access etc)<br/>
                    Adobe Creative Suite (Photoshop, Illustrator, Lightroom, etc)<br/>
                    Autodesk (3ds Max, AutoCAD, etc.)</p>";
    $office_skills = "<p>Ведение офисной документации, администрирование баз данных, организация
                событий, поддержка клиентов.</p>";
    $language_skills = "<p>Oral and writing communicating in English (Intermediate)</p>";

    $education = "<h2>Национальный университет кораблестроения </br> им. адм. Макарова</h2>
                <p>Машиностроительный факультет.
                    <br/> Магистр по двигателям внутреннего сгорания.</p>";

    $vinsoft_skills = array(
        "Внедрение и сопровождение зарплатных проектов",
        "Установка, наладка, обновление программного продукта на рабочих станциях клиентов",
        "Сопровождение программного обеспечения в области бухгалтерского учета",
    );
    $vinsoft_skills_count = count($vinsoft_skills);

    $skills_33 = array(
        "Учавствовал в открытии торгового зала и в наладке робочих
                    процессов",
        "Ведение документации",
        "Решение проблем клиентов",
    );
    $skills_33_count = count($skills_33);

    $hobbies = array(
        "Путешествовия",
        "Фотография",
        "Спорт",
        "Кино и книги",
    );
    $hobbies_count = count($hobbies);
?>

    <div id="page-wrap">
        <img src="Face.png" alt="Photo of Andrii" id="pic" />
        <div id="contact-info" class="vcard">
            <?php echo "<h1 class=\"fn\">$surname"." ".$name." ".$patronymic."</h1>";?>
            <p>
                <?php echo "Телефон:"?> <span class="tel"><?= $phone_number?></span>
                <br/> <?php echo "Email:"?> <a class="email"
                href="mailto:AndriiArkhyliuk@gmail.com"><?= $email?></a>
            </p>
        </div>
        
        <div id="objective">
            <p>
                <?= $i_am?>
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt><?php echo "Образование"?></dt>
            <dd>
                <?php echo $education;?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt><?php echo "Навыки"?></dt>
            <dd>
                <h2><?php echo "Компьтерные навыки"?></h2>
                <?= $computer_skills?>
                <h2><?php echo "Офисные навыки"?></h2>
                <?= $office_skills?>
                <h2><?php echo "Foreign languages"?></h2>
                <?= $language_skills?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt><?php echo "Опыт"?></dt>
            <dd>
                <h2><?php echo "ООО Винсофт"?>
                <span><p><?php echo "Инженер программного обеспечения, Киев - 2010-по наст.
                время"?></p></span></h2>
                <ul>
                    <?php
                    for ($x = 0; $x<$vinsoft_skills_count; $x++) {
                        echo "<li>$vinsoft_skills[$x]</li> \n";
                    } ?>
                </ul>
                
                <h2><?php echo "Сеть строительных супермаркетов «33 м<sup>2</sup>»"?>
                <span><p><?php echo "Старший продавец, Николаев - 2009-2010"?></p></span></h2>
                <ul>
                    <?php
                    for ($x = 0; $x<$skills_33_count; $x++) {
                        echo "<li>$skills_33[$x]</li> \n";
                    } ?>
                </ul>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt><?php echo "Хобби"?></dt>
            <?php
            for ($x = 0; $x<$hobbies_count; $x++) {
                echo "<dd>$hobbies[$x]</dd> \n";
            } ?>
            <dd class="clear"></dd>
        </dl>
        <div class="clear"></div>
    </div>
</body>

</html>
