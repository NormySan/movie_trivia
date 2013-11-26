<?php

//Return the user level
// 1   - Admin
// 2   - User
// 0   - Username/Password is Empty
// -1  - UnAuthorised
function checkUserLevel($username='', $password='')
{
	if(!$username OR !$password)
	{
		return -1;
	}

	return -1;
}


