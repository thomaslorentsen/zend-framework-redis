<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        Zend_Session::start();
        $this->view->sessionId = Zend_Session::getId();

        $this->view->saveHandler = $this->getSaveHandlerName();
    }

    private function getSaveHandlerName()
    {
        $saveHandler = Zend_Session::getSaveHandler();
        if (null === $saveHandler) {
            return 'None';
        }
        return get_class($saveHandler);
    }
}
