<?php
include_once("../TimeMemoryMeter.php");

class person {
    protected $firstName, $lastName, $id;
    
    public function __construct($first_name, $last_name, $identification) {
        $this->firstName = $first_name;
        $this->lastName = $last_name;
        $this->id = $identification;
    }
    
    function printPerson() {
        print("Name: {$this->lastName}, {$this->firstName}\n");
        print("ID: {$this->id}\n");
    }
}

class Student extends person {
    private $testScores;

    protected $scores;
  
    /**	
     * Class Constructor
     * 
     * Parameters:
     * firstName - A string denoting the Person's first name.
     * lastName - A string denoting the Person's last name.
     * id - An integer denoting the Person's ID number.
     * scores - An array of integers denoting the Person's test scores.
    */
    public function __construct($firstName, $lastName, $id, $scores)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->id = $id;
        $this->scores = $scores;
    }

    /**
     * Function Name: calculate
     * Return: A character denoting the grade.
    */
    public function calculate() {
        $result = array_sum($this->scores) / count($this->scores);

        if (90 <= $result && $result <= 100) {
            return "O";
        } elseif (80 <= $result && $result  < 90) {
            return "E";
        } elseif (70 <= $result && $result  < 80) {
            return "A";
        } elseif (55 <= $result && $result  < 70) {
            return "P";
        } elseif (40 <= $result && $result  < 55) {
            return "D";
        } else {
            return "T";
        }
    }

    public function printPerson() {
        print("Name: {$this->lastName}, {$this->firstName}\n");
        print("ID: {$this->id}\n");
        print("Grade: {$this->calculate()}\n");
    }
}


$file = fopen("Inheritance.txt", "r");

$name_id = explode(' ', fgets($file));

$first_name = $name_id[0];
$last_name = $name_id[1];
$id = (int)$name_id[2];

fgets($file);

$scores = array_map('intval', explode(' ', fgets($file)));

timeMemoryMeterStart();
$student = new Student($first_name, $last_name, $id, $scores);

$student->printPerson();
echo timeMemoryMeterFinish() . PHP_EOL;