<?php
$this->assign('title', 'Supply and Demand Map');
$this->layout = 'map';
//debug($area);
?>

<style>
	body{
		background-color: #eee;
	}
	#bgimage{
		position: absolute;
		z-index: 0;
		left: 0px;
		top: 0px;
		/*display: none;*/
	}
	.locationicon{
		background-color: #F00;
		position: absolute;
		z-index: 10;
		display: none;
	}
	.cityicon{
   display:block;
    margin:auto;
	}
	.citylabel{
		position: absolute;
		z-index: 11;
		display: none;
		font-weight: bold;
	}
	.itemicon{
		position: absolute;
		z-index: 20;
		display: none;
		background-color: #FFF;
	}
	.supplyicon{
		outline: <?= ($area["item_supply_border_thickness"] . "px solid " . $area["item_supply_border_color"]) ?>;
	}
	.demandicon{
		outline: <?= ($area["item_demand_border_thickness"] . "px solid " . $area["item_demand_border_color"]) ?>;
	}
	.commonicon{
   display:block;
		background-color: #FFF;
	}
	.fineicon{
   display:block;
		background-color: rgba(255,152,0,0.25);
	}
	#displaydiv{
		position: absolute;
		left: 0px;
		top: 0px;
		/*padding: 10px;*/
	}
	iframe{
		display: none;
	}
</style>

<div id="displaydiv"></div>
<script>
	var area = <?= $area_json ?>;
	var locations = <?= $locations_json ?>;
	var items = <?= $items_json ?>;
	var background = <?= $background_json ?>;
//	console.log(background);
	var resize_ratio = 1;


//	resize_ratio = window_y / bgimage.height;
//	console.log(bgimage.width, bgimage.height);
//	image_x = bgimage.width * resize_ratio;
//	image_y = window_y;
//	$('#displaydiv').append(bgimage);
//	$('#bgimage').width(image_x);
//	$('#bgimage').height(image_y);
//	console.log(image_x, image_y);
//
	$(function () {
		window_w = $(window).width();
		window_h = $(window).height();
		width_ratio = window_w / background.width;
		height_ratio = window_h / background.height;
		resize_ratio = Math.min(width_ratio, height_ratio);
console.log(resize_ratio);
//		if (width_ratio > width_ratio) {
//			resize_ratio = width_ratio;
//		} else {
//			resize_ratio = height_ratio;
//		}
		$('#displaydiv').width(background.width * resize_ratio);
		$('#displaydiv').height(background.height * resize_ratio);
		$('#displaydiv').append("<img src='" + background.src + "' id='bgimage' width='" + $('#displaydiv').width() + "' height='" + $('#displaydiv').height() + "'>");
//		$("#displaydiv").css({"background": "#FFF url('" + background.src + "') no-repeat center", "background-size": "contain"});

		for (var i = 0, tot = locations.length; i < tot; i++) {
			add_image(locations[i]);
			add_label(locations[i]);
		}
		for (var i = 0, tot = items.length; i < tot; i++) {
			add_image(items[i]);
		}
		$('.locationicon').show().draggable({
			start: function (event, ui) {
//				console.log('image locations',$('#bgimage').css('top'), $('#bgimage').css('left'));
//				console.log('image size',$('#bgimage').height(), $('#bgimage').width());
//				console.log('starting ', $(this).attr('id'));
//				console.log(ui.position);
//				console.log(ui.offset);
//				uioffsettop = ui.offset.top + ($(this).height() /2);
//				uioffsetleft = ui.offset.left  + ($(this).width() /2);
//				console.log('top', ui.offset.top, ui.offset.top / $('#bgimage').height(), uioffsettop, uioffsettop / $('#bgimage').height());
//				console.log('left', ui.offset.left, ui.offset.left / $('#bgimage').width(), uioffsetleft, uioffsetleft / $('#bgimage').width());
			},
			drag: function () {
			},
			stop: function (event, ui) {
//				console.log(ui.position);
//				console.log(ui.offset);
				uioffsettop = ui.offset.top + ($(this).height() /2);
				uioffsetleft = ui.offset.left  + ($(this).width() /2);
//				console.log('top', ui.offset.top, ui.offset.top / $('#bgimage').height(), uioffsettop, uioffsettop / $('#bgimage').height());
//				console.log('left', ui.offset.left, ui.offset.left / $('#bgimage').width(), uioffsetleft, uioffsetleft / $('#bgimage').width());
				console.log('stopping ', $(this).attr('id'), uioffsetleft / $('#bgimage').width(), uioffsettop / $('#bgimage').height());
			}
		}

		);
		$('.itemicon').show().draggable();
		$('.citylabel').show();

	});


	function add_image(image_array) {
//		console.log(image_array);
		var imgstr = "<div";
		imgstr += " id='" + image_array['srcid'] + "'";
		imgstr += " data-id='" + image_array['id'] + "'";
		imgstr += " class='" + image_array['divclass'] + "'";
		imgstr += "style='";
		imgstr += " height: " + image_array['size'] + "px;";
		imgstr += " width: " + image_array['size'] + "px;";
//		imgstr += " background-image: '" + image_array['src'] + "';";
		imgstr += " top: " + (image_array['top'] * resize_ratio) + "px;";
		imgstr += " left: " + (image_array['left'] * resize_ratio) + "px;";
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
		$('#displaydiv').append(imgstr);
	}

	function add_label(image_array) {
		var lblstr = "<div class='citylabel'";
		lblstr += "' style='top: " + (image_array['top'] * resize_ratio) + "px; left: " + ((image_array['left'] * resize_ratio) + (image_array.size * 2)) + "px;'>";
		lblstr += image_array.name;
		lblstr += "</div>";
		$('#displaydiv').append(lblstr);
	}

	function add_carts() {
		for (var i = 0, tot = location.length; i < tot; i++) {
			add_image(location_images[i]);
			add_label(location_images[i]);
		}

	}
	function getTextWidth(text, font) {
		// re-use canvas object for better performance
		var canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement("canvas"));
		var context = canvas.getContext("2d");
		context.font = font;
		var metrics = context.measureText(text);
		return metrics.width;
	}
	;


