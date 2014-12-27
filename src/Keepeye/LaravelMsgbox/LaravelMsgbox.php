<?php namespace Keepeye\LaravelMsgbox;

class LaravelMsgbox {

    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_ERROR = 'error';

    /**
     * Display a information page.
     * @param $msg
     * @param null $jumpUrl
     * @param null $timeout
     * @return \Illuminate\View\View
     */
    public function info($msg,$jumpUrl=null,$timeout=null)
    {
        return $this->show(self::TYPE_INFO,$msg,$jumpUrl,$timeout);
    }

    /**
     * Display a error page.
     * @param $msg
     * @param null $jumpUrl
     * @param null $timeout
     * @return \Illuminate\View\View
     */
    public function error($msg,$jumpUrl=null,$timeout=null)
    {
        return $this->show(self::TYPE_ERROR,$msg,$jumpUrl,$timeout);
    }

    /**
     * Display a success page.
     * @param $msg
     * @param null $jumpUrl
     * @param null $timeout
     * @return \Illuminate\View\View
     */
    public function success($msg,$jumpUrl=null,$timeout=null)
    {
        return $this->show(self::TYPE_SUCCESS,$msg,$jumpUrl,$timeout);
    }


    /**
     * According to the specified type to display.
     * @param $type
     * @param $msg
     * @param null $jumpUrl
     * @param null $timeout
     * @return \Illuminate\View\View
     */
    public function show($type,$msg,$jumpUrl=null,$timeout=null)
    {

        $data = array();
        $data['type'] = $type;
        $data['msg'] = $msg;
        $data['jumpUrl'] = $jumpUrl === null?\Request::server('HTTP_REFERER'):$jumpUrl;
        if(\Config::get('msgbox::auto_jump') != false){
            $data['timeout'] = $timeout === null?\Config::get('msgbox::default_timeout'):$timeout;
        }else{
            $data['timeout'] = 0;
        }

        return \View::make("msgbox::msg",$data);
    }
}