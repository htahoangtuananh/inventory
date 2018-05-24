<?php

function can($permission, $permission_array){
	if(in_array($permission, $permission_array)){
		
		return true;
	}
	
	return false;
}

?>