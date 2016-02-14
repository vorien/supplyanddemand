<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class ItemArrayComponent extends Component {

	public $components = ['Sort'];

	function getItemArray($query, $sizemult = 1) {
		$query->hydrate(false);
		$query->contain([
			"Grades",
			"Items.Types",
			"Items"
		]);

		$items = $query->all();
		if (count($items) === 0) {
			return [];
		}
		$itemarray = [];
		foreach ($items as $item) {
			$itemarray['id'] = $item['id'];
			$itemarray['name'] = $item['item']['name'];
			$itemarray['src'] = $this->_registry->getController()->images_item . $item['item']['icon'] . ".png";
			$itemarray['srcid'] = $item['id'];
			$itemarray['size'] = $item['item']['icon_display_size'] * $sizemult;
			switch ($item['grade']['name']) {
				case "Common":
					$itemarray['imgclass'] = 'commonicon';
					break;
				case "Fine":
					$itemarray['imgclass'] = 'fineicon';
					break;
				default:
					debug("Error in item grade, value: ~" . $item['grade']['name'] . "~");
					exit();
					break;
			}
			$itemarray['divclass'] = 'itemicon';
			if (array_key_exists('quantity', $item)) {
				$itemarray['quantity'] = $item['quantity'];
			}
			if (array_key_exists('in_out', $item)) {
				switch ($item['in_out']) {
					case true:
						$itemarray['divclass'] .= ' demandicon';
						break;
					case false:
						$itemarray['divclass'] .= ' supplyicon';
						break;
					default:
						debug("Error in item direction, value: ~" . $item['direction']['name'] . "~");
						exit();
						break;
				}
				$itemarray['in_out'] = $item['in_out'];
			}
			$itemarray['type'] = $item['item']['type']['name'];
			$itemarray['grade'] = $item['grade']['name'];
			$return[] = $itemarray;
		}
		if (!empty($return)) {
			$return = $this->Sort->array_orderby($return, 'type', SORT_ASC, 'name', SORT_ASC, 'grade', SORT_ASC);
		}
		return $return;
	}

}
