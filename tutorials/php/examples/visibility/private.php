<?php
/*
Private:

When you declare a method (function) or a property (variable) as private, those methods and properties can be accessed by:

- The same class that declared it.

Outsider members cannot access those variables. Outsiders in the sense that they are not object instances of the declared class itself and even the classes that inherit the declared class.
*/
class GrandPa
{
    private $name = 'Mark Henry';
}

class Daddy extends GrandPa
{
	//protected $name="Juan Saavedra";
    function displayGrandPaName()
    {
        return $this->name;   
    }

}

$daddy = new Daddy;
echo $daddy->displayGrandPaName(); // Results in a Notice 

$outsiderWantstoKnowGrandpasName = new GrandPa;
echo $outsiderWantstoKnowGrandpasName->name; // Results in a Fatal Error