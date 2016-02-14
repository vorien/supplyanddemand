<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP MapController
 * @author Michael
 */
//To Do:
//	Add routes
//	Add coordinates for cities and waypoints
//	Add map (with zoom)


class MapController extends AppController {

	public $images_base = "/img/supplyanddemand/";
	public $images_area = "backgrounds/";
	public $images_city = "cities/";
	public $images_item = "items/";
	public $images_route = "routes/";

	public function resetTree() {
		$this->autoRender = false;
		$data = TableRegistry::get('Locations');
		$data->recover();
	}

	public function test($warehouse_id = 4) {
		$data = TableRegistry::get('Locations');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['Locations.id' => $warehouse_id]);
		$query->contain([
			"LocationInventories" => [
				"Grades",
				"Items.Types",
				"Items"
			],
			"Distributions" => [
				"Grades",
				"Items.Types",
				"Items"
			],
			"Users.UserPreferences"
		]);

		$locations = $query->all();
//		debug($inventories);

		$images_base = "/img/supplyanddemand/";
		$images_item = $images_base . "items/";
		foreach ($locations as $location) {
//			debug($location);
			$preferences = $location['user']['user_preferences'][0];
//			debug($preferences);
			foreach ($location['distributions'] as $item) {
				$id = $item['id'];
				$name = $item['item']['name'];
				$src = $this->images_base . $this->images_item . $item['item']['icon'] . ".png";
				$srcid = $id;
				$size = $item['item']['icon_display_size'] * 3;
				switch ($item['grade']['name']) {
					case "Common":
						$imgclass = 'commonicon';
						break;
					case "Fine":
						$imgclass = 'fineicon';
						break;
					default:
						debug("Error in item grade, value: ~" . $item['grade']['name'] . "~");
						exit();
						break;
				}
				$divclass = 'itemicon';
				switch ($item['in_out']) {
					case true:
						$divclass .= ' demandicon';
						break;
					case false:
						$divclass .= ' supplyicon';
						break;
					default:
						debug("Error in item direction, value: ~" . $item['direction']['name'] . "~");
						exit();
						break;
				}
				$in_out = $item['in_out'];
				$type = $item['item']['type']['name'];
				$grade = $item['grade']['name'];
				$distributions[$in_out][] = compact('id', 'name', 'src', 'srcid', 'size', 'imgclass', 'divclass', 'in_out', 'type', 'grade');
			}
		}
		$distributions[0] = $this->array_orderby($distributions[0], 'type', SORT_ASC, 'name', SORT_ASC, 'grade', SORT_ASC);
		$distributions[1] = $this->array_orderby($distributions[1], 'type', SORT_ASC, 'name', SORT_ASC, 'grade', SORT_ASC);

//		debug($distributions);

		$locations_json = json_encode($locations, JSON_NUMERIC_CHECK);
		$distributions_json = json_encode($distributions, JSON_NUMERIC_CHECK);

		$this->set(compact('locations', 'distributions', 'locations_json', 'distributions_json', 'preferences'));
	}

	public function showitems() {
		
	}

	public function distributions($location_id = null) {
		$this->autoRender = false;
//		debug($location_id);
		if (empty($location_id)) {
			echo json_encode([]);
			die();
		}
		$data = TableRegistry::get('Distributions');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['Distributions.location_id' => $location_id]);
		$query->contain([
			"Grades",
			"Items.Types",
			"Items"
		]);

		$items = $query->all();
//		debug($items);
		foreach ($items as $item) {
//			debug($item);
			$id = $item['id'];
			$name = $item['item']['name'];
			$src = $this->images_base . $this->images_item . $item['item']['icon'] . ".png";
			$srcid = $id;
			$size = $item['item']['icon_display_size'] * 3;
			switch ($item['grade']['name']) {
				case "Common":
					$imgclass = 'commonicon';
					break;
				case "Fine":
					$imgclass = 'fineicon';
					break;
				default:
					debug("Error in item grade, value: ~" . $item['grade']['name'] . "~");
					exit();
					break;
			}
			$divclass = 'itemicon';
			switch ($item['in_out']) {
				case true:
					$divclass .= ' demandicon';
					break;
				case false:
					$divclass .= ' supplyicon';
					break;
				default:
					debug("Error in item direction, value: ~" . $item['direction']['name'] . "~");
					exit();
					break;
			}
			$in_out = $item['in_out'];
			$type = $item['item']['type']['name'];
			$grade = $item['grade']['name'];
			$distributions[$in_out][] = compact('id', 'name', 'src', 'srcid', 'size', 'imgclass', 'divclass', 'in_out', 'type', 'grade');
//			debug($distributions);
		}
//		debug($distributions);
		$distributions[0] = $this->array_orderby($distributions[0], 'type', SORT_ASC, 'name', SORT_ASC, 'grade', SORT_ASC);
		$distributions[1] = $this->array_orderby($distributions[1], 'type', SORT_ASC, 'name', SORT_ASC, 'grade', SORT_ASC);

