<?php
/**
 * @package        mod_qlqltiptap
 * @copyright    Copyright (C) 2020 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class modQltiptapHelper
{
    public $params;

    /**
     * modQltiptapHelper constructor.
     * @param $module
     * @param $params
     */
    function __construct($module, $params)
    {
        $this->module = $module;
        $this->params = $params;
    }

    /**
     *
     */
    public function setStyles()
    {
        $style = [];
        $style[] = '#qltiptap' . $this->module->id . ' ';
        $style[] = '{';
        //$style[]='color:'.$this->params->get('contentColor','#666'.';');
        if ('' != $this->params->get('generalPic', '')) {
            $style[] = 'background:url(\'/' . $this->params->get('generalPic', '') . '\');';
        }
        if ('' != $this->params->get('generalBackground', '')) {
            $style[] = 'background-color:' . $this->params->get('generalBackground', '') . ';';
        }
        $style[] = 'width:' . ($this->params->get('contentWidth', 250) + $this->params->get('tabWidth', 50)) . 'px;';
        $style[] = 'top:' . $this->params->get('positionVertical', 200) . 'px;';
        $style[] = '}';
        $style[] = '#qltiptap' . $this->module->id . ':hover ';
        $style[] = '{';
        if ('' != $this->params->get('generalPicHover', '')) {
            $style[] = 'background:url(\'/' . $this->params->get('generalPicHover', '') . '\');';
        }
        if ('' != $this->params->get('generalBackgroundHover', '')) {
            $style[] = 'background-color:' . $this->params->get('generalBackgroundHover', '') . ';';
        }
        $style[] = '}';
        $style[] = '#qltiptap' . $this->module->id . '.right';
        $style[] = '{';
        $style[] = 'margin-right:-' . $this->params->get('contentWidth', 250) . 'px;';
        $style[] = '}';
        $style[] = '#qltiptap' . $this->module->id . '.left';
        $style[] = '{';
        $style[] = 'margin-left:-' . $this->params->get('contentWidth', 250) . 'px;';
        $style[] = '}';
        $style[] = '#qltiptap' . $this->module->id . ' .tab';
        $style[] = '{';
        if (-1 != $this->params->get('tabWidth', -1)) {
            $style[] = 'width:' . $this->params->get('tabWidth', 50) . 'px;';
        }
        if (-1 != $this->params->get('tabHeight', -1)) {
            $style[] = 'height:' . $this->params->get('tabHeight', -1) . 'px;';
        }
        $style[] = 'padding:' . $this->params->get('tabPadding', 10) . 'px;';
        $style[] = 'color:' . $this->params->get('tabColor', '#fff') . ';';
        if (1 == $this->params->get('tabUseBackground', 1)) {
            $style[] = 'background:' . $this->params->get('tabBackground') . ';';
        }
        $style[] = '}';
        if (1 == $this->params->get('tabUseBackground', 1)) {
            $style[] = '#qltiptap' . $this->module->id . ':hover .tab { background:' . $this->params->get('tabBackgroundHover') . ';}';
        }
        $style[] = '#qltiptap' . $this->module->id . ' .content';
        $style[] = '{';
        if (-1 != $this->params->get('contentWidth', -1)) {
            $style[] = 'width:' . $this->params->get('contentWidth', 250) . 'px;';
        }
        if (-1 != $this->params->get('contentHeight', -1)) {
            $style[] = 'height:' . $this->params->get('contentHeight', -1) . 'px;';
        }
        $style[] = 'padding:' . $this->params->get('contentPadding', 10) . 'px;';
        $style[] = 'color:' . $this->params->get('contentColor', '#666') . ';';
        $style[] = 'background:' . $this->params->get('contentBackground') . ';';
        $style[] = '}';
        JFactory::getDocument()->addStyleDeclaration(implode("\n", $style));
    }

    /**
     *
     */
    public function setJavascript()
    {
        $script = [];
        $script[] = 'var qltiptap' . $this->module->id . 'pic=\'/' . $this->params->get('tabPic', '') . '\';';
        $script[] = 'var qltiptap' . $this->module->id . 'picHover=false;';
        if ('' != $this->params->get('tabPicHover', '')) {
            $script[] = 'var qltiptap' . $this->module->id . 'picHover=\'/' . $this->params->get('tabPicHover', '') . '\';';
        }
        JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));
    }
}
