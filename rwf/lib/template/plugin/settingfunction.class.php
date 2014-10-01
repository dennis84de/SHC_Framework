<?php

namespace RWF\Template\Plugin;

//Imports
use RWF\Template\TemplateFunction;
use RWF\Template\Template;
use RWF\Core\RWF;
use RWF\Util\String;

/**
 * gibt den Wert einer Einstellung zurueck
 * 
 * @author     Oliver Kleditzsch
 * @copyright  Copyright (c) 2014, Oliver Kleditzsch
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @since      2.0.0-0
 * @version    2.0.0-0
 */
class SettingFunction implements TemplateFunction {
    
    /**
     * Template Funktion
     * 
     * @param  Array                  $value Werte
     * @param  \RWF\Template\Template $tpl   Template Objekt
     * @return String
     */
    public static function execute(array $value, Template $tpl) {
        
        if(isset($value[1]) && $value[1] == 1) {
            
            return String::encodeHTML(RWF::getSetting($value[0]));
        }
        return RWF::getSetting($value[0]);
    }
}
