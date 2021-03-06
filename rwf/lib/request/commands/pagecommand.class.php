<?php

namespace RWF\Request\Commands;

//Imports
use RWF\Request\AbstractCommand;
use RWF\Core\RWF;

/**
 * Seiten Anfrage
 * 
 * @author     Oliver Kleditzsch
 * @copyright  Copyright (c) 2014, Oliver Kleditzsch
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @since      2.0.0-0
 * @version    2.0.0-0
 */
abstract class PageCommand extends AbstractCommand {

    /**
     * Template
     * 
     * @var String
     */
    protected $template = '';
    
    /**
     * Template Objekt
     * 
     * @var \RWF\Template\Template 
     */
    protected $templateObject = null;
    
    /**
     * fuehrt das Kommando aus
     */
    protected function executeCommand() {
        
        //Template Objekt in Objekteigenschaft laden
        if($this->template != '') {
            
            $this->templateObject = RWF::getTemplate();
        }
        
        $this->processData();
        $this->fetch();
    }
    
    /**
     * Daten verarbeiten
     */
    public abstract function processData();
    
    /**
     * Seite in das Antwortobjekt schreiben
     */
    public function fetch() {
        
        //wenn Template angegeben Template verarbeiten
        if($this->template != '') {
            
            $this->response->setBody($this->templateObject->fetchString($this->template));
        }
    }
}
