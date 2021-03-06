<?php

class Model {

    function __construct() {
       $this->db = Database::getInstance();

        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
        $this->user = new User();
        //appointment dates
        $come = new DateTime('now');
        $this->today = $come->format('Y-m-d H:i:s');
        //$come->add(new DateInterval('P2Y'));
        //$this->end_in_2yrs = $come->format('Y-m-d');

    }

    function check_status(){

        if(Session::exists($this->_sessionName) && Cookie::exists($this->_cookieName)){
              $user = Session::get($this->_sessionName);
            $cookie = json_decode(Cookie::get($this->_cookieName));
            $expiry = $cookie->expiry;
            $hash = $cookie->hash;
            $hashCheck = $this->db->fetch_exact('user_sessions','user_id',$user);
            if(($hash === $hashCheck['hash']) && (time() < $expiry)  ){
                Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                //then just put in a logged in state
                    return $hashCheck['user_id'];
            }else{
                return false;
            }
        }
        return false;
    }





}
