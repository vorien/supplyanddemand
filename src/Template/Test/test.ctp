<?php
//foreach ($distributions as $distribution) {
////	debug($distribution);
//}
?>
<style>
	body{
		background-color: #FFF;
	}
	.itemicon{
		float: left;
		margin: 5px;
		background-color: #FFF;
	}
	.supplyicon{
		outline: <?= ($preferences["item_supply_border_thickness"] . "px solid " . $preferences["item_supply_border_color"]) ?>;
	}
	.demandicon{
		outline: <?= ($preferences["item_demand_border_thickness"] . "px solid " . $preferences["item_demand_border_color"]) ?>;
	}
	.commonicon{
		display:block;
		background-color: #FFF;
	}
	.fineicon{
		display:block;
		background-color: rgba(255, 255, 102,0.5);
	}
	.displaydiv{
		margin: 20px;
		float: left;
		width: 40%;
	}
</style>

<div id="wrapper">
	<div id="display_0" class="displaydiv clearfix"></div>
	<div id="display_1" class="displaydiv clearfix"></div>
</div>
<script>
	var locations = <?= $locations_json ?>;
	var distributions = <?= $distributions_json ?>;
	$(function () {

		for (var j = 0; j <= 1; j++){
			for (var i = 0; i < distributions[j].length; i++) {
//				console.log(j,i);
				add_image(distributions[j][i], j);
			}
		}
		
		
	});

	function add_image(image_array, j) {
//		console.log(image_array);
		var imgstr = "<div";
		imgstr += " id='" + image_array['srcid'] + "'";
		imgstr += " data-id='" + image_array['id'] + "'";
		imgstr += " class='" + image_array['divclass'] + "'";
		imgstr += "style='";
		imgstr += " height: " + image_array['size'] + "px;";
		imgstr += " width: " + image_array['size'] + "px;";
//		imgstr += " top: " + (image_array['top'] * resize_ratio) + "px;";
//		imgstr += " left: " + (image_array['left'] * resize_ratio) + "px;";
		imgstr += "'>";
		imgstr += "<img src='" + image_array['src'] + "' class='" + image_array['imgclass'];
		imgstr += "'";
		imgstr += " style='";
		imgstr += " height: " + image_array['size'] + "px;";
		imgstr += " width: " + image_array['size'] + "px;";
//		imgstr += " top: 0px;";
//		imgstr += " left: 0px;";
		imgstr += "'>";
		imgstr += "</div>";
//		console.log(imgstr);
		$('#display_' + j).append(imgstr);
	}

	function getTextWidth(text, font) {
		// re-use canvas object for better performance
		var canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement("canvas"));
		var context = canvas.getContext("2d");
		context.font = font;
		var metrics = context.measureText(text);
		return metrics.width;
	}


</script>
