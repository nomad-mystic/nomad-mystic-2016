<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 4/8/2016
 * Time: 3:46 PM
 */

require_once('constants.php');
header('Content-Type: text/javascript');

?>
// jQuery Closure
$(function() {
	// Click event to show dialog widget and
	// uses AJAX to call pie_chart_builder.php which echos a JSON object for Chart.js
	var buildChartModalButton = $('.buildChartModalButton');
	buildChartModalButton.on('click', function() {
		if ($("#<?php echo NUMBER_OF_SLICES; ?>").val() !== 0) {
			$.post('assets/actions/pie_chart_builder.php', $("#<?php echo CHART_INPUTS; ?>").serialize(),
				function(data) {
					build_chart(data);
				});
		}
	}); // end buildChartModalbutton

	var build_chart = (function(chart_data)
	{
		console.log(chart_data);
		var i;
		var data = [];

		// Counter Closure
		var stateCounter = (function()
		{
			var state = 0;
			return {
				add: function() {
					state++;
				},
				getState: function() {
					return state;
				}
			};
		})();

		// Building Chart slice objects
		for (i = 0; i < chart_data.number_of_slices; i++) {
			var slice = {
				value: Number(chart_data.slice_val[i]),
				color: chart_data.slice_color[i],
				highlight: chart_data.slice_highlight[i],
				label: chart_data.slice_label[i]
			};
			data.push(slice);
		}
		
		// Get canvas DOM elements and context 
		var canvas = $('#chart_output');
		var ctx = canvas.get(0).getContext('2d');

		if (ctx) {
			if (state === undefined) {
				// First instance of the Chart object
				var chart = new Chart(ctx).Doughnut(data);
				stateCounter.add();
				var state = stateCounter.getState();
			}
			// If chart is initialized once then destroy and create new one
			if (state >= 1) {
				chart.destroy();
				new Chart(ctx).Doughnut(data);
			}
		}
		// Add Title to the DOM 
		$(".<?php echo CHART_TITLE; ?>").text(chart_data.chart_title);
	}); // end build_chart()

	// Dynamically create create slices inputs
	var number_of_slices = $("#<?php echo NUMBER_OF_SLICES; ?>");
	number_of_slices.on('change', function(evnt) {
		var user_input_val = number_of_slices.val();
		var i;
		var input_fields_HTML = '';

		input_fields_HTML += '<label for="<?php echo CHART_TITLE; ?>" class="label">Enter the Title of Your Chart</label>';
		input_fields_HTML += '<input type="text" name="<?php echo CHART_TITLE; ?>" class="form-control">';

		for (i = 0; i < user_input_val; i++) {
			var label_number = i + 1;

			input_fields_HTML += '<label for="<?php echo SLICE_NUMBER_VAL; ?>" class="label">Enter the Value of Slice: ' + label_number + '</label>';
			input_fields_HTML += '<input type="number" name="<?php echo SLICE_NUMBER_VAL; ?>[]" min="0" max="1000" class="form-control">';

			input_fields_HTML += '<label for="<?php echo SLICE_COLOR; ?>" class="label">Slice Color: ' + label_number + '</label>';
			input_fields_HTML += '<input type="color" name="<?PHP echo SLICE_COLOR; ?>[]" class="form-control">';

			input_fields_HTML += '<label for="<?php echo SLICE_LABEL; ?>" class="label">Give Your Chart a Label: ' + label_number + '</label>';
			input_fields_HTML += '<input type="text" name="<?php echo SLICE_LABEL; ?>[]" class="form-control">';
		}
		$('.input_fields').html(input_fields_HTML);
	}); // number_of_slices
}); // end Jquery
