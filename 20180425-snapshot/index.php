<?
class template { 
	var $data;
	function template ($file) {
		$this->data = file_get_contents($file) or trigger_error("Unable to open $file");
	}

	function replace($search, $replace) { // replaces fields with data
		$this->data = str_replace($search, $replace, $this->data);
	}
	
	function compile() {
		$this->data = eval("?>".$this->data."<?");
	}
	
	function getData() { 
		return $this->data;
	}
}
if($_GET['action']) 
$action = $_GET['action'].".php";
else
$action = "home.php";

include "seo.php";

$action = str_replace("..","",$action);
$action = str_replace("/","",$action);
$obj = new template("woodcreek.php");
if(substr($action,strlen($action)-3,3) == "txt")
$obj->replace("%body%",nl2br(file_get_contents("$action")));
else
$obj->replace("%body%",file_get_contents("$action"));


$obj->replace("%description%",$description);
$obj->replace("%keywords%",$keywords);
$obj->replace("%title%",$title);
$obj->compile();
echo $obj->getData();
?>