</script>
<?php
//debug($locations);
?>


<?php
//$image_location = "/files/supplyanddemand/";
//$bg_file = $image_location . "southernmap.png";
//$bg_data = getimagesize(WWW_ROOT . $bg_file);
//$bg_width = $bg_data[0];
//$bg_height = $bg_data[1];
//$dotsize = 10;
//$supply_offset = -25;
//$demand_offset = 15;
//$icon_offset = 10;
//$icon_size = 20;
//
//
//echo("<img src = '" . $image_location . "southernmap.png' id='bgimage'>");
//foreach ($locations as $lkey => $location) {
////		debug($location);
//	$top = $bg_height - ($bg_height * $location['pct_from_top'] / 100) - ($dotsize / 2) + $icon_size;
//	$left = ($bg_width * $location['pct_from_left'] / 100) - ($dotsize / 2);
//	$filename = $image_location . "citydot.png";
//	echo("<img src='" . $filename . "' class='citydot reloc resize' style='height: " . $dotsize . "px; width: " . $dotsize . "px; top: " . $top . "px; left: " . $left . "px;'>");
//	echo("<input type='text' class='citylabel reloc' disabled style='top: " . $top . "px; left: " . ($left + 15) . "px;' value='" . $location['location'] . "'>");
//}
//foreach ($items as $ikey => $item) {
//	$icon_filename = $image_location . $item['i_icon'] . "_" . $item['d_icon'] . "_" . $item['g_icon'] . ".png";
//	$top = $bg_height - ($bg_height * $item['pct_from_top'] / 100) - ($dotsize / 2);
//	$left = ($bg_width * $item['pct_from_left'] / 100) - ($dotsize / 2);
//	switch ($item['d_icon']) {
//		case "S":
//			$left += $supply_offset;
//			break;
//		case "D":
//			$left += $demand_offset;
//			break;
//		default:
//			debug("Error in d_icon, value: ~" . $item['d_icon'] . "~");
//			break;
//	}
//	$top -= ($icon_offset + $icon_size);
//
//	echo("<img id='" . $item['id'] . "' src='" . $icon_filename . "' class='itemicon reloc resize' style='height: " . $icon_size . "px; width: " . $icon_size . "px; top: " . $top . "px; left: " . $left . "px;'>");
//}
?>






