<?php

//Return the user level
// 1   - Admin
// 2   - User
// 0   - Username/Password is Empty
// -1  - UnAuthorised
function checkUserLevel($formArr=[])
{
	

        
	if(count($formArr))
	{
		filter_var($formArr['username'], FILTER_SANITIZE_STRING);
		filter_var($formArr['password'], FILTER_SANITIZE_STRING);
		

		$secureData=getUserData($formArr['username']);
		$userInput=$formArr['username'];
		$passwordInput = $formArr['password'];
	}
	elseif(isset($_SESSION['user']))
	{
		
		$secureData=getUserData($_SESSION['user']['username']);
		$userInput=$_SESSION['user']['username'];
		$passwordInput = $_SESSION['user']['password'];
	}
	else
	{
		return 0;
	}
		
	if(count($secureData)>5)
	{
		
		if(($secureData['username'] === $userInput) && ($secureData['password'] === $passwordInput))
		{
			
			$_SESSION['user']=array('userID'    => $secureData['userid'],
									'userLevel' => $secureData['userlevel'],
									'username'  => $secureData['username'],
									'password'  => $secureData['password'],
									'highscore' => $secureData['highscore'],
									'lastLogin' => $secureData['lastlogin']);
			
			return (int)$secureData['userlevel'];
		}
	}

	return -1;
}


