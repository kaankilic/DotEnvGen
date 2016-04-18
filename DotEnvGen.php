<?php 
class DotEnvGen{
	const TargetFile = ".env"; 
	const ExampleFile = ".env.example";
	protected $Fields;
	protected $Response;

	public function __construct(){

	}
	public function parseExample(){
		if (file_exists(self::ExampleFile)) {
			$handle = fopen(self::ExampleFile, "r");
			if ($handle) {
			    while (($line = fgets($handle)) !== false) {
			    	if (strpos($line,"=")!==false) {
				    	$Split = explode("=",$line);
				        $this->setField(trim($Split[0]),trim($Split[1]));
			    	}
			    }
			    fclose($handle);
			}
		}
	}
	public function getFields(){
		return $this->Fields;
	}

	public function setFields($Fields){
		$this->Fields = $Fields;
	}
	public function getField($Key){
		return $this->Fields[$Key];
	}
	public function setField($Key,$Value){
		return $this->Fields[$Key] = $Value;
	}
	public function getResponse(){
		return $this->Response;
	}
	public function setResponse($Response){
		$this->Response .= $Response;
	}
	public function validateContent(){}

	public function createEnv($OtherFile=false){
		$i = 0;
		$FullFilePath = self::TargetFile;
		if ($OtherFile!=false) {
			$FullFilePath = $OtherFile;
		}
		$file = fopen($FullFilePath, 'w');
		foreach ($this->getFields() as $Key => $Field){
			$Line = $Key."=".$Field."\n";
		    fwrite($file, $Line);
		    $this->setResponse($Line);
		}
		fclose($file);
	}

}
$n = new DotEnvGen();
$n->parseExample();
$n->setField("APP_ENV","production");
$n->setField("APP_DEBUG","false");
$n->setField("DB_HOST","localhost");
$n->setField("DB_PORT","3306");
$n->setField("DB_DATABASE","homestead");
$n->setField("DB_USERNAME","homestead");
$n->setField("DB_PASSWORD","homestead");
$n->setField("MAIL_DRIVER","homestead");
$n->setField("MAIL_HOST","homestead");
$n->setField("MAIL_PORT","homestead");
$n->setField("MAIL_USERNAME","homestead");
$n->setField("MAIL_PASSWORD","homestead");
$n->setField("MAIL_ENCRYPTION","homestead");
$n->createEnv(".env_1");
?>