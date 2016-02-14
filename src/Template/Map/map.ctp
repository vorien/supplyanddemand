<?php
$this->assign('title', 'Supply and Demand Map');
$this->layout = 'map';
//debug($region);
?>

<style>
	body{
		background-color: #FFF;
	}
	.itemicon{
		float: left;
		margin: 5px;
		background-color: #FFF;
		position: relative;
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
	.locationdiv{
		position: absolute;
		z-index: 100;
		display: none;
	}
	.locationicon{
		display:block;
		margin:auto;
	}
	.locationlabel{
		position: absolute;
		z-index: 110;
		display: none;
		font-weight: bold;
	}
	.routediv{
		position: absolute;
		z-index: 20;
		display: none;
	}
	.routeicon{
		display:block;
		margin:auto;
	}

	#wrapperdiv{
		/*		position: relative;
				left: 0px;
				top: 0px;*/
		margin: 15px auto;
	}
	#displaydiv{
		background: url("<?= $background['src'] ?>"); 
		background-size: contain;
		position: relative;
		left: 0px;
		top: 0px;
	}
	#loader-image{
		width: 100px;
		height: 100px;
		margin: auto;
	}
	#item-display-wrapper{
		margin: auto;
	}
	#modal-content{
		display: none;
		margin: auto;
		background-color: #FFF;
	}
	.item-display{
		width: 50%;
	}
	#display_0{
		float:left;
	}
	#display_1{
		float:right;
	}
	.inventory-quantity{
		position: absolute;
		top: 0;
		left: 0;
		font-weight: bold;
		font-size: 1.2rem;
	}

</style>
<div id="wrapperdiv">
	<div id="displaydiv"></div>
</div>
<div id='modal' class='modal'>
	<div id='loader-image'><img src='/img/ajax-loader.gif'></div>
	<div id='modal-content' class='clearfix'></div>
