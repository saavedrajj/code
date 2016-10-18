<?php
/*
Protected:

When you declare a method (function) or a property (variable) as protected, those methods and properties can be accessed by:
- The same class that declared it.
- The classes that inherit the above declared class.

Outsider members cannot access those variables. Outsiders in the sense that they are not object instances of the declared class itself.
*/
class GrandPa
{
    protected $name = 'Mark Henry';
}

class Daddy extends GrandPa
{
    function displayGrandPaName()
    {
        return $this->name;
    }

}

$daddy = new Daddy;
echo $daddy->displayGrandPaName(); // Prints 'Mark Henry'

$outsiderWantstoKnowGrandpasName = new GrandPa;
echo $outsiderWantstoKnowGrandpasName->name; // Results in a Fatal Error
