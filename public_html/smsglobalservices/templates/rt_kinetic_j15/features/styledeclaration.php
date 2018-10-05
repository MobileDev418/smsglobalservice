<?php
/**
 * @package		Gantry Template Framework - RocketTheme
 * @version		1.5.1 February 4, 2010
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');

class GantryFeatureStyleDeclaration extends GantryFeature {
    var $_feature_name = 'styledeclaration';

    function isEnabled() {
        global $gantry;
        $menu_enabled = $this->get('enabled');

        if (1 == (int)$menu_enabled) return true;
        return false;
    }

	function init() {
        global $gantry;

		//inline css for dynamic stuff
		$css = '#rt-main-surround ul.menu li.active > a, #rt-main-surround ul.menu li.active > .separator, #rt-main-surround ul.menu li.active > .item, h2.title span, #rt-submenu ul.menu li.active > .item, #rt-submenu .nopill ul.menu li > .item:hover, .menutop li.root:hover > .item, .menutop li.root.f-mainparent-itemfocus > .item, .menu-type-splitmenu .menutop li:hover .item {color:'.$gantry->get('linkcolor').';}'."\n";
		
        $css .= 'a, body .menutop .nolink, #rt-main-surround ul.menu a:hover, #rt-main-surround ul.menu .separator:hover, #rt-main-surround ul.menu .item:hover {color:'.$gantry->get('linkcolor').';}';



        $gantry->addInlineStyle($css);

		//style stuff
        $gantry->addStyle($gantry->get('cssstyle').".css");

	}

}