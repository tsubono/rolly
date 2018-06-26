(function($) {
	$.fn.est = function(options) {

		var elements = this;
		var defaults = {
			roopTiming: 5000,
			slideSpeed: 100,
			slideDelay: 500,
			remainderSpeed: 1200,
			remainderDelay: 1000,
			outSpeed: 50
		};
		var setting = $.extend(defaults, options);

		// cssの設定
		elements.css({
			position: 'relative',
			overflow: 'hidden' 
		}).children().css({
			position: 'absolute',
			left: 0,
			whiteSpace: 'nowrap'
		});
		// 変数の設定
		var areaWidth = elements.width();
		var elementLength = elements.children().length;
		var stTarget, outTarget, outTargetSpeed;
		var speedAdjust = 100;

		// 最初のテキストにclass付与
		elements.children().hide().eq(0).addClass('est-next');

		// テキストをスライドさせる関数
		function slideText() {
			// 現在表示されているテキストをフレームアウト。1回目は表示されていないので飛ばす
			if(stTarget != undefined) {
				// 対象テキスト
				outTarget = elements.children().eq(stTarget);
				// スライドするスピードの設定
				if(outTarget.outerWidth() <= areaWidth) {
					outTargetSpeed = outTarget.outerWidth() / speedAdjust * setting.outSpeed
				} else {
					outTargetSpeed = areaWidth / speedAdjust * setting.outSpeed
				}
				// スライド処理
				outTarget.animate({
					left: - outTarget.outerWidth()
				}, outTargetSpeed, 'linear', function() {
					// 非表示にして配置を元に戻す
					$(this).hide().css('left', 0)
				});
			}

			// 次に表示するテキスト
			stTarget = elements.children('.est-next').index();
			// classの付け替え
			elements.children().eq(stTarget).removeClass('est-next').addClass('est-current');

			// スライド処理
			elements.children().eq(stTarget).css({
				left: areaWidth
			}).show().delay(setting.slideDelay).animate({
				left: 0
			}, areaWidth / speedAdjust * setting.slideSpeed, 'linear', function() {
				// テキストの幅が親の幅より大きい時
				if($(this).outerWidth() > areaWidth) {
					// スライド処理
					$(this).delay(setting.remainderDelay).animate({
						left: areaWidth - $(this).outerWidth()
					}, ($(this).outerWidth() - areaWidth) / speedAdjust * setting.remainderSpeed, 'linear', function() {
						// スライド完了後、ループ処理実行
						setTimeout(slideText, setting.roopTiming);
					})
				} else {
					// ループ処理実行
					setTimeout(slideText, setting.roopTiming);
				}
			});

			// 次回表示するテキストにclassを付与しておく
			if(stTarget < elementLength - 1) {
				elements.children().eq(stTarget + 1).addClass('est-next');
			} else {
				elements.children().eq(0).addClass('est-next');
			}
		}
		// 1回目のスライド実行
		slideText();
	}
})(jQuery);