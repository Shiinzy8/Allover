<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 25.06.2017
 * Time: 23:46
 */

namespace book;

class Book implements iBook
{
    private $name;
    private $author;
    private $type;
    private $countPage;
    private $condition;

    /**
     * Book constructor.
     * @param $name
     * @param $author
     * @param $type
     * @param $countPage
     * @param $condition
     */
    public function __construct($name, $author, $type, $countPage, $condition)
    {
        $this->name = $name;
        $this->author = $author;
        $this->type = $type;
        $this->countPage = $countPage;
        $this->condition = $condition;
    }

    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->name;
    }

    public function setName($name)
    {
        // TODO: Implement setName() method.
        $this->name = $name;
    }

    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->id;
    }

    public function getType()
    {
        // TODO: Implement getType() method.
    }

    public function getAuthor()
    {
        // TODO: Implement getAuthor() method.
    }

    public function getYear()
    {
        // TODO: Implement getYear() method.
    }

    public function getPage()
    {
        // TODO: Implement getPage() method.
    }

    public function getCondition()
    {
        // TODO: Implement getCondition() method.
    }

    public function reduceCondtion()
    {
        // TODO: Implement reduceCondtion() method.
    }
}