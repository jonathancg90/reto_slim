<?php
namespace middlewares;


class HttpAuth extends \Slim\Middleware
{
	protected $username;
	protected $password;
	protected $realm;

	public function __construct($realm = 'Protected Area')
    {
        $this->realm = $realm;
    }

    public function deny_access() {
        $res = $this->app->response();
        $res->status(401);
    }

    public function authenticate($username, $password) {
        if(!ctype_alnum($username))
            return false;
         
        if(isset($username) && isset($password)) {
            $password = crypt($password);
            // Check database here with $username and $password
            return true;
        }
        else
            return false;
    }

    public function call()
    {
    	$req = $this->app->request();
        $res = $this->app->response();

        if($this->authenticate('jonathan', 'carrasco')){
        	$this->next->call();
        } else {
        	$this->deny_access();
        }

    }

}