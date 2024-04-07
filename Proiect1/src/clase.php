<?php
define('CAPTCHA_SESSION_VAR','CAPTCHA');

class Captcha
{
	static public function reset($k=NULL)
	{
		$_SESSION[CAPTCHA_SESSION_VAR] = NULL;
	}
	
	static public function getCaptcha()
	{
		if(!isset($_SESSION[CAPTCHA_SESSION_VAR]) || $_SESSION[CAPTCHA_SESSION_VAR]===NULL){
                    
			$chars="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                        $size = strlen( $chars );
                        $_SESSION[CAPTCHA_SESSION_VAR]="";
                        for( $i = 0; $i < 6; $i++ ) {
                        $str= $chars[ rand( 0, $size - 1 ) ];
                        $_SESSION[CAPTCHA_SESSION_VAR]=$_SESSION[CAPTCHA_SESSION_VAR].$str;
                        }
                        
                }
                return $_SESSION[CAPTCHA_SESSION_VAR];
        }
        
	static public function check($str)
	{
		return !empty($_SESSION[CAPTCHA_SESSION_VAR]) && $str==$_SESSION[CAPTCHA_SESSION_VAR];
	}
}

class utilizator
{
    public $user_type;
    public $username;
    
    public function __construct($k,$l)
    {
        $this->user_type = $k;
        $this->username = $l;
    }
    
    public function getPosition()
    {
        return $this->user_type;
    }
    
    public function getUser()
    {
        return $this->username;
    }
}

class angajati{
    public $nume;
    public $functie;
    
    //public function __construct() {
    //    $this->nume=nume;
    //   $this->functie=functie;
    //}
    
    public function getNume(){
        return $this->nume;
    }
    
    public function getFunctie(){
        return $this->functie;
    }
    
    public function setNume($name){
        return $this->nume= $name;
    }
    
    public function setFunctie($function){
        return $this->functie = $function;
    }
    
    public function afisareNume(){
        echo $this->nume;
    }
    
    public function afisareFunctie(){
        echo $this->functie;
    }
}

?>