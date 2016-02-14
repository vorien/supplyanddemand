<?php
$this->assign('title', 'Model Map');
$this->layout = 'modelmap';

//pr($tables);
//pr($connectionArray);

echo "digraph LoC{\n";
foreach ($connectionArray as $fromItem => $toItem) {
//		echo "fromItem: $fromItem<br>";
	foreach ($toItem as $item => $linkType) {
//			echo $fromItem . " -- " . $item . "<br>";
		switch ($linkType) {
			case 0:
				$edge = "none";
				$color = "grey";
				break;
			case 1:
				$edge = "normal";
				$color = "black";
				break;
			case 2:
				$edge = "back";
				$color = "green";
				break;
			case 3:
				$edge = "both";
				$color = "blue";
				break;
			default:
				$edge = "none";
				$color = "red";
				break;
		}
		echo "edge [dir=$edge, color=$color];\n";
		echo $fromItem . " -> " . $item . ";\n";
	}
}
echo "}\n\n";
die();
?>

<script>
	var graph = new Springy.Graph();

<?php
foreach ($tables as $table) {
	echo "var $table = graph.newNode({label: '$table'})\n";
}
foreach ($connectionArray as $connection) {
	echo "graph.newEdge($connection[0], $connection[1])\n";
}
?>
</script>

<canvas id="my_canvas" width="1000" height="600" />
<script>
	$('#my_canvas').springy({graph: graph});
</script>
