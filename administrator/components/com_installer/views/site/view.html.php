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
class InstallerViewSite extends InstallerViewDefault
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
        
        $distro = $this->getModel()->getDistro(JRequest::getVar('id', 0, '', 'int'));
        
        $this->assign('distro', $distro);

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
        
        JToolBarHelper::custom('site.install', 'upload', 'upload', 'JTOOLBAR_INSTALL', true, false);
		JToolBarHelper::custom('site.find', 'refresh', 'refresh', 'COM_INSTALLER_TOOLBAR_FIND_EXTENSIONS',false,false);
		JToolBarHelper::custom('site.purge', 'purge', 'purge', 'JTOOLBAR_PURGE_CACHE', false,false);
		JToolBarHelper::divider();
		parent::addToolbar();
		JToolBarHelper::help('JHELP_EXTENSIONS_EXTENSION_MANAGER_UPDATE');
        JToolBarHelper::title(JText::sprintf('COM_INSTALLER_TITLE_SITE', $this->distro->name), 'install');
        $document = JFactory::getDocument();
		$document->setTitle(JText::sprintf('COM_INSTALLER_TITLE_' . $this->getName(), $this->distro->name));
	}
}
