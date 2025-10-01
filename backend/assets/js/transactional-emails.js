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

	$(document).on('click', '.preview-transactional-email', function(){
	   window.open($(this).attr('href'), $(this).attr('title'), 'height=600, width=600');
       return false;
	});

	(function() {
		const $els = [
			$('#transactional-emails-dashboard-counter-boxes-wrapper'),
			$('#transactional-emails-dashboard-daily-performance-wrapper'),
			$('#transactional-emails-dashboard-weekly-activity-wrapper'),
			$('#transactional-emails-dashboard-cron-history-wrapper')
		];
		$els.map(function($el) {
			if (!$el.length) {
				return;
			}

			$.get($el.data('url'), {}, function(json){
				$el.html(json.html);
			}, 'json');
		})
	})();

});
