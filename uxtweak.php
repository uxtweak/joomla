<?php
/**
 *
 * @version		1.0.0
 * @package		Uxtweak
 * @subpackage  Uxtweak
 * @copyright	2021 Tools for Uxtweak, www.uxtweak.com/
 * @license		GNU GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin');

class plgSystemUxtweak extends JPlugin {

	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
	}

	function onAfterRender() {
		// don't run if we are in the index.php or we are not in an HTML view
		if(strpos($_SERVER["PHP_SELF"], "index.php") === false || JRequest::getVar('format','html') != 'html'){
			return;
			}
		
		// Get the Body of the HTML - have to do this twice to get the HTML
		$buffer = JResponse::getBody();
		$buffer = JResponse::getBody();
		// Get our Container ID and Track Admin parameter
		$uxtweak_code = $this->params->get('uxtweak_code','');
		
		$buffer = preg_replace ("/(<head(?!er).*>)/i", "$1"."\n".$uxtweak_code, $buffer, 1);
				
		JResponse::setBody($buffer);
		
		return true;
		}
	}