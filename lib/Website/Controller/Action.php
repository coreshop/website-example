<?php

namespace Website\Controller;

use CoreShop\Model\Country;
use CoreShop\Plugin;
use Pimcore\Controller\Action\Frontend;

class Action extends Frontend {
	
	public function init () {
        parent::init();
        
		if(\Zend_Registry::isRegistered("Zend_Locale")) {
            $locale = \Zend_Registry::get("Zend_Locale");
        } else {
            $locale = new \Zend_Locale($this->getParam("lang", "en"));
            \Zend_Registry::set("Zend_Locale", $locale);
        }

        $this->view->language = (string) $locale;
        $this->language = (string) $locale;

        $this->view->headTitle()->setSeparator(" " . ("|") . " ");
    }
}
