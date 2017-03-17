<?php

class Custom_Session_SaveHandler_Redis extends Predis\Session\Handler implements Zend_Session_SaveHandler_Interface
{

    public function __construct(array $options)
    {
        $client = new Predis\Client($options['sentinels'], $options['options']);
        parent::__construct($client);
    }

}
