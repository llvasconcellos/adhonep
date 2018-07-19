<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'YOURBASEPATH', dirname(__FILE__) );

require( YOURBASEPATH.DS."rt_styleswitcher.php");
JHTML::_( 'behavior.mootools' );
global $template_real_width, $leftcolumn_width, $rightcolumn_width, $tstyle;
global $js_compatibility, $menu_rows_per_column, $menu_columns, $menu_multicollevel;
global $showcase_block, $showcase2_block, $showcase3_block, $user1_block, $user2_block, $user3_block, $mainbody_block, $side_block, $user4_block, $user5_block, $user6_block, $user7_block, $user8_block, $user9_block, $splitmenu_col, $frontpage_component;

$live_site        		= $mainframe->getCfg('live_site');
$template_path 			= $this->baseurl . '/templates/' .  $this->template;
$preset_style 			= $this->params->get("presetStyle", "style7");
$frontpage_component    = $this->params->get("enableFrontpage", "show");
$enable_ie6warn         = ($this->params->get("enableIe6warn", 0)  == 0)?"false":"true";
$font_family            = $this->params->get("fontFamily", "affinity");
$enable_fontspans       = ($this->params->get("enableFontspans", 1)  == 0)?"false":"true";
$enable_inputstyle		= ($this->params->get("enableInputstyle", 1) == 0)?"false":"true";
$inputs_exclusion		= $this->params->get("inputsExclusion", "'.content_vote','#login-module'");
$template_width 		= $this->params->get("templateWidth", "959");
$leftcolumn_width		= $this->params->get("leftcolumnWidth", "210");
$rightcolumn_width		= $this->params->get("rightcolumnWidth", "260");
$leftinset_width		= $this->params->get("leftinsetWidth", "180");
$rightinset_width		= $this->params->get("rightinsetWidth", "180");
$splitmenu_col			= $this->params->get("splitmenuCol", "rightcol");
$menu_name 				= $this->params->get("menuName", "mainmenu");
$menu_type 				= $this->params->get("menuType", "moomenu");
$menu_rows_per_column   = $this->params->get("menuRowsPerColumn");
$menu_columns           = $this->params->get("menuColumns");
$menu_multicollevel     = $this->params->get("menuMultiColLevel", 1);
$default_font 			= $this->params->get("defaultFont", "default");
$show_date		 		= ($this->params->get("showDate", 1)  == 0)?"false":"true";
$clientside_date		= ($this->params->get("clientSideDate", 1) == 0)?"false":"true";
$show_logo		 		= ($this->params->get("showLogo", 1)  == 0)?"false":"true";
$show_logo_slogan		= ($this->params->get("showLogoslogan", 1)  == 0)?"false":"true";
$logo_slogan 			= $this->params->get("logoSlogan", "Apr 09 Design");
$show_textsizer		 	= ($this->params->get("showTextsizer", 1)  == 0)?"false":"true";
$show_topbutton 		= ($this->params->get("showTopbutton", 1)  == 0)?"false":"true";
$show_copyright 		= ($this->params->get("showCopyright", 1)  == 0)?"false":"true";
$show_defaultsettings 	= ($this->params->get("showDefaultsettings", 1)  == 0)?"false":"true";
$thirdparty_styling		= ($this->params->get("thirdpartyStyling", 1)  == 0)?"false":"true";
$js_compatibility	 	= ($this->params->get("jsCompatibility", 0)  == 0)?"false":"true";

// Module Block Styles
$showcase_block			= $this->params->get("showcaseBlock", "light");
$showcase2_block		= $this->params->get("showcase2Block", "light");
$showcase3_block		= $this->params->get("showcase3Block", "light");
$user1_block			= $this->params->get("user1Block", "light");
$user2_block			= $this->params->get("user2Block", "light");
$user3_block			= $this->params->get("user3Block", "light");
$mainbody_block			= $this->params->get("mainbodyBlock", "light");
$side_block				= $this->params->get("sideBlock", "light");
$user4_block			= $this->params->get("user4Block", "light");
$user5_block			= $this->params->get("user5Block", "light");
$user6_block			= $this->params->get("user6Block", "light");
$user7_block			= $this->params->get("user7Block", "light");
$user8_block			= $this->params->get("user8Block", "light");
$user9_block			= $this->params->get("user9Block", "light");

// sortables options
$sortables		 		= ($this->params->get("sortableElements", 1)  == 0)?"false":"true";
$sortables_ghost 		= $this->params->get("sortableGhost", 1);
$sortables_opacity  	= $this->params->get("sortableOpacity", 0.5);
$sortables_radius	    = $this->params->get("sortableRadius", 16);

// sortables options vertical
$sortables_ver	 		= ($this->params->get("sortableElementsVer", 1)  == 0)?"false":"true";
$sortables_ghost_ver 	= $this->params->get("sortableGhostVer", 1);
$sortables_opacity_ver 	= $this->params->get("sortableOpacityVer", 0.5);
$sortables_radius_ver   = $this->params->get("sortableRadiusVer", 16);