<?php

function extraCode() {
	/*
	  <canvas id="canvas"></canvas>
	  <script>
	  var canvas = oCanvas.create({canvas: "#canvas", background: "#FFF"});

	  var wx = 0;
	  var wy = 0;
	  var x = 0;
	  var y = 0;
	  var scale = 0;
	  var items = <?= $items_json ?>;
	  var locations = <?= $locations_json ?>;
	  var supply_offset = 10;
	  var demand_offset = 10;
	  var icon_offset = 10;
	  var icon_size = 128;
	  var icon_scale = .25;
	  var icon_scale_offset = icon_size * icon_scale / 2;
	  var icon_location = "/files/supplyanddemand/";
	  var canvas_items = [];
	  var canvas_locations = [];
	  var canvas_labels = [];

	  var bg_width_x = 756;
	  var bg_height_y = 574;

	  wy = $(window).height();
	  wx = Math.round(wy * bg_width_x / bg_height_y);

	  var src = "/files/supplyanddemand/southernmap.png";
	  canvas.height = wy;
	  canvas.width = wx;
	  //	console.log(wx, wy);
	  bgimage = canvas.display.image({
	  x: 0,
	  y: 0,
	  origin: {x: "top", y: "left"},
	  image: src,
	  width: wx,
	  height: wy
	  });
	  //	bgimage.width = wx;
	  //	bgimage.height = wy;
	  canvas.addChild(bgimage);
	  canvas.redraw();
	  //	console.log(bgimage.width, bgimage.height);

	  for (var i = 0, tot = locations.length; i < tot; i++) {
	  lname = locations[i].location;
	  lx = locations[i].pct_from_left;
	  ly = locations[i].pct_from_top;
	  cx = wx * lx / 100;
	  cy = wy - (wy * ly / 100);
	  canvas_locations[lname] = canvas.display.ellipse({
	  x: cx,
	  y: cy,
	  radius: 5,
	  fill: "#000"
	  });

	  canvas.addChild(canvas_locations[lname]);

	  canvas_labels[lname] = canvas.display.text({
	  x: cx + 10,
	  y: cy,
	  origin: {x: "left", y: "center"},
	  font: "bold 10px sans-serif",
	  text: lname,
	  fill: "#000"
	  });

	  canvas.addChild(canvas_labels[lname]);
	  }

	  for (var i = 0, tot = items.length; i < tot; i++) {
	  id = items[i].id;
	  lname = items[i].location;
	  lx = items[i].pct_from_left_x;
	  ly = items[i].pct_from_top_y;
	  icon_filename = items[i].i_icon + "_" + items[i].d_icon + "_" + items[i].g_icon + ".png";
	  cx = canvas.width * lx / 100;
	  cy = canvas.height - (canvas.height * ly / 100);
	  console.log(cx, cy);
	  switch (items[i].d_icon) {
	  case "S":
	  cx -= supply_offset + icon_scale_offset;
	  break;
	  case "D":
	  cx += demand_offset + icon_scale_offset;
	  break;
	  default:
	  console.log("Error in d_icon, value: ~" + items[i].d_icon + "~");
	  break;
	  }
	  cy -= (icon_offset + icon_scale_offset);

	  console.log(cx, cy);
	  canvas_items[id] = canvas.display.image({
	  x: cx,
	  y: cy,
	  origin: {x: "center", y: "center"},
	  image: icon_location + icon_filename,
	  width: icon_size * icon_scale,
	  height: icon_size * icon_scale
	  });
	  canvas.addChild(canvas_items[id]);

	  //		console.log(id, cx, cy, icon_scale, icon_location + icon_filename);
	  }


	  $(function () {
	  });

	  </script>
	 */
}
