<?php
class Device {
    public $name;           // the name of the device
    public $battery;        // holds a Battery object
    public $data = array(); // stores misc. data in an array
    public $connection;     // holds some connection resource

    
    public function  __construct(Battery $battery, $name) {
        // $battery can only be a valid Battery object
    	$this->battery = $battery;
    	$this->name = $name;
        // connect to the network
    	$this->connect();
    }
    //...


    protected function connect() {
        // connect to some external network
    	$this->connection = 'resource';
    	echo $this->name . ' connected' . PHP_EOL;
    }

    protected function disconnect() {
        // safely disconnect from network
    	$this->connection = null;
    	echo $this->name . ' disconnected' . PHP_EOL;
    }
}

class Battery {
	private $charge = 0;

	public function setCharge($charge) {
		$charge = (int)$charge;
		if($charge < 0) {
			$charge = 0;
		}
		elseif($charge > 100) {
			$charge = 100;
		}
		$this->charge = $charge;
	}
}
?>