<?php

function decrypt($str, $key){
 	$result = '';
    for ($i = 0; $i < strlen($str); $i++) {
        $tmp = $str[$i];
        for ($j = 0; $j < strlen($key); $j++) {
            $tmp = chr(ord($tmp) ^ ord($key[$j]));
        }
        $result .= $tmp;
    }
    return $result;
}
function convert_content($content, $key){
	$content = decrypt($content, $key);
	$result  = array();
	if(strpos($content,'|') !== false){
		$input = explode('|',$content);		
		foreach($input as $param){
			if(strpos($param,':') !== false){
				list($key,$value) = explode(':',$param);
				$result[$key] = $value;
			}
		}		
	}
	return $result;	
}

$key = 'Mateus7:1-29';
$content = '';

if(isset($_POST['content'])){
	$content = $_POST['content'];
	$result  = convert_content($content,$key);	
	echo '<pre>';
		print_r($result);
	echo '</pre>';	
}