//		debug($distributions);


		echo(json_encode($distributions, JSON_NUMERIC_CHECK));
	}

	public function getDistribution($warehouse_id = 4) {
		$data = TableRegistry::get('Locations');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['Locations.id' => $warehouse_id]);
		$query->contain([
			"LocationInventories" => [
				"Grades",
				"Items.Types",
				"Items"
			],
			"Distributions" => [
				"Grades",
				"Items.Types",
				"Items"
			],
			"Users.UserPreferences"
		]);

		$locations = $query->all();
//		debug($inventories);

		$images_base = "/img/supplyanddemand/";
		$images_item = $images_base . "items/";
		foreach ($locations as $location) {
//			debug($location);
			$preferences = $location['user']['user_preferences'][0];
//			debug($preferences);
			foreach ($location['distributions'] as $item) {
				$id = $item['id'];
				$name = $item['item']['name'];
				$src = $images_item . $item['item']['icon'] . ".png";
				$srcid = $id;
				$size = $item['item']['icon_display_size'] * 3;
				switch ($item['grade']['name']) {
					case "Common":
						$imgclass = 'commonicon';
						break;
					case "Fine":
						$imgclass = 'fineicon';
						break;
					default:
						debug("Error in item grade, value: ~" . $item['grade']['name'] . "~");
						exit();
						break;
				}
				$divclass = 'itemicon';
				switch ($item['in_out']) {
					case true:
						$divclass .= ' demandicon';
						break;
					case false:
						$divclass .= ' supplyicon';
						break;
					default:
						debug("Error in item direction, value: ~" . $item['direction']['name'] . "~");
						exit();
						break;
				}
				$in_out = $item['in_out'];
				$type = $item['item']['type']['name'];
				$grade = $item['grade']['name'];
				$distributions[$in_out][] = compact('id', 'name', 'src', 'srcid', 'size', 'imgclass', 'divclass', 'in_out', 'type', 'grade');
			}
		}
		$distributions[0] = $this->array_orderby($distributions[0], 'type', SORT_ASC, 'name', SORT_ASC, 'grade', SORT_ASC);
		$distributions[1] = $this->array_orderby($distributions[1], 'type', SORT_ASC, 'name', SORT_ASC, 'grade', SORT_ASC);

//		debug($distributions);

		$locations_json = json_encode($locations, JSON_NUMERIC_CHECK);
		$distributions_json = json_encode($distributions, JSON_NUMERIC_CHECK);

		$this->set(compact('locations', 'distributions', 'locations_json', 'distributions_json', 'preferences'));
	}

	public function map($user_id = 1, $region_id = 1) {
		$data = TableRegistry::get('UserPreferences');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['UserPreferences.user_id' => $user_id]);

		$preferences = $query->first();
//		debug($preferences);
//		die();
//		$preferences = $region['user']['user_preferences'][0];
		
		
		$data = TableRegistry::get('Regions');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['Regions.id' => $region_id, 'Regions.user_id' => $user_id]);
		$query->contain([
			"Locations",
			"Routes" => [
				"Steps" => [
					"conditions" => [
						"Steps.id" => "Routes.step"
					]
				],
				"Locations",
				"Users.UserPreferences"
			]
		]);

		$region = $query->all();

		$images_base = "/img/supplyanddemand/";
		$images_area = $images_base . "backgrounds/";
		$images_city = $images_base . "cities/";
		$images_item = $images_base . "items/";
		$images_route = $images_base . "routes/";


		foreach ($region as $area) {
			$bg_file = $images_area . $area['image'];
			$bg_data = getimagesize(WWW_ROOT . $bg_file);
			$bg_width = $bg_data[0];
			$bg_height = $bg_data[1];
			$background = [
				'src' => $bg_file,
				'width' => $bg_width,
				'height' => $bg_height
			];

			foreach ($area['locations'] as $location) {
				$id = $location['id'];
				$name = $location['name'];
				$src = $images_city . $location['icon'];
				$srcid = $name;
				$size = $location['icon_display_size'];
				$iconclass = 'locationicon';
				$divclass = 'locationdiv';
				$left = $bg_width * $location['pct_we'];
				$top = $bg_height * $location['pct_ns'];
				$locations[] = compact('id', 'name', 'src', 'srcid', 'size', 'iconclass', 'divclass', 'left', 'top');
			}
			foreach ($area['routes'] as $route) {
				$id = $route['id'];
				$name = $route['name'];
				$src = $images_route . $route['icon'];
				$srcid = $name;
				$size = $route['icon_display_size'];
				$iconclass = 'routeicon';
				$divclass = 'routediv';
				if (!empty($route['location'])) {
					$pct_we = $route['location']["pct_we"];
					$pct_ns = $route['location']["pct_ns"];
				} else {
					$pct_we = $route['pct_we'];
					$pct_ns = $route['pct_ns'];
				}
				$left = $pct_we * $bg_width;
				$top = $pct_ns * $bg_height;
				$routes[] = compact('id', 'name', 'src', 'srcid', 'size', 'iconclass', 'divclass', 'left', 'top', 'location');
			}

			$area_json = json_encode($area, JSON_NUMERIC_CHECK);
			$background_json = json_encode($background, JSON_NUMERIC_CHECK);
			$locations_json = json_encode($locations, JSON_NUMERIC_CHECK);
			$routes_json = json_encode($routes, JSON_NUMERIC_CHECK);
//			$items_json = json_encode($items, JSON_NUMERIC_CHECK);
		}
		$this->set(compact('background', 'area_json', 'background_json', 'locations_json', 'routes_json', 'preferences'));
