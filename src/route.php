<?php
function getRoute():string{
	if(isset($_REQUEST['url'])){
		$url=$_REQUEST['url'];
	}else{
		$url="login";	
		}
	switch($url){
		case 'login':
			return 'login';
		case 'register':
                        return 'register';
         	case 'regaction':
                        return 'regaction';
		case 'logaction':
                        return 'logaction';
		case 'logout':
						return 'logout';
			case 'dashboard':
							return 'dashboard';
		default:
			return 'home';

			}
}
