<?php
/**
 * Joomla! 1.5 component adhonep
 *
 * @version $Id: adhonep.php 2009-10-08 17:53:58 svn $
 * @author DevHouse.com.br
 * @package Joomla
 * @subpackage adhonep
 * @license Copyright (c) 2009 - All Rights Reserved
 *
 * Executa todas as funções específicas do sistema Adhonep
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Initialize the controller
$controller = new AdhonepController();
$controller->execute( null );

// Redirect if set by the controller
$controller->redirect();
?>