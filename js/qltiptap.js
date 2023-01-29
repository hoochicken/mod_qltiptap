/*
 @package		mod_qltiptap
 @copyright	    Copyright (C) 2020 ql.de All rights reserved.
 @author 		Mareike Riegel mareike.riegel@ql.de
 @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
jQuery(document).ready(function () {

    jQuery('.qltiptap').on('tap', function () {
        //alert('tap');
        var returnValue = qltiptap(jQuery(this), false);
        return returnValue;
    });
    jQuery('.qltiptap').click(function () {
        //alert('cl');
        var returnValue = qltiptap(jQuery(this), false);
        return returnValue;
    });
    jQuery('.qltiptap.hover').mouseover(function () {
        //alert('mo - mo');
        var returnValue = qltiptap(jQuery(this), 1);
        return returnValue;
    });
    jQuery('.qltiptap.hover').click(function () {
        //alert('mo - ck');
        var returnValue = qltiptap(jQuery(this), false);
        return true;
    });
    jQuery('.qltiptap.hover').mouseout(function () {
        //alert('mout - moout');
        var returnValue = qltiptap(jQuery(this), 0);
        return returnValue;
    });

    jQuery('.qltiptap').mouseover(function () {
        var id = jQuery(this).attr('id');
        var image = jQuery('#' + id + 'pic');
        image.attr('src', eval(id + 'picHover'));
    });
    jQuery('.qltiptap').mouseout(function () {
        var id = jQuery(this).attr('id');
        var image = jQuery('#' + id + 'pic');
        //image.attr('src','/'+eval(id+'pic'));
        image.attr('src', eval(id + 'pic'));
    });

    function qltiptap(thisObject, show) {
        var contentWidth = thisObject.children('div.content').css('width');
        var right = thisObject.hasClass('right');
        var left = thisObject.hasClass('left');
        var checkMargin = '';
        if (true === right) {
            checkMargin = 'right';
        }
        if (true === left) {
            checkMargin = 'left';
        }
        var marginStatus = thisObject.css('margin-' + checkMargin);
        if ('0px' == marginStatus || 0 === show) thisObject.css('margin-' + checkMargin, '-' + contentWidth);
        else if (1 == show) thisObject.css('margin-' + checkMargin, 0);
        else thisObject.css('margin-' + checkMargin, 0);
    }
});