// sortables options modules
$sortables_modules	 		= ($this->params->get("sortableElementsModules", 1)  == 0)?"false":"true";
$sortables_ghost_modules 	= $this->params->get("sortableGhostModules", 1);
$sortables_opacity_modules	= $this->params->get("sortableOpacityModules", 0.5);
$sortables_radius_modules	= $this->params->get("sortableRadiusModules", 16);


// moomenu options
$moo_bgiframe     		= ($this->params->get("moo_bgiframe'","0") == 0)?"false":"true";
$moo_delay       		= $this->params->get("moo_delay", "500");
$moo_duration    		= $this->params->get("moo_duration", "600");
$moo_fps          		= $this->params->get("moo_fps", "200");
$moo_transition   		= $this->params->get("moo_transition", "Sine.easeOut");

$moo_bg_enabled			= ($this->params->get("moo_bg_enabled","1") == 0)?"false":"true";
$moo_bg_over_duration		= $this->params->get("moo_bg_over_duration", "500");
$moo_bg_over_transition		= $this->params->get("moo_bg_over_transition", "Expo.easeOut");
$moo_bg_out_duration		= $this->params->get("moo_bg_out_duration", "600");
$moo_bg_out_transition		= $this->params->get("moo_bg_out_transition", "Sine.easeOut");

$moo_sub_enabled		= ($this->params->get("moo_sub_enabled","1") == 0)?"false":"true";
$moo_sub_opacity		= $this->params->get("moo_sub_opacity","0.95");
$moo_sub_over_duration		= $this->params->get("moo_sub_over_duration", "50");
$moo_sub_over_transition	= $this->params->get("moo_sub_over_transition", "Expo.easeOut");
$moo_sub_out_duration		= $this->params->get("moo_sub_out_duration", "600");
$moo_sub_out_transition		= $this->params->get("moo_sub_out_transition", "Sine.easeIn");
$moo_sub_offsets_top		= $this->params->get("moo_sub_offsets_top", "0");
$moo_sub_offsets_right		= $this->params->get("moo_sub_offsets_right", "1");
$moo_sub_offsets_bottom		= $this->params->get("moo_sub_offsets_bottom", "0");
$moo_sub_offsets_left		= $this->params->get("moo_sub_offsets_left", "1");
								
