;(function($) {
    $.fn.createHighchart = function() {
        return this.each(function() {
			var container = $(this);
			var name = container.data('name');
			var highchartText, highchartName;
			if (name == 'weight') {
				highchartText = '個人體重變化';
				highchartName = '體重';
			} else if (name == 'bodyfat') {
				highchartText = '個人體脂肪變化';
				highchartName = '體脂肪';
			} else if (name == 'bmi') {
				highchartText = '個人BMI變化';
				highchartName = 'BMI';
			} else {
				highchartText = '每日運動時間變化';
				highchartName = '運動時間';
			}

		$.ajax({
				url : 'index.php?action=exportHighchartDatas&column=' + name,
				datatype: "json",
				success: function(data) {
					container.highcharts('StockChart', {
						chart: {
							type: 'spline'
						},
						rangeSelector : {
							selected : 1
						},	title : {
							text : highchartText
						},	series : [{
							name : highchartName,
							data : jQuery.parseJSON(data),
							tooltip: {
								valueDecimals: 2
							}
						}]
					}).show();
				},
				beforeSend: function() {
					container.html('<img src="images/ajax-loader.gif"><br><span>圖表產生中....</span>');
				}
			});

        });
    };
})(jQuery);