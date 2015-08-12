<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	 
	public function authenticate()
	{
	/* 	$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		//$model = CUsers::model()->findByAttributes(array('username'=>$this->ID));
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode; */
		
		$record = User::model()->findByAttributes(array('LOGIN' => $this->username));
		
		if($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
		elseif($record->PASSWORD != $this->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id = $record->ID;
			
			if($record->ID_PROFILE_FLANCE 
				AND $record->ID_PROFILE_CUSTOMER
				AND $record->ID_PROFILE_ACTIVE
				)
				$this->setState('ID_PROFILE_ACTIVE', $record->ID_PROFILE_ACTIVE);
				
			$this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}

	public function getId()
    {
        return $this->_id;
    }
} 