<?php
/*
Public:

When you declare a method (function) or a property (variable) as public, those methods and properties can be accessed by:
- The same class that declared it.
- The classes that inherit the above declared class.
- Any foreign elements outside this class can also access those things.
*/
class GrandPa
{
    public $name='Mark Henry<br/>';  // A public variable
}

class Daddy extends GrandPa // Inherited class
{
    function displayGrandPaName()
    {
        return $this->name; // The public variable will be available to the inherited class
    }

}

// Inherited class Daddy wants to know Grandpas Name
$daddy = new Daddy;
echo $daddy->displayGrandPaName(); // Prints 'Mark Henry'

// Public variables can also be accessed outside of the class!
$outsiderWantstoKnowGrandpasName = new GrandPa;
echo $outsiderWantstoKnowGrandpasName->name; // Prints 'Mark Henry'