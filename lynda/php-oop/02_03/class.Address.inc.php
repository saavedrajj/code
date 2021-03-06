<?php
/**
 * Created by PhpStorm.
 * User: saavedrajj
 * Date: 11/10/15
 * Time: 6:17 PM
 */

/*
 * Physical address.
 */
class Address {
    // Street address
    public $street_address_1;
    public $street_address_2;

    // Name of the City
    public $city_name;

    // Name of the subdivision
    public $subdivision_name;

    // Postal code
    public $postal_code;

    // Name of the country
    public $country_name;

    /*
     *  Display an address in HTML
     *  @return string
     */
    function display() {
        $output = '';
        // Street address
        $output .= $this->street_address_1;
        if ($this->street_address_2) {
            $output .= '<br/>'.$this->street_address_2;
        }

        // City, Subdivision, Postal Code
        $output .= '<br/>';
        $output .= $this->city_name . ', ' . $this->subdivision_name;
        $output .= '' . $this->postal_code;

        // Country
        $output .= '<br/>';
        $output .= $this->country_name;

        return $output;
    }
}

