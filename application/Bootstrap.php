<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initSession()
    {
        $sentinels = ['tcp://192.168.33.10:26379'];
        $options = [
            'replication' => 'sentinel',
            'service' => 'redismaster',
            'parameters' => [
                'password' => 'foobared',
            ],
        ];

        $saveHandler = new Custom_Session_SaveHandler_Redis(array(
            'sentinels' => $sentinels,
            'options' => $options,
        ));
        Zend_Session::setSaveHandler($saveHandler);
    }
}

