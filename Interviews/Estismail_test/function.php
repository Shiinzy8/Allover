<?php

$form_data=$_POST;

function getData($data) {

    // returned array
    $arr = [
        't_c' => ((int)$data['t_c'] < 0 ? 0 : (int)$data['t_c'] ),
        'd'   => ((int)$data['d'] < 0 ? 0 : (int)$data['d'] ),
        'f'   => ((int)$data['f'] < 0 ? 0 : (int)$data['f'] ),
        'p'   => 0,
        'o'   => ((int)$data['o'] < 0 ? 0 : (int)$data['o'] ),
        'c'   => ((int)$data['c'] < 0 ? 0 : (int)$data['c'] ),
    ];

    // total_count <= 0, return array with 0
    if($arr['t_c'] <= 0) {
        foreach ($arr as $key=>$value) {
            $arr[$key] = 0;
        }
        return $arr;
    }

    /**
     * Здесь проверяем входящие данные, если они друг другу противореча
     * приводим к необходимым показателям
     */
    // delivered + fail <= total_count
    $arr['d'] = ($arr['d'] > $arr['t_c']) ? $arr['t_c'] : $arr['d'];
    $arr['f'] = ( $arr['f'] > ($arr['t_c']-$arr['d']) ) ? $arr['t_c']-$arr['d'] : $arr['f'];
    $arr['p'] = $arr['t_c'] - $arr['d'] - $arr['f'];
    // open <= delivered
    $arr['o'] = ( $arr['o'] > $arr['d'] ) ? $arr['d'] : $arr['o'];
    // click <= open
    $arr['c'] = ( $arr['c'] > $arr['o'] ) ? $arr['o'] : $arr['c'];

    /**
     * Теперь записывыем их в POST  это будут правильные показатели по письмам
     * эти числа будут показаны в ToolTip
     */
    foreach ($arr as $key=>$value) {
        $_POST[$key] = $value;
    }

    /**
     * Опять трансформирует показатели,эти результаты мы покажем в самих барах
     * это реальные проценты, как сказано в задании open и click от delivered
     */
    // transform data for the names of the bar
    $_POST['open_p']  = ($arr['d'] > 0) ? round($arr['o']/($arr['d']/100),1) : 0;
    $_POST['click_p'] = ($arr['d'] > 0) ? round($arr['c']/($arr['d']/100),1) : 0;
    $_POST['delivered_p'] = ($arr['t_c'] > 0) ? round($arr['d']/($arr['t_c']/100),1) : 0;
    $_POST['fail_p'] = ($arr['t_c'] > 0) ? round($arr['f']/($arr['t_c']/100),1) : 0;
    $_POST['progress_p'] = round(100 - ($_POST['delivered_p']+$_POST['fail_p']),1);

    // real or minimal width
    if ($arr['f'] > 0) {
        $arr['f'] = 100/($arr['t_c']/$arr['f']);
        if ($arr['f'] < 5) $arr['f']=5;
    }
    if ($arr['p'] > 0) {
        $arr['p'] = 100/($arr['t_c']/$arr['p']);
        if ($arr['p'] < 5) $arr['p']=5;
    }
    if ($arr['c'] > 0) {
        $arr['c'] = 100/($arr['t_c']/$arr['c']);
        if ($arr['c'] < 5) $arr['c']=5;
    }
    if ($arr['o'] > 0) {
        $arr['o'] = 100/($arr['t_c']/$arr['o'])-$arr['c'];
        if ($arr['o'] < 5) $arr['o']=5;
    }
    if ($arr['d'] > 0) {
        $arr['d'] = 100/($arr['t_c']/$arr['d'])-$arr['c']-$arr['o'];
        if ($arr['d'] < 5) $arr['d']=5;
    }

    /**
     * Здесь делаем 5 кругов что б все учесть
     * Чем больше секций тем больше будет кругов
     */
    // real or max width
    $i = 5;
    do {
        foreach ($arr as $key=>$value) {
            $width = 100-$arr['c']-$arr['o']-$arr['d']-$arr['p']-$arr['f'];
            $max_width = (($width + $value) < 5 ) ? 5 : $width + $value;
            if ($value!=0 && $value > $max_width) $arr[$key] = $max_width;
        }
        $i--;
    } while ($i>0);

    return $arr;
}

$progress_bar_data = getData($form_data);