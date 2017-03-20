<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initSession()
    {
        if ( ! isset($this->_options['resources']['session']['savehandler']['class'])) {
            return;
        }

        $saveHandlerOptions = $this->_options['resources']['session']['savehandler'];
        $class = $saveHandlerOptions['class'];
        $options = $saveHandlerOptions['options'];

        $saveHandler = new $class($options);
        Zend_Session::setSaveHandler($saveHandler);
    }
}

