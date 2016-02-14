<style>
	body{
		background-color: #eee;
	}
	.citydot{
		position: fixed;
		z-index: 10;
	}
	#bgimage{
		position: fixed;
		z-index: 0;
	}
	input[type="text"].citylabel{
		position: absolute;
		z-index: 11;
		width: 100px;
	}
	.itemicon{
		position: absolute;
		z-index: 20;
	}
</style>


<?php
$image_location = "/files/supplyanddemand/";
$bg_file = $image_location . "southernmap.png";
$bg_data = getimagesize(WWW_ROOT . $bg_file);
$bg_width = $bg_data[0];
$bg_height = $bg_data[1];
$dotsize = 10;
$supply_offset = -25;
$demand_offset = 15;
$icon_offset = 10;
$icon_size = 20;


echo("<img src = '" . $image_location . "southernmap.png' id='bgimage'>");
foreach ($locations as $lkey => $location) {
//		debug($location);
	$top = $bg_height - ($bg_height * $location['pct_vertical'] / 100) - ($dotsize / 2) + $icon_size;
	$left = ($bg_width * $location['pct_horizontal'] / 100) - ($dotsize / 2);
	$filename = $image_location . "citydot.png";
	echo("<img src='" . $filename . "' class='citydot reloc resize' style='height: " . $dotsize . "px; width: " . $dotsize . "px; top: " . $top . "px; left: " . $left . "px;'>");
	echo("<input type='text' class='citylabel reloc' disabled style='top: " . $top . "px; left: " . ($left + 15) . "px;' value='" . $location['location'] . "'>");
}
foreach ($items as $ikey => $item) {
	$icon_filename = $image_location . $item['i_icon'] . "_" . $item['d_icon'] . "_" . $item['g_icon'] . ".png";
	$top = $bg_height - ($bg_height * $item['pct_vertical'] / 100) - ($dotsize / 2);
	$left = ($bg_width * $item['pct_horizontal'] / 100) - ($dotsize / 2);
	switch ($item['d_icon']) {
		case "S":
			$left += $supply_offset;
			break;
		case "D":
			$left += $demand_offset;
			break;
		default:
			debug("Error in d_icon, value: ~" . $item['d_icon'] . "~");
			break;
	}
	$top -= ($icon_offset + $icon_size);

	echo("<img id='" . $item['id'] . "' src='" . $icon_filename . "' class='itemicon reloc resize' style='height: " . $icon_size . "px; width: " . $icon_size . "px; top: " . $top . "px; left: " . $left . "px;'>");
}
?>
<script>
	var bgx = <?=$bg_width?>;
	var bgy = <?=$bg_height?>;
	var toffset = <?=$icon_size?>;
	var dotoffset = <?=$dotsize/2?>;
	
	$(function () {
		console.log($(window).width(), $(window).height());
		console.log(window.innerWidth, window.innerHeight);
		bght = $(window).height() - toffset;
		bgwd = $('#bgimage').width() * bght / $('#bgimage').height();
		xratio = bgwd/bgx;
		yratio = bght/bgy;
		sratio = xratio > yratio ? yratio : xratio;
		console.log(bgwd, bght);
		
		$('#bgimage').height(bght).width(bgwd);
		$('.reloc').each(function(){
			tx = parseFloat($(this).css('left'));
			ty = parseFloat($(this).css('top'));
			newleft = tx * xratio;
			newtop = ty * yratio;
			$(this).css('left', newleft);
			$(this).css('top', newtop);
			if($(this).hasClass('resize')){
				$(this).width($(this).width() * sratio);
				$(this).height($(this).height() * sratio);
			}
		});
		
		
	});
</script>










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
