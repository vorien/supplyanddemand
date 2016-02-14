<style>
	#c{
		border-width: 1px;
		border-style: solid;
		border-color: #000;
	}</style>


<canvas id="c"></canvas>


<script>
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

	var loaded_image;

	var canvas = new fabric.Canvas('c');

	var src = "/files/supplyanddemand/southernmap.png";

	var bgimage;

//fabric.Image.fromURL(src, function(oImg) {
//    oImg.set({
//        width: 200,
//        height: 200,
//        originX:  'left',
//        originY: 'top'
//    });
//    canvas.add(oImg);
//    canvas.centerObject(oImg);
//    canvas.renderAll();
//    bgimage = oImg;
//});
//
//
//$("#rotate").click(function(){
//       var curAngle = rotateThisImage.getAngle();
//       rotateThisImage.setAngle(curAngle+15); 
//       canvas.renderAll();
//});

	$(function () {
		var img = new Image();
		img.src = src;
		img.onload = function () {
			wy = $(window).height();
			wx = wy * img.width / img.height;
			img.width = wx;
			img.height = wy;
			y = img.height * scale / 2;
			canvas.setHeight(wy);
			canvas.setWidth(wx);
			
			canvas.setBackgroundImage(img.src, canvas.renderAll.bind(canvas), {
				opacity: 1,
				angle: 0,
				originX: 'left',
				originY: 'top'
			}).backgroundImage.scaleToHeight(wy);

//
//			fabric.Image.fromURL(img.src, function (oImg) {
//				oImg.set({
//					width: wx,
//					height: wy,
//					originX: 'left',
//					originY: 'top'
//				});
//				canvas.add(oImg);
//				canvas.renderAll();
//				loaded_image = oImg;
//			});
//			console.log(loaded_image.getWidth());
//
//			canvas.setBackgroundImage(img.src, canvas.renderAll.bind(canvas), {
//				opacity: 1,
//				angle: 0,
//				originX: 'left',
//				originY: 'top'
//			});

//			canvas.renderAll();


//			fabric.Image.fromURL('my_image.png', function (oImg) {
//				// scale image down, and flip it, before adding it onto canvas
//				oImg.scale(0.5).setFlipX(true);
//				canvas.add(oImg);
//			});

//			canvas.backgroundImage.setWidth(wx);
//			canvas.backgroundImage.setHeight(wy);

//			wy = $(window).height() - 10;
//			wx = wy * img.width / img.height;
//			scale = wy / img.height;
//			x = img.width * scale / 2;
//			y = img.height * scale / 2;
//			$('body').append("<canvas width='" + wx + "' height='" + wy + "'></canvas>");
//
//			$('canvas').drawImage({
//				layer: true,
//				source: img.src,
//				x: x,
//				y: y,
//				scale: scale
//			});
//
//
//			for (var i = 0, tot = locations.length; i < tot; i++) {
//				lname = locations[i].location;
//				lx = locations[i].pct_horizontal;
//				ly = locations[i].pct_vertical;
//				cx = wx * lx / 100;
//				cy = wy - (wy * ly / 100);
//				$('canvas').drawEllipse({
//					layer: true,
//					fillStyle: '#000',
//					x: cx, y: cy,
//					name: '#' + lname + '_dot',
//					width: 10, height: 10
//				});
//				$('canvas').drawText({
//					layer: true,
//					name: lname + '_label',
//					fromCenter: false,
//					fillStyle: '#000',
//					strokeStyle: '#000',
//					strokeWidth: 0,
//					x: cx + 10, y: cy,
//					fontSize: 10,
//					fontFamily: 'Verdana, sans-serif',
//					text: lname
//				});
//			}
//
//
//			for (var i = 0, tot = items.length; i < tot; i++) {
//				id = items[i].id;
//				lname = items[i].location;
//				lx = items[i].pct_horizontal_x;
//				ly = items[i].pct_vertical_y;
//				icon_filename = items[i].i_icon + "_" + items[i].d_icon + "_" + items[i].g_icon + ".png";
//				cx = $('canvas').width() * lx / 100;
//				cy = $('canvas').width() - ($('canvas').width() * ly / 100);
//				switch (items[i].d_icon) {
//					case "S":
//						cx -= supply_offset + icon_scale_offset;
//						break;
//					case "D":
//						cx += demand_offset + icon_scale_offset;
//						break;
//					default:
//						console.log("Error in d_icon, value: ~" + items[i].d_icon + "~");
//						break;
//				}
//				cy -= icon_offset + icon_scale_offset;
//
//				$('canvas').drawImage({
//					name: id,
//					layer: true,
//					source: icon_location + icon_filename,
//					x: cx, y: cy,
//					width: icon_size * icon_scale,
//					height: icon_size * icon_scale,
//					fromCenter: true
//				});
////				console.log(id, cx, cy, icon_scale, icon_location + icon_filename);
//			}
		}
	});


</script>
<?php
//debug($items);
?>