//		$this->render('test');
	}

	public function array_orderby() {  // Thanks to jimpoz at jimpoz dot com (circa 2001)
		$args = func_get_args();
		$data = array_shift($args);
		foreach ($args as $n => $field) {
			if (is_string($field)) {
				$tmp = array();
				foreach ($data as $key => $row)
					$tmp[$key] = $row[$field];
				$args[$n] = $tmp;
			}
		}
		$args[] = &$data;
		call_user_func_array('array_multisort', $args);
		return array_pop($args);
	}

	public function get_items($location = null) {
//				foreach ($location['xrefs'] as $item) {
//					$id = $item['id'];
//					$name = $item['item']['name'];
//					$src = $images_item . $item['item']['icon'] . ".png";
//					$srcid = $id;
//					$size = $area['item_icon_size'];
//					switch ($item['grade']['name']) {
//						case "Common":
//							$iconclass = 'commonicon';
//							break;
//						case "Fine":
//							$iconclass = 'fineicon';
//							break;
//						default:
//							debug("Error in item grade, value: ~" . $item['grade']['name'] . "~");
//							exit();
//							break;
//					}
//					$divclass = 'itemicon';
//					switch ($item['direction']['name']) {
//						case "Supply":
//							$left = $location_l - ($area['item_supply_offset'] + $size);
//							$divclass .= ' supplyicon';
//							break;
//						case "Demand":
//							$left = $location_l + ($area['item_demand_offset']);
//							$divclass .= ' demandicon';
//							break;
//						default:
//							debug("Error in item direction, value: ~" . $item['direction']['name'] . "~");
//							exit();
//							break;
//					}
//					$top = $location_t - ($area['item_vertical_offset'] + $size);
//					$direction = $item['direction']['name'];
//					$type = $item['item']['type']['name'];
//					$grade = $item['grade']['name'];
//					$items[] = compact('id', 'name', 'src', 'srcid', 'size', 'iconclass', 'divclass', 'left', 'top', 'direction', 'type', 'grade');
//				}
	}

	public function index() {

		$data = TableRegistry::get('Locations');
		$query = $data->find();

		$query->hydrate(false);

		$query->contain([
			'Xrefs' => [
				'queryBuilder' => function ($q) {
					return $q->order(['Locations.location', 'Directions.direction' => 'DESC', 'Types.type', 'Items.item', 'Grades.grade']);
				},
						"Directions",
						"Items",
						"Items.Types",
						"Locations",
						"Grades"
					]
				]);


				$display = [];
				foreach ($query as $location) {
					foreach ($location['xrefs'] as $xref) {
						$lval = $xref['location']['location'];
						$display[$lval]['ldata'] = ['h' => $xref['location']['pct_from_left'], 'v' => $xref['location']['pct_from_top'], 's' => $xref['location']['size']];
						$dval = $xref['direction']['direction'];
						$tval = $xref['item']['type']['type'];
						$ival = $xref['item']['item'];
						$gval = $xref['grade']['grade'];
						$icon = $xref['item']['icon'] . "_" . $xref['direction']['icon'] . "_" . $xref['grade']['icon'];
						$display[$lval]['sd'][$dval][$tval][$ival][] = ['grade' => $gval, 'icon' => $icon];
					}
				}
				$this->set(compact('display'));
			}

			public function oldtest($user_id = 1, $region_id = 1) {
				$data = TableRegistry::get('Regions');
				$query = $data->find();
				$query->hydrate(false);
				$query->where(['Regions.id' => $region_id, 'Regions.user_id' => $user_id]);
				$query->contain([
					"Locations" => [
						"Warehouses" => [
							"WarehouseInventories" => [
								"Grades",
								"Items.Types",
								"Items"
							],
							"Distributions" => [
								"Grades",
								"Items.Types",
								"Items"
							]
						]
					]
				]);

				$regions = $query->all();
//		debug($regions);


				$data = TableRegistry::get('Regions');
				$query = $data->find();
				$query->hydrate(false);
				$query->where(['Regions.id' => $region_id, 'Regions.user_id' => $user_id]);
				$query->contain([
					"Routes" => [
						"Transports",
						"RouteInventories" => [
							"Grades",
							"Items.Types",
							"Items"
						],
						"Steps" => [
							"Transfers"
						]
					],
				]);

				$routes = $query->all();
				debug($routes);
			}

		}
		