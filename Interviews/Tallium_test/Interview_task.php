<?php

//Написать алгоритм, который будет выполнять следующее:
//1) Динамически "нарисует" таблицу размерностью NxM;
//2) Случайным образом заполнит L клеток цифрой "5", растояние между 5-ками должно быть не меньше 1-й клетки;
//3) Вокруг каждой "5" проставит цифры "4";
//4) В местах накладывания "4"-ок - суммировать их.

class NumberField
{
    private $width = 0;
    private $height = 0;
    private $five_count = 0;
    private $five_array_cordinate = array();
    private $field = array();

    public function __construct($width, $height)
    {
        // проверяме чтоб нам не
        if ($this->width && $this->height) return 0;

        $this->width = $width;
        $this->height = $height;

        // считаем количество бомб
        $this->five_count = rand(1, (
            (($this->width % 2) ? (int)($this->width / 2) + 1 : $this->width / 2) *
            (($this->height % 2) ? (int)($this->height / 2) + 1 : $this->height / 2)
        ));

        //echo $this->five_count . PHP_EOL;
        // заполняем пустое поле
        for ($y = 0; $y < $this->height; $y++) {
            $this->field[$y] = array();
            for ($x = 0; $x < $this->width; $x++) {
                $this->field[$y][$x] = 0;
                //echo $this->field[$y][$x] . " ";
            }
            //echo PHP_EOL;
        }

        // заполняем поле 5
        $this->fillFiveField($this->five_count);

        // заполняем поле 4
        $this->fillFourSell($this->five_count);

        // выводим поле в виде таблицы
        $this->viewFiled();
    }

    private function fillFiveField($five_count)
    {
        //echo "fill fives\n";
        while ($five_count) {

            $rand_x = rand(0, $this->width - 1);
            $rand_y = rand(0, $this->height - 1);

            if ($this->checkForFive($rand_x, $rand_y)) {
                $this->field[$rand_y][$rand_x] = 5;
                array_push($this->five_array_cordinate, array($rand_y, $rand_x));
                $five_count--;
            }
        }
    }

    private function checkForFive($x_five, $y_five)
    {
        $can_put = 1;
        $wid_min = ($x_five == 0) ? 0 : $x_five - 1;
        $wid_max = ($x_five == $this->width - 1) ? $x_five : $x_five + 1;
        $hig_min = ($y_five == 0) ? 0 : $y_five - 1;
        $hig_max = ($y_five == $this->height - 1) ? $y_five : $y_five + 1;

        for ($y = $hig_min; $y <= $hig_max; $y++) {
            for ($x = $wid_min; $x <= $wid_max; $x++) {
                $can_put = ($this->field[$y][$x] == 0) ? $can_put : 0;
                if (! $can_put) {
                    break 2;
                }
            }
        }

        return $can_put;
    }

    private function fillFourSell($five_count)
    {
        reset($this->five_array_cordinate);

        while ($five_count) {

            $cordinate = current($this->five_array_cordinate);
            $wid_min = ($cordinate[1] == 0) ? 0 : $cordinate[1] - 1;
            $wid_max = ($cordinate[1] == $this->width - 1) ? $cordinate[1] : $cordinate[1] + 1;
            $hig_min = ($cordinate[0] == 0) ? 0 : $cordinate[0] - 1;
            $hig_max = ($cordinate[0] == $this->height - 1) ? $cordinate[0] : $cordinate[0] + 1;

            for ($y = $hig_min; $y <= $hig_max; $y++) {
                for ($x = $wid_min; $x <= $wid_max; $x++) {
                    $this->field[$y][$x] = ($this->field[$y][$x] == 5)
                        ? $this->field[$y][$x]
                        : $this->field[$y][$x] + 4;
                }
            }

            next($this->five_array_cordinate);
            $five_count--;
        }
    }

    private function viewFiled()
    {
        echo "<table style='border: solid 1px black'>";
        echo "<tr style='border: solid 1px black'>";
        for ($x = 0; $x < $this->width; $x++) {
            echo "<th style='border: solid 1px black'>" . ($x + 1) . " head</th>";
        }
        echo "</tr>";
        for ($y = 0; $y < $this->height; $y++) {
            echo "<tr style='border: solid 1px black'>";
            for ($x = 0; $x < $this->width; $x++) {
                echo "<td style='border: solid 1px black'>" . $this->field[$y][$x] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

$first_field = new NumberField(4, 4);

// Які проблеми ви бачите в реалізації снизу?

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// Controller
class UserController
{
    const FILE_BUCKET = 'user-files';

    public function create(Request $request): Response
    {
        $user = new User($request);
        $user->avatarUrl = md5(time()) . '.jpg'; // md5 не впевнений що це зараз актуальний алгоритм
        if (! $user->save()) {
            exit('Error saving user');
        }
        (new FileStorage($user, $request->getUploadedFiles()['avatar']))->store();
        Email::send($user->email, 'Hi  email');

        return new \GuzzleHttp\Psr7\Response(302, ['Location' => '/']);
    }
}

// Entity
class User
{
    private int $id;
    public $email;
    public $password;
    public $name;
    public $avatarUrl;

    public function __construct(Request $request) // не має бути конструктора
    {
        $this->email = $request->getBody()['email'];
        $this->password = $request->getBody()['password'];
        $this->name = $request->getBody()['name'];
    }

    public function save()
    {
        $values = [
            ':email' => $this->email,
            ':password' => $this->password,
            ':name' => $this->name,
            ':avatar_url' => $this->avatarUrl,
        ];
        /** @var \PDO $db */
        $db = \DB::getSingleton(); // явно не задача ентіті
        if (empty($this->id)) {
            $sth = $db->prepare("INSERT INTO users (email, password, name, avatar_url) VALUES (:email, :password, :name, :avatar_url)");
        } else {
            $values[':id'] = $this->id;
            $sth = $db->prepare('UPDATE users SET email = :email, password = :password, name = :name, avatar_url = :avatar_url WHERE id = :id');
        }
        return $sth->execute($values);
    }

}

// Service
class Email
{
    public static function send(string $email, string $text)
    {
        $mg = \Mailgun\Mailgun::create('auth key');
        $mg->messages()->send($email, ['text' => $text]);
    }
}

// Service
class FileStorage
{

    private \Aws\S3\S3Client $awsClient;
    private string $url;
    private $fileData;

    public function __construct(User $user, $fileData)
    {
        $this->awsClient = new Aws\S3\S3Client([
            'credentials' => [
                'key' => 'key', // ці дані можна брати з env файла
                'secret' => 'my_super_secret',
            ],
        ]);
        $this->url = $user->avatarUrl;
        $this->fileData = $fileData;
    }

    public function store(): void
    {
        $result = $this->awsClient->putObject([
            'Bucket' => UserController::FILE_BUCKET,
            'Key' => $this->url,
            'Body' => $this->fileData,
        ]);
        if (! $result) {
            throw new \Exception('Error');
        }
    }
}
