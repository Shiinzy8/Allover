<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estismail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">

    <h4 class="text-left">Progress bar</h4>
    <br>
    <form class="form-inline" method="post" action="index.php">
        <div class="col-10">
            <input type="number" class="form-control" name="t_c" id="total_count" placeholder="Total"
                   required="required" pattern="[0-9]+">
        </div>
        <div class="col-10">
            <input type="number" class="form-control" name="d" id="delivered" placeholder="Delivered"
                   required="required" pattern="[0-9]+">
        </div>
        <div class="col-10">
            <input type="number" class="form-control" name="f" id="fail" placeholder="Fail" required="required"
                   pattern="[0-9]+">
        </div>
        <div class="col-10">
            <input type="number" class="form-control" name="o" id="open" placeholder="Open" required="required"
                   pattern="[0-9]+">
        </div>
        <div class="col-10">
            <input type="number" class="form-control" name="c" id="click" placeholder="Click" required="required"
                   pattern="[0-9]+">
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Send</button>
    </form>
    <br>
    <?php if (isset($_POST['submit'])) {
        require_once('function.php');
        if ($progress_bar_data['t_c'] > 0) { ?>
            <div class="progress">

                <?php if ($progress_bar_data['c'] > 0) { ?>
                    <div class="progress-bar progress-bar-info"
                         role="progressbar"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="<?php echo 'Количество кликов по ссылкам в письмах:'.(int)$_POST['c'] ?>"
                         style="width:<?php echo $progress_bar_data['c']."%"?>;">
                        <?php echo $_POST['click_p']; ?>
                    </div>
                <?php } ?>

                <?php if ($progress_bar_data['o'] > 0) { ?>
                    <div class="progress-bar progress-bar-warning"
                         role="progressbar"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="<?php echo 'Количество открытых писем:'.(int)$_POST['o'] ?>"
                         style="width:<?php echo $progress_bar_data['o']."%"?>;">
                        <?php echo $_POST['open_p']; ?>
                    </div>
                <?php } ?>

                <?php if ($progress_bar_data['d'] > 0) { ?>
                    <div class="progress-bar progress-bar-success"
                         role="progressbar"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="<?php echo 'Количество доставленных писем:'.(int)$_POST['d'] ?>"
                         style=" width:<?php echo $progress_bar_data['d']."%"?>;">
                        <?php echo $_POST['delivered_p']; ?>
                    </div>
                <?php } ?>

                <?php if ($progress_bar_data['p'] > 0) { ?>
                    <div class="progress-bar progress-bar-info"
                         role="progressbar"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="<?php echo 'Количество писем в процессе отправки:'.(int)$_POST['p'] ?>"
                         style=" width:<?php echo $progress_bar_data['p']."%"?>;
                                 background-color:grey;">
                        <?php echo $_POST['progress_p']; ?>
                    </div>
                <?php } ?>

                <?php if ($progress_bar_data['f'] > 0) { ?>
                    <div class="progress-bar progress-bar-danger"
                         role="progressbar"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="<?php echo 'Количество недоставленных писем:'.(int)$_POST['f'] ?>"
                         style=" width:<?php echo $progress_bar_data['f']."%"?>;">
                        <?php echo $_POST['fail_p']; ?>
                    </div>
                <?php } ?>

            </div>
        <?php } ?>
    <?php } ?>

</div>

<script>
    $(document).ready(function () {
        var bIsShown = true;

        $("#tool-open").on('mouseenter', function () {
            bIsShown = true;
        }, false).on('mouseleave', function () {
            bIsShown = false;
        });
        $('[data-toggle="tooltip"]').tooltip({
            placement: 'top',
            container: 'body'
        });
    });
</script>

</body>
</html>