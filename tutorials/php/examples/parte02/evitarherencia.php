<?php
/* http://www.nebaris.com/post/97/metodos-magicos-en-php-parte-2*/
final class ABM
{
    public final function login ()
    {
        // codigo
    }
}

class NuevoABM extends ABM
{
    public function login ()
    {
        // codigo
    }
}

$obj = new NuevoABM();
?>
