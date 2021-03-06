<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_cpanel
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;

$user = JFactory::getUser();
?>

<div class="quickicons-container">
	<?php $iconmodules = JModuleHelper::getModules('icon');
	if ($iconmodules) : ?>
		<div class="col-md-12">
			<?php
			// Display the submenu position modules
			foreach ($iconmodules as $iconmodule)
			{
				echo JModuleHelper::renderModule($iconmodule);
			}
			?>
		</div>
	<?php endif; ?>
</div>
<div class="row">

	<?php
	$cols = 0;
	foreach ($this->modules as $module)
	{
		// Get module parameters
		$params = new Registry;
		$params->loadString($module->params);
		$bootstrapSize = $params->get('bootstrap_size', 6);

		$cols += $bootstrapSize;
		if ($cols > 12)
		{
			echo '</div><div class="row">';
			$cols = $bootstrapSize;
		}

		echo JModuleHelper::renderModule($module, array('style' => 'well'));
	}
	?>
</div>
