<?php

class ItemChild extends Item
{
    public function getID() 
    {
        return parent::getID();
    }

    public function getToken()
    {
        // this private method isn't inhereted
        return parent::getToken();
    }
}