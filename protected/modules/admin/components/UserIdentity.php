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
	public function authenticate()
	{
		
		
		$find_user = Users::model()->with( array('site' => array('condition' => '(id_site=0 or id_site = :id_site)', 'params'=>array('id_site'=>Yii::app()->controller->id_site))) )->find( array("condition"=>"login = :username and password = :password and t.status=1","params"=>array(':username'=>$this->username,':password'=>md5($this->password) ) ) );
		
		
		
		
		
		if(!is_object($find_user))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{	
			 $fnc = new Fnc;
			 $domains = $fnc->returnAvailableDomains($find_user->site->id_site);
			 
			 $sites_user = Users::model()->with( 'sites' )->findByPk($find_user->id);
			
			
			$array_avail_site = CHtml::listData($sites_user->sites, 'id_site', 'id_site');
			
			if(count($array_avail_site) == 1 and reset($array_avail_site) ==0 )
				$array_avail_site = array( 1=>1, 2=>2, 3=>3 );
			
			
		
			 $this->setState('id_site', $find_user->site->id_site);
			 $this->setState('username', $find_user->login);
			 $this->setState('currentSiteId', Yii::app()->controller->id_site);
			 $this->setState('currentSite', $domains[Yii::app()->controller->id_site]);	
			 $this->setState('avail_sites', $array_avail_site);	
			 
			 
			 $this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}