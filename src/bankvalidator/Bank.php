<?php
namespace bankvalidator;

abstract class Bank{
    public $agency;
	public $account;
    protected $weight;
  

	public function getAgencyToInt():int{

        return $this->toInt($this->agency);
    }
	
	protected function toInt(string $value):int{
		$converted = str_replace('.','',$value);
        $converted = str_replace('-','',$converted);
        $converted = str_replace('/','',$converted);
        $converted = Str_replace(' ', '', $converted);
        return (int)$converted;
	}
	
	public function getAccountToInt():int{

        return $this->toInt($this->account);
    }
	
	/**
    * conta o númenro de digitos
    * @param int $number
    * @return int quantidade de digitos de um número
    */
    protected function numberDigits(int $number):int
    {
        $parameters = 10;
        $frags = 0;
        while ($number >= 1) {
            $tmp = $number % $parameters;
            $number = ($number - $tmp) / 10;
            $frags = $frags + 1;
        }
        return $frags;
    }
	
	
	
    abstract public function validate():bool;
    abstract public function getAccountFormatted():string;
	abstract public function getAgencyFormatted():string;
}
