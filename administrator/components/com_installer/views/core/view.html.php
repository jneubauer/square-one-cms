<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

include_once dirname(__FILE__).'/../default/view.php';

/**
 * Extension Manager Update View
 *
 * @package		Joomla.Administrator
 * @subpackage	com_installer
 * @since		1.6
 */
class InstallerViewCore extends InstallerViewDefault
{
	/**
	 * @since	1.6
	 */
	function display($tpl=null)
	{
		// Get data from the model
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		$paths = new stdClass();
		$paths->first = '';

		$this->assignRef('paths', $paths);

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		$canDo	= InstallerHelper::getActions();

        JToolBarHelper::custom('core.install', 'upload', 'upload', 'JTOOLBAR_INSTALL', true, false);
		JToolBarHelper::custom('core.find', 'refresh', 'refresh', 'COM_INSTALLER_TOOLBAR_FIND_EXTENSIONS',false,false);
		JToolBarHelper::custom('core.purge', 'purge', 'purge', 'JTOOLBAR_PURGE_CACHE', false,false);
		JToolBarHelper::divider();
		parent::addToolbar();
		JToolBarHelper::help('JHELP_EXTENSIONS_EXTENSION_MANAGER_UPDATE');
	}
}