<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        Zend_Session::start();
        $this->view->sessionId = Zend_Session::getId();

    }
}
