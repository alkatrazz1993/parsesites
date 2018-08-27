<?php
class authComponent {

    public static function auth($login, $password)
    {	
		$OriginalhashArray = Authorization::selectByhash();
		if(!empty($OriginalhashArray))
		{
			$usersCollection = array();
			foreach($OriginalhashArray as $key => $Originalhash)
			{						
				array_push($usersCollection, array($Originalhash['login'], $Originalhash['hash']));				
				foreach($usersCollection as $userKey => $user)
				{
					if($user[0] == $login && $user[1] == $Originalhash['hash'])
					{				  				  
						if(password_verify($_POST['password'], $Originalhash['hash']))
						{	
							$_SESSION['login']=$login;						
							$_SESSION['password']=$Originalhash['hash'];
							return true;
						}
					}
				}						
			}
		}
    return false;
	}

	
	public static function checkIn()
    {
        if(isset($_SESSION['login']))
		{
             return true;
        } 
		else 
		{
            return false;
        }
    }
}