<?php
/**
 * @package        mod_qltiptap
 * @copyright    Copyright (C) 2020 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';
$obj_helper = new modQltiptapHelper($module, $params);
if (1 == $params->get('jquery', 0)) {
    JHtml::_('jquery.framework');
}
$obj_helper->setStyles();
$obj_helper->setJavascript();

require JModuleHelper::getLayoutPath('mod_qltiptap', $params->get('layout', 'default'));