</div>
<script>
	var region = <?= $region_json ?>;
	var locations = <?= $locations_json ?>;
	var routes = <?= $routes_json ?>;
	var background = <?= $background_json ?>;
	var distributions = [];
	var inventories = [];
	var resize_ratio = 1;
	var bg_width = 0;
	var bg_height = 0;

	//	console.log(locations);

	$(function () {
		window_w = $(window).width();
		window_h = $(window).height() - 30;
//		console.log(window_w, window_h);
		width_ratio = (window_w) / background.width;
		height_ratio = (window_h) / background.height;
		resize_ratio = Math.min(width_ratio, height_ratio);
		bg_width = Math.ceil((background.width * resize_ratio) / 2.0) * 2;
		bg_height = Math.ceil((background.height * resize_ratio) / 2.0) * 2;
//		console.log(resize_ratio);
//		console.log(background.width / background.height);
//		console.log(background.width * resize_ratio, background.height * resize_ratio);
//		console.log(bg_width / bg_height);
		$('#wrapperdiv').width(bg_width);
		$('#wrapperdiv').height(bg_height);
		$('#displaydiv').width($('#wrapperdiv').width());
		$('#displaydiv').height($('#wrapperdiv').height());
		$('#displaydiv').css('background-size', (bg_width) + 'px ' + (bg_height) + 'px');
		console.log()

//		$('#displaydiv').append("<img src='" + background.src + "' id='bgimage' width='" + $('#displaydiv').width() + "' height='" + $('#displaydiv').height() + "'>");

		for (var i = 0, tot = locations.length; i < tot; i++) {
			//			console.log(locations[i]);
			add_image(locations[i], -.5 * locations[i].size, -.5 * locations[i].size);
			add_label(locations[i]);
		}

		for (var i = 0, tot = routes.length; i < tot; i++) {
			add_image(routes[i], 0, 0);
		}

		$('.locationdiv').show();
		$('.routediv').show();
		$('.locationlabel').show();

		$(".locationdiv").click(function () {
			$("#modal-content").hide();
			var dataid = $(this).data('id');
			$("#modal-content").load("/map/displaysd", function () {
				$('#modal').modal();
				$('#loader-image').show();
				$.getJSON("/map/distributions/" + dataid, function (dist) {
					distributions = dist;
					load_distribution_images(function () {
						$('#loader-image').hide();
						$('#modal-content').width(bg_width).show();
						$.getJSON("/map/inventories/" + dataid, function (invn) {
							inventories = invn;
							load_inventory_images(function () {});
						});
					});
				});
			});
		});

		$(".routediv").click(function () {
			$("#modal-content").hide();
			var dataid = $(this).data('id');
			$("#modal-content").load("/map/displayroute", function () {
				$('#modal').modal();
				$('#loader-image').show();
				$.getJSON("/map/routeinventories/" + dataid, function (invn) {
					inventories = invn;
					load_inventory_images(function () {
						$('#loader-image').hide();
						$('#modal-content').width(bg_width).show();
					});
				});
			});
		});



	});
	function add_image(image_array, offset_top, offset_left) {
		//		console.log(image_array);
		var imgstr = "<div";
		imgstr += " id='" + image_array['srcid'] + "'";
		imgstr += " data-id='" + image_array['id'] + "'";
		imgstr += " class='" + image_array['divclass'] + "'";
		imgstr += "style='";
		imgstr += " height: " + image_array['size'] + "px;";
		imgstr += " width: " + image_array['size'] + "px;";
		//		imgstr += " background-image: '" + image_array['src'] + "';";
		imgstr += " top: " + ((image_array['top'] * resize_ratio) + offset_top) + "px;";
		imgstr += " left: " + ((image_array['left'] * resize_ratio) + offset_left) + "px;";
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
		var lblstr = "<div class='locationlabel'";
		lblstr += " style='";
		lblstr += " top: " + ((image_array['top'] * resize_ratio) - (image_array['size'])) + "px;";
		lblstr += " left: " + ((image_array['left'] * resize_ratio) + (image_array['size'])) + "px;";
		lblstr += "'>";
		lblstr += image_array.name;
		lblstr += "</div>";
		$('#displaydiv').append(lblstr);
	}


	function load_distribution_images(callback) {
		if (distributions.length == 0) {
			$('#display_0').append("There is no Supply or Demand at this time");
		} else {
			for (var j = 0; j <= 1; j++) {
				for (var i = 0; i < distributions[j].length; i++) {
					var image_array = distributions[j][i];
					var imgstr = "<div";
					imgstr += " id='" + image_array['srcid'] + "'";
					imgstr += " data-id='" + image_array['id'] + "'";
					imgstr += " class='" + image_array['divclass'] + "'";
					imgstr += "style='";
					imgstr += " height: " + image_array['size'] + "px;";
					imgstr += " width: " + image_array['size'] + "px;";
					imgstr += "'>";
					imgstr += "<img src='" + image_array['src'] + "' class='" + image_array['imgclass'];
					imgstr += "'";
					imgstr += " style='";
					imgstr += " height: " + image_array['size'] + "px;";
					imgstr += " width: " + image_array['size'] + "px;";
					imgstr += "'>";
					imgstr += "</div>";
//				console.log(imgstr);
					$('#display_' + j).append(imgstr);
				}
			}
		}
		callback();
	}

	function load_inventory_images(callback) {
		if (inventories.length == 0) {
			$('#display_inventory').append("There is nothing in the inventory at this time");
		} else {
			for (var i = 0, tot = inventories.length; i < tot; i++) {
				var image_array = inventories[i];
				var imgstr = "<div";
				imgstr += " id='" + image_array['srcid'] + "'";
				imgstr += " data-id='" + image_array['id'] + "'";
				imgstr += " class='" + image_array['divclass'] + "'";
				imgstr += "style='";
				imgstr += " height: " + image_array['size'] + "px;";
				imgstr += " width: " + image_array['size'] + "px;";
				imgstr += "'>";
				imgstr += "<img src='" + image_array['src'] + "' class='" + image_array['imgclass'];
				imgstr += "'";
				imgstr += " style='";
				imgstr += " height: " + image_array['size'] + "px;";
				imgstr += " width: " + image_array['size'] + "px;";
				imgstr += "'>";
				imgstr += "<div class='inventory-quantity'>" + image_array['quantity'] + "</div>";
				imgstr += "</div>";
//				console.log(imgstr);
				$('#display_inventory').append(imgstr);
			}
		}
		callback();
	}



	$(window).load(function () {
		var images = [];
		var itemimages = <?= $images_json ?>;
		for (var i = 0; i < itemimages.length; i++) {
			images[i] = new Image();
			images[i].src = itemimages[i];
		}
	});


	$('#setpositions').click(function () {
//			.draggable({
//	start: function (event, ui) {
//	//				console.log('image locations',$('#bgimage').css('top'), $('#bgimage').css('left'));
//	//				console.log('image size',$('#bgimage').height(), $('#bgimage').width());
//	//				console.log('starting ', $(this).attr('id'));
//	//				console.log(ui.position);
//	//				console.log(ui.offset);
//	//				uioffsettop = ui.offset.top + ($(this).height() /2);
//	//				uioffsetleft = ui.offset.left  + ($(this).width() /2);
//	//				console.log('top', ui.offset.top, ui.offset.top / $('#bgimage').height(), uioffsettop, uioffsettop / $('#bgimage').height());
//	//				console.log('left', ui.offset.left, ui.offset.left / $('#bgimage').width(), uioffsetleft, uioffsetleft / $('#bgimage').width());
//	},
//			drag: function () {
//			},
//			stop: function (event, ui) {
////				console.log(ui.position);
//			uipositiontop = ui.position.top + ($(this).height() / 2);
//					uipositionleft = ui.position.left + ($(this).width() / 2);
//					console.log('stopping ', $(this).attr('id') + ' ', uipositionleft / $('#displaydiv').width(), uipositiontop / $('#displaydiv').height());
////				console.log(ui.offset);
////				uioffsettop = ui.offset.top + ($(this).height() / 2);
////				uioffsetleft = ui.offset.left + ($(this).width() / 2);
////				console.log('stopping ', $(this).attr('id'), uioffsetleft / $('#displaydiv').width(), uioffsettop / $('#displaydiv').height());
//					//				console.log('top', ui.offset.top, ui.offset.top / $('#bgimage').height(), uioffsettop, uioffsettop / $('#bgimage').height());
//					//				console.log('left', ui.offset.left, ui.offset.left / $('#bgimage').width(), uioffsetleft, uioffsetleft / $('#bgimage').width());
//			}
//	}
//
//	);
	}
	);


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
