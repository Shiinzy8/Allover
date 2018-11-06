<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 15.08.2018
 * Time: 17:06
 */

abstract class Component
{
  protected $data;
  protected $value;

  abstract public function getData();

  abstract public function getValue();
}

class ConcreteComponent extends Component
{
  public function __construct()
  {
    $this->value = 1000;
    $this->data = "Concrete Component:\t{$this->value}\n";
  }

  public function getData()
  {
    return $this->data;
  }

  public function getValue()
  {
    return $this->value;
  }
}

abstract class Decorator extends Component
{

}

class ConcreteDecorator1 extends Decorator
{
  public function __construct(Component $data)
  {
    $this->value = 500;
    $this->data = $data;
  }

  public function getData()
  {
    return $this->data->getData() . "Concrete Decorator 1:\t{$this->value}\n";
  }

  public function getValue()
  {
    return $this->value + $this->data->getValue();
  }
}

class ConcreteDecorator2 extends Decorator
{
  public function __construct(Component $data)
  {
    $this->value = 500;
    $this->data = $data;
  }

  public function getData()
  {
    return $this->data->getData() . "Concrete Decorator 2:\t{$this->value}\n";
  }

  public function getValue()
  {
    return $this->value + $this->data->getValue();
  }
}

class Client
{
  private $component;

  public function __construct()
  {
    $this->component = new ConcreteComponent();
    $this->component = $this->wrapComponent($this->component);

    echo $this->component->getData();
    echo "Client:\t\t\t";
    echo $this->component->getValue();
  }

  private function wrapComponent(Component $component)
  {
    $component1 = new ConcreteDecorator1($component);
    $component2 = new ConcreteDecorator2($component1);
    return $component2;
  }
}

$client = new Client();

// Result: #quanton81

//Concrete Component:	1000
//Concrete Decorator 1:	500
//Concrete Decorator 2:	500
//Client:               2000