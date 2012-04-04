<?php
/**
 * @copyright	Copyright (C) 2012 Square One CMS. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Square One Cache Plugin
 *
 * @package		SquareOne.Plugin
 * @subpackage	System.squareone
 */
class plgSystemSquareone extends JPlugin
{	
	private $buffer;
	
	public function onAfterRender()
	{
		$this->buffer = JResponse::getBody();
		
		// Change Joomla strings to Square One 
		$this->joomlaToSquareone();
		
		JResponse::setBody($this->buffer);
	}
	
	private function joomlaToSquareone()
	{
		
		$this->buffer = preg_replace('/joomla(?:!)/i', 'Square One', $this->buffer);
		$this->buffer = preg_replace('/_joomla_/i', 'Joomla', $this->buffer);
	}
}