<?php

class Custom_Session_SaveHandler_Redis extends Predis\Session\Handler implements Zend_Session_SaveHandler_Interface
{
    /**
     * Custom_Session_SaveHandler_Redis constructor.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $client = new Predis\Client($options['sentinels'], $options['client']);
        parent::__construct($client);
    }

}
