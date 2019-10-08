<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 24.09.2016
 * Time: 10:11
 */

/* class Singleton {
    private static $single = 0;
    private static $object = 0;

    private $field = 0;

    private function __construct($a) {
        $this->field = $a;
    }

    private function __clone() {}
    private function  __wakeup() {}

    public function createClass($a) {
        if (!self::$single) {
            self::$single = 1;
            echo self::$single;
            self::$object = new Singleton($a);
            return self::$object;
        } else {
            echo "Object already created";
        }
    }
}

$a = Singleton::createClass(2);
echo "\n";
$b = Singleton::createClass(4);
echo "\n";

echo var_dump($a) . "  " . var_dump($b);
echo isset($a) . "  " . isset($b); */

