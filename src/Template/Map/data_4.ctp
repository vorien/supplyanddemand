<style>
	body{
		background-color: #eee;
	}
	.citydot{
		position: absolute;
		z-index: 10;
		display: none;
	}
	#bgimage{
		position: fixed;
		z-index: 0;
		display: none;
	}
	input[type="text"].citylabel{
		position: absolute;
		z-index: 11;
		width: 100px;
		display: none;
	}
	.itemicon{
		position: absolute;
		z-index: 20;
		display: none;
	}
</style>

<script>
	var image_folder = "/files/supplyanddemand/";
	var bgfilename = "southernmap.png";
	var cityfilename = "citydot.png";
	var supply_offset = 0;
	var demand_offset = 0;
	var icon_offset = 15;
	var city_size = 15;
	var icon_size = 128;
	var icon_scale = .25;
	var items = <?= $items_json ?>;
	var locations = <?= $locations_json ?>;
	var window_x = 0;
	var window_y = 0;
	var image_x = 0;
	var image_y = 0;
	var resize_ratio = 0;
	var icon_scaled = icon_size * icon_scale;
	var icon_scale_offset = icon_scaled / 2;
	var city_scale_offset = city_size/2;
	var bgimage;
	var dotimage;
	var item_images = [];
	var location_images = [];
	var location_labels = [];
	$(function () {
		//Start preloading images
		window_y = $(window).height();
		window_x = $(window).width();
		bgimage = new Image();
		bgimage.src = image_folder + bgfilename;
		bgimage.id = 'bgimage';
		bgimage.onload = function () {
			resize_ratio = window_y / bgimage.height;
			$('body').append(bgimage);
			$('#bgimage').width(bgimage.width * resize_ratio);
			$('#bgimage').height(window_y);
			image_x = bgimage.width * resize_ratio;
			image_y = window_y;
			dotimage = new Image();
			dotimage.src = image_folder + cityfilename;
			dotimage.onload = function () {
				for (var i = 0, tot = locations.length; i < tot; i++) {
					location_images[i] = new Array();
					location_images[i].src = image_folder + cityfilename;
					location_images[i].id = locations[i].location;
					location_images[i].width = city_size;
					location_images[i].height = city_size;
					location_images[i].left = (image_x * locations[i].pct_horizontal / 100) - (city_scale_offset);
					location_images[i].top = (image_y * (1 - (locations[i].pct_vertical / 100))) - (city_scale_offset);
					location_images[i].class = 'citydot';
				}
			}
			for (var i = 0, tot = items.length; i < tot; i++) {
				item_images[i] = new Image();
				item_images[i].src = image_folder + items[i].i_icon + "_" + items[i].d_icon + "_" + items[i].g_icon + ".png";
				item_images[i].id = items['id'];
				item_images[i].width = icon_size * icon_scale;
				item_images[i].height = icon_size * icon_scale;
				cx = image_x * items[i].pct_horizontal / 100;
				cy = image_y * (1 - (items[i].pct_vertical / 100));
				switch (items[i].d_icon) {
					case "S":
						cx -= supply_offset + icon_scaled + city_scale_offset;
						break;
					case "D":
						cx += demand_offset + city_scale_offset;
						break;
					default:
						console.log("Error in d_icon, value: ~" + items[i].d_icon + "~");
						break;
				}
				cy -= (icon_offset + icon_scaled + city_scale_offset);
				item_images[i].left = cx;
				item_images[i].top = cy;
				item_images[i].class = 'itemicon';
			}
		}

	});

	$(window).load(function () {
		for (var i = 0, tot = location_images.length; i < tot; i++) {
			add_image(location_images[i]);
			add_label(location_images[i]);
		}
		for (var i = 0, tot = item_images.length; i < tot; i++) {
			add_image(item_images[i]);
		}
		$('img').show();
		$('.citylabel').show();
		$('.itemicon').draggable();
	});

	function add_image(image_array) {
		var imgstr = "<img id='" + image_array['id'] + "' src='" + image_array['src'] + "' class='" + image_array['class'];
		imgstr += "' style='height: " + image_array['height'] + "px; width: " + image_array['width'] + "px;";
		imgstr += " top: " + image_array['top'] + "px; left: " + image_array['left'] + "px;'>";
		$('body').append(imgstr);
	}

	function add_label(image_array) {
		var lblstr = "<input type='text' class='citylabel reloc' disabled value='" + image_array.id + "'";
		lblstr += "' style='top: " + image_array['top'] + "px; left: " + (image_array['left'] + image_array['width'] + icon_offset) + "px;'>";
		$('body').append(lblstr);
	}



</script>
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
//	$top = $bg_height - ($bg_height * $location['pct_vertical'] / 100) - ($dotsize / 2) + $icon_size;
//	$left = ($bg_width * $location['pct_horizontal'] / 100) - ($dotsize / 2);
//	$filename = $image_location . "citydot.png";
//	echo("<img src='" . $filename . "' class='citydot reloc resize' style='height: " . $dotsize . "px; width: " . $dotsize . "px; top: " . $top . "px; left: " . $left . "px;'>");
//	echo("<input type='text' class='citylabel reloc' disabled style='top: " . $top . "px; left: " . ($left + 15) . "px;' value='" . $location['location'] . "'>");
//}
//foreach ($items as $ikey => $item) {
//	$icon_filename = $image_location . $item['i_icon'] . "_" . $item['d_icon'] . "_" . $item['g_icon'] . ".png";
//	$top = $bg_height - ($bg_height * $item['pct_vertical'] / 100) - ($dotsize / 2);
//	$left = ($bg_width * $item['pct_horizontal'] / 100) - ($dotsize / 2);
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
	  lx = locations[i].pct_horizontal;
	  ly = locations[i].pct_vertical;
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
	  lx = items[i].pct_horizontal_x;
	  ly = items[i].pct_vertical_y;
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
