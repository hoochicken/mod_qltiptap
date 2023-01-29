<?php
/**
 * @package        mod_qltiptap
 * @copyright    Copyright (C) 2020 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
use Joomla\CMS\Factory;

defined('_JEXEC') or die;
if (4 <= (int)JVERSION) {
    $wam = Factory::getDocument()->getWebAssetManager();
    $wam->registerAndUseStyle('mod_qltiptap', 'mod_qltiptap/qltiptap.css');
    $wam->registerAndUseScript('mod_qltiptap', 'mod_qltiptap/qltiptap.js');
} else {
    JHtml::script('mod_qltiptap/qltiptap.js');
    JHtml::stylesheet('mod_qltiptap/qltiptap.css');
}

$tabLink = $params->get('tabLink', '');

$strIdModal = '';
$strAttributes = '';

if(1 == $params->get('modal')) {
    $strIdModal = 'qltiptap-modal-' . $module->id;
    $strAttributes = 'data-toggle="modal" data-target="#' . $strIdModal . '"';
}


?>
<div id="qltiptap<?php echo $module->id ?>" <?php echo $strAttributes; ?>
     class="qltiptap <?php echo $params->get('positionHorizontal', 'right'); ?> <?php echo $params->get('behaviour', 'click'); ?>">
    <div class="tab">
        <?php if ('' != $tabLink): ?>
            <a class="tabLink" href="<?php echo $tabLink; ?>" target="<?php echo $params->get('tabLinkTarget', '_self'); ?>">
        <?php endif; ?>
        <?php if ('' != $params->get('tabPic', '')): ?>
            <img id="qltiptap<?php echo $module->id ?>pic" src="<?php echo $params->get('tabPic', ''); ?>" />
        <?php endif; ?>
        <?php echo $params->get('tabContent', ''); ?>
        <?php if ('' != $tabLink): ?>
            </a>
        <?php endif; ?>
    </div>
    <?php if (0 < $params->get('contentWidth', 250)): ?>
        <div class="content"><?php echo $params->get('content', ''); ?></div>
    <?php endif; ?>
</div>

<?php if(1 == $params->get('modal')) : ?>
    <!-- Modal -->
    <div class="qltiptapmodal modal fade" id="<?php echo $strIdModal; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $strIdModal; ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="<?php echo $strIdModal; ?>Label"><?php echo $params->get('contentTitle', ''); ?></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $params->get('content', ''); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo JText::_('JLIB_HTML_BEHAVIOR_CLOSE'); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
