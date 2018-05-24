<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/20/2018
 * Time: 10:32 AM
 */

function logging($post, $action, $username, $table) {
    
	$time = date('h:i:sa d-m-Y',time());
	$name = date('M Y');
	$file = fopen('./log/'.$name.'.txt', 'a');
	
	foreach ($post as $key=>$row) {
		$string .= "[" . $key . "] => ".$row.";";
    }
			
	$data = $time.' - '.$username.' - '.$action.' - '.$string.' - '.'to '.$table."\r\n";
	
	fwrite($file, $data);
	fclose($file);
}