<?php
/**
 * @version $Id: modules.php 5556 2006-10-23 19:56:02Z Jinx $
 * @package Joomla
 * @copyright Copyright (C) 2005 - 2006 Open Source Matters. All rights reserved.
 * @license GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a slider
 */

function modChrome_submenu($module, &$params, &$attribs)
{
	global $Itemid, $splitmenu_col;
	
	$pos = str_replace("col", "", $splitmenu_col);
	
	$start	= $params->get('startLevel');
	
	$tabmenu = &JSite::getMenu();
	$item = $tabmenu->getItem($Itemid);
		
    $document	= &JFactory::getDocument();
   	$nModules = $document->countModules($module->position);
   	$sortables_modules = ($document->params->get("sortableElementsModules", 1)  == 0) ? false : true;
   
   if ($document->countModules($pos) > 1 && $sortables_modules) $handle = '<div class="module-handle"></div>'; 
   else $handle = "";
	
	if (isset($item)) {
		$tparent = $tabmenu->getItem($item->parent);
		$menuname = "";

	    	while ($tparent != null) {
	    		$item = $tabmenu->getItem($item->parent);
	    		if ($tparent->parent == $start-1) break;
				$tparent = $tabmenu->getItem($item->parent);
				
	    	}
	    	if (!empty ($module->content) && strlen($module->content) > 40) { ?>
				<div class="<?php echo $params->get('moduleclass_sfx'); ?> <?php echo $pos; ?>:<?php echo $module->id; ?>">
					<div class="side-mod">
						<div class="module-header"><div class="module-header2"><div class="module-header3"><h3 class="module-title"><?php echo $item->name; ?> Menu</h3><?php echo $handle; ?></div></div></div>
						<div class="module">
							<?php echo $module->content; ?>
						</div>
					</div>
				</div>
	    	<?php 
		    }
	}
}

function modChrome_search($module, &$params, &$attribs)
{
    	
	if (!empty ($module->content)) : ?>
	<div class="<?php echo $params->get('moduleclass_sfx'); ?> <?php echo $module->position; ?>:<?php echo $module->id; ?>">
		<div id="searchmod-surround">
			<div class="searchmod-top"></div>
			<div class="searchmod-main">
				<?php if ($module->showtitle != 0) : ?>
				<h3><?php echo $module->title; ?></h3>
				<?php endif; ?>
				<div id="searchmod">
					<div class="module">
						<?php echo $module->content; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;
}

function modChrome_main($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
	
	<?php 
		$document	= &JFactory::getDocument();
		$nModules = $document->countModules($module->position);
		$sortables_modules = ($document->params->get("sortableElementsModules", 1)  == 0) ? false : true;
		
		if ($document->countModules($module->position) > 1 && $sortables_modules) $handle = '<div class="module-handle"></div>'; 
		else $handle = "";
	?>
	
	<div class="<?php echo $params->get('moduleclass_sfx'); ?> <?php echo $module->position; ?>:<?php echo $module->id; ?>">
		<div class="moduletable">
			<?php if ($module->showtitle != 0) : ?>
			<div class="module-header"><div class="module-header2"><div class="module-header3"><h3 class="module-title"><?php echo $module->title; ?> </h3><?php echo $handle; ?></div></div></div>
			<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	</div>
	<?php endif;
}

function modChrome_bottom($module, &$params, &$attribs)
{
    	
	if (!empty ($module->content)) : ?>
	<div class="<?php echo $params->get('moduleclass_sfx'); ?> <?php echo $module->position; ?>:<?php echo $module->id; ?>">
		<div class="moduletable">
			<?php if ($module->showtitle != 0) : ?>
			<h3><?php echo $module->title; ?></h3>
			<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	</div>
	<?php endif;
}

function modChrome_sidebar($module, &$params, &$attribs)
{
    	
	if (!empty ($module->content)) : ?>
	
	<?php 
		$document	= &JFactory::getDocument();
		$nModules = $document->countModules($module->position);
		$sortables_modules = ($document->params->get("sortableElementsModules", 1)  == 0) ? false : true;
		
		if ($document->countModules($module->position) > 1 && $sortables_modules) $handle = '<div class="module-handle"></div>'; 
		else $handle = "";
	?>
	
	<div class="<?php echo $params->get('moduleclass_sfx'); ?> <?php echo $module->position; ?>:<?php echo $module->id; ?>">
		<div class="side-mod">
			<?php if ($module->showtitle != 0) : ?>
			<div class="module-header"><div class="module-header2"><div class="module-header3"><h3 class="module-title"><?php echo $module->title; ?></h3><?php echo $handle; ?></div></div></div>
			<?php endif; ?>
			<div class="module">
				<?php echo $module->content; ?>
			</div>
		</div>
	</div>
	<?php endif;
}

function modChrome_inset($module, &$params, &$attribs)
{
    	
	if (!empty ($module->content)) : ?>
	<div class="<?php echo $params->get('moduleclass_sfx'); ?> <?php echo $module->position; ?>:<?php echo $module->id; ?>">
		<div class="inset-mod">
			<div class="inset-mod2">
				<div class="module">
					<?php if ($module->showtitle != 0) : ?>
					<h3 class="module-title"><span><?php echo $module->title; ?></span></h3>
					<?php endif; ?>
					<?php echo $module->content; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif;
}

?>