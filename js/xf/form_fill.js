!function($, window, document, _undefined)
{
	"use strict";

	XF.FormFill = XF.Element.newHandler({
		options: {
			fillers: '.js-FormFiller',
			key: 'fill',
			action: null
		},

		xhr: null,

		init: function()
		{
			if (!this.$target.is('form'))
			{
				console.error('Target must be a form');
				return;
			}

			if (!this.options.action)
			{
				this.options.action = this.$target.attr('action');
			}

			if (!this.options.action)
			{
				console.error('Form filler requires an action option or attribute');
				return;
			}

			this.$target.on('click', this.options.fillers, $.proxy(this, 'change'));
		},

		change: function()
		{
			if (this.xhr)
			{
				this.xhr.abort();
			}

			this.xhr = XF.ajax(
				'post', this.options.action,
				this.$target.serialize() + '&' + this.options.key + '=1',
				$.proxy(this, 'onSuccess')
			);
		},

		onSuccess: function(ajaxData)
		{
			if (!ajaxData.formValues)
			{
				return;
			}

			var $target = this.$target;

			$.each(ajaxData.formValues, function(selector, value)
			{
				var $ctrl = $target.find(selector);
				if ($ctrl.length)
				{
					if ($ctrl.is(':checkbox, :radio'))
					{
						$ctrl.prop('checked', value ? true : false).triggerHandler('click', {
							triggered: true
						});
					}
					else if ($ctrl.is('select, input, textarea'))
					{
						$ctrl.val(value);
					}
				}
			});
		}
	});

	XF.Element.register('form-fill', 'XF.FormFill');
}
(jQuery, window, document);