require(YOURBASEPATH . "/rt_styleloader.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
	<head>
		<jdoc:include type="head" />
		<?php
		require(YOURBASEPATH . DS . "rt_utils.php");
		require(YOURBASEPATH . DS . "rt_head_includes.php");
		require(YOURBASEPATH . DS . "rt_sectionrows.php");
		
		$section_rows = new sectionRows($this);
	?>
	</head>
	<body id="ff-<?php echo $fontfamily; ?>" class="<?php echo $fontstyle; ?> <?php echo $tstyle; ?> iehandle">
		<!--Begin Top Bar-->
		<?php if ($show_date == "true" or $show_textsizer == "true" or $this->countModules('top-left or login or top-right')): ?>
		<div id="top-bar">
			<div class="wrapper">
				<div class="top-bar-padding">
					<div class="topbar-strip">
						<?php if ($show_date == "true") : ?>
						<div class="date-block">
							<span class="date1"><?php $now = &JFactory::getDate(); echo $now->toFormat('%A'); ?></span>,
							<span class="date2"><?php $now = &JFactory::getDate(); echo $now->toFormat('%B'); ?></span>
							<span class="date3"><?php $now = &JFactory::getDate(); echo $now->toFormat('%d'); ?></span>,
							<span class="date4"><?php $now = &JFactory::getDate(); echo $now->toFormat('%Y'); ?></span>
						</div>
						<?php endif; ?>
						<?php if ($show_textsizer=="true") : ?>
						<div id="accessibility">
							<div id="buttons">
								<a href="<?php echo JROUTE::_($thisurl . "fontstyle=f-larger"); ?>" title="<?php echo JText::_('INC_FONT_SIZE'); ?>" class="large"><span class="button png">&nbsp;</span></a>
								<a href="<?php echo JROUTE::_($thisurl . "fontstyle=f-smaller"); ?>" title="<?php echo JText::_('DEC_FONT_SIZE'); ?>" class="small"><span class="button png">&nbsp;</span></a>
							</div>
							<div class="textsizer-desc"><?php echo JText::_('TEXT_SIZE'); ?></div>
						</div>
						<?php endif; ?>
						<?php if ($this->countModules('login')) : ?>
							<?php if ($user->guest) : ?>
							<a href="#" id="lock-button" rel="rokbox[240 210][module=login-module]"><span id="lock-icon" class="login"></span><span><?php echo JText::_('LOGIN'); ?></span></a>
							<?php else : ?>
							<a href="#" id="lock-button" rel="rokbox[240 210][module=login-module]"><span id="lock-icon"></span><span><?php echo JText::_('LOGOUT'); ?></span></a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<?php if ($this->countModules('top-left')) : ?>
					<div class="topbar-left-mod">
						<jdoc:include type="modules" name="top-left" style="xhtml" />
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('top-right')) : ?>
					<div class="topbar-right-mod">
						<jdoc:include type="modules" name="top-right" style="xhtml" />
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<!--End Top Bar-->
		<!--Begin Header-->
		<div id="header">
			<div id="header-overlay">
				<div class="wrapper">
					<?php if ($this->countModules('logo')) : ?>
					<div class="logo-module"><jdoc:include type="modules" name="logo" style="xhtml" /></div>
					<?php elseif ($show_logo == "true") : ?>
					<a href="<?php echo $this->baseurl; ?>" id="logo" class="png"></a>
					<?php endif; ?>
					<?php if ($this->countModules('search')) : ?>
					<jdoc:include type="modules" name="search" style="search" />
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!--End Header-->
		<div id="page-bg"><div id="page-bg2">
			<div class="wrapper">
				<!--Begin Horizontal Menu-->
				<?php if($mtype != "none") : ?>
				<div id="horiz-menu" class="<?php echo $mtype; ?>"><div id="horiz-menu2"><div id="horiz-menu3">
				<?php if($mtype != "module") : ?>
					<?php echo $topnav; ?>
				<?php else: ?>
					<jdoc:include type="modules" name="toolbar" style="none" />
				<?php endif; ?>
				<div class="clr"></div>
				</div></div></div>
				<?php endif; ?>
				<!--End Horizontal Menu-->
				<div id="vertical-sort">
				<?php
					
					echo $section_rows->render();
				
				?>
				</div>
			</div>
			<!--Begin Bottom Section-->
			<div id="bottom-bg">
				<div class="wrapper">
					<?php if ($this->countModules('bottom-menu')) : ?>
					<div id="bottom-menu"><div id="bottom-menu2"><div id="bottom-menu3"><div id="bottom-menu-overlay">
						<jdoc:include type="modules" name="bottom-menu" style="xhtml" />
					</div></div></div></div>
					<?php endif; ?>
					<?php if ($show_topbutton == "true") : ?>
					<div id="top-button"><a href="#" id="top-scroll" class="top-button-desc"><?php echo JText::_('TOP'); ?></a></div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ($show_copyright == "true" or $show_defaultsettings == "true" or $this->countModules('footer or bottom or bottom2 or bottom3')) : ?>
			<div id="bottom">
				<div class="wrapper">
					<?php $mClasses = modulesClasses('case7'); if ($this->countModules('bottom or bottom2 or bottom3')) : ?>
					<div id="bottommodules" class="spacer<?php echo $bottommod_width; ?>">
						<?php if ($this->countModules('bottom')) : ?>
						<div class="block <?php echo $mClasses['bottom'][0]; ?>">
							<jdoc:include type="modules" name="bottom" style="bottom" />
						</div>
						<?php endif; ?>
						<?php if ($this->countModules('bottom2')) : ?>
						<div class="block <?php echo $mClasses['bottom2'][0]; ?>">
							<jdoc:include type="modules" name="bottom2" style="bottom" />
						</div>
						<?php endif; ?>
						<?php if ($this->countModules('bottom3')) : ?>
						<div class="block <?php echo $mClasses['bottom3'][0]; ?>">
							<jdoc:include type="modules" name="bottom3" style="bottom" />
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if ($show_copyright == "true") : ?>
					<div class="copyright-block">
						<div id="copyright">
							&copy; <?php echo JText::_('COPYRIGHT'); ?>
						</div>
						<a href="http://www.rockettheme.com/" title="<?php echo JText::_('ROCKETTHEME_JTC'); ?>" id="rocket"></a>
					</div>
					<?php else: ?>
					<div class="footer-mod">
						<jdoc:include type="modules" name="footer" style="xhtml" />
					</div>
					<?php endif; ?>
					<?php if ($show_defaultsettings == "true") : ?>
					<a href="#" id="clear-cookies"><?php echo JText::_('DEFAULT_SETTINGS'); ?></a>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<!--End Bottom Section-->
		</div></div>
		<?php if ($this->countModules('debug')) : ?>
		<div id="debug-mod">
			<jdoc:include type="modules" name="debug" style="none" />
		</div>
		<?php endif; ?>
		<?php if ($this->countModules('login')) : ?>
		<div id="login-module">
			<?php if ($user->guest) : ?>
			<jdoc:include type="modules" name="login" style="xhtml" />
			<?php else : ?>
			<div class="logout">
				<jdoc:include type="modules" name="login" style="xhtml" />
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</body>
</html>