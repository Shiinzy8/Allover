<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 15.05.2017
 * Time: 23:27
 */

require 'Button.php';
require 'Pagination.php';

//$pagination = new Pagination();
//echo '<pre>';
//var_dump($pagination);
//echo '</pre>';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$p = new Pagination(array(
    'itemsCount' => 23,
    'itemsPerPage' => 5,
    'currentPage' => $page
));
?>

    <b>Pagination test</b> <hr/>

<?php foreach ($p->buttons as $button) :
    if ($button->isActive) : ?>
        <a href = '?page=<?=$button->page?>'><?=$button->text?></a>
    <?php else : ?>
        <span style="color:#555555"><?=$button->text?></span>
    <?php endif;
endforeach; ?>