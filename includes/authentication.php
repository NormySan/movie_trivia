<?php

//Return the user level
// 1   - Admin
// 2   - User
// 0   - Username/Password is Empty
// -1  - UnAuthorised
function checkUserLevel($formArr=[])
{
	
	//filter_var($formData['username'], FILTER_SANITIZE_STRING);
	//filter_var($formData['password'], FILTER_SANITIZE_STRING);
        print('asddsa');
	if(count($formArr))
	{

		$secureData=getUserData($formArr['username']);
		$userInput=$formArr['username'];
		$passwordInput = $formArr['password'];
	}
	elseif(isset($_SESSION['user']))
	{
		
		$secureData=getUserData($_SESSION['user']['userName']);
		$userInput=$_SESSION['user']['userName'];
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
									'userName'  => $secureData['username'],
									'password'  => $secureData['password'],
									'highscore' => $secureData['highscore'],
									'lastLogin' => $secureData['lastlogin']);
			
			return (int)$secureData['userlevel'];
		}
	}

	return -1;
}


