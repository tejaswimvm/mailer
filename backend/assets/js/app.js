/**
 * This file is part of the MailWizz EMA application.
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.0
 */
jQuery(document).ready(function($){
	
    $('.sidebar').on('mouseenter', function(){
    	if ($('.sidebar-collapse').length == 0) {
			$('.timeinfo').stop().fadeIn();
		}
    }).on('mouseleave', function(){
        $('.timeinfo').stop().fadeOut();
    });

    // since 1.3.7.3
    var loadUserMessagesInHeader = function(){
        var url = $('.messages-menu .header-messages').data('url');
        if (!url) {
            return;
        }
        $.get(url, {}, function(json){
            if (json.counter) {
                $('.messages-menu .header-messages span.label').text(json.counter);
            }
            if (json.header) {
                $('.messages-menu ul.dropdown-menu li.header').html(json.header);
            }
            if (json.html) {
                $('.messages-menu ul.dropdown-menu ul.menu').html(json.html);
            }
        }, 'json');
    };
    // don't run on guest.
    if (!$('body').hasClass('ctrl-guest')) {
        loadUserMessagesInHeader();
        setInterval(loadUserMessagesInHeader, 60000);
    }
    //

    $('.sidebar-menu .treeview').on('mouseenter', function () {
        if ($('body').hasClass('sidebar-collapse')) {
            const $menu = $(this).find('.treeview-menu');
            const menuOffset = $menu.offset();
            const menuHeight = $menu.outerHeight();
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();
            const menuBottom = menuOffset.top + menuHeight;

            // Reset previous styles
            $menu.removeAttr('style');

            if (menuBottom > scrollTop + windowHeight) {
                $menu.css({
                    position: 'absolute',
                    top: 'auto',
                    bottom: 0,
                    left: '100%',
                    display: 'block',
                    maxHeight: '500px',
                    overflowY: 'auto',
                    overflowX: 'hidden',
                });

                const $titleText = $(this).children('a').text().trim();

                // Clear any previous title to avoid duplicates
                $menu.find('.floating-menu-title').remove();

                // Prepend the title inside the menu
                $menu.prepend(
                    $('<p></p>')
                        .text($titleText)
                        .addClass('floating-menu-title')
                        .css({
                            fontSize: '14px',
                            margin: 0,
                            marginLeft: '10px',
                            padding: '6px 10px',
                            color: '#fff',
                            fontWeight: '500',
                        })
                );
            }
        }
    }).on('mouseleave', function () {
        if ($('body').hasClass('sidebar-collapse')) {
            $(this).find('.treeview-menu').removeAttr('style');
        }
    });
});