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
	public $images_region = "/img/supplyanddemand/backgrounds/";
	public $images_city = "/img/supplyanddemand/cities/";
	public $images_item = "/img/supplyanddemand/items/";
	public $images_route = "/img/supplyanddemand/routes/";

	public function displaysd() {
		
	}

	public function displayroute() {
		
	}

	public function inventories($location_id = null) {
		$this->autoRender = false;
		$this->loadComponent('ItemArray');
		if (empty($location_id)) {
			echo json_encode([]);
			die();
		}
		$data = TableRegistry::get('LocationInventories');
		$query = $data->find();
		$query->where(['LocationInventories.location_id' => $location_id]);
		$inventories = $this->ItemArray->getItemArray($query, 2);
		echo(json_encode($inventories, JSON_NUMERIC_CHECK));
	}

	public function distributions($location_id = null) {
		$this->autoRender = false;
		$this->loadComponent('ItemArray');
		if (empty($location_id)) {
			echo json_encode([]);
			die();
		}
		$data = TableRegistry::get('Distributions');
		$query = $data->find();
		$query->where(['Distributions.location_id' => $location_id]);
		$return = $this->ItemArray->getItemArray($query, 2);
		$distributions = [];
		foreach ($return as $array) {
			$distributions[$array['in_out']][] = $array;
		}
		echo(json_encode($distributions, JSON_NUMERIC_CHECK));
	}

	public function routeinventories($route_id = null) {
		$this->autoRender = false;
		$this->loadComponent('ItemArray');
		if (empty($route_id)) {
			echo json_encode([]);
			die();
		}
		$data = TableRegistry::get('RouteInventories');
		$query = $data->find();
		$query->where(['RouteInventories.route_id' => $route_id]);
		$routeinventories = $this->ItemArray->getItemArray($query, 2);
		echo(json_encode($routeinventories, JSON_NUMERIC_CHECK));
	}

	public function index($user_id = 1, $region_id = 1) {
		$data = TableRegistry::get('UserPreferences');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['UserPreferences.user_id' => $user_id]);

		$preferences = $query->first();

		$data = TableRegistry::get('Items');
		$query = $data->find();
		$query->hydrate(false);
		$query->select(['icon']);
		$query->where(['Items.user_id' => $user_id]);

		$userimages = $query->all();
		foreach ($userimages as $image) {
			$images[] = $this->images_item . $image['icon'] . ".png";
		}



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
				"Locations"
			]
		]);

		$regions = $query->all();


		foreach ($regions as $region) {
			$bg_file = $this->images_region . $region['image'];
			$bg_data = getimagesize(WWW_ROOT . $bg_file);
			$bg_width = $bg_data[0];
			$bg_height = $bg_data[1];
			$background = [
				'src' => $bg_file,
				'width' => $bg_width,
				'height' => $bg_height
			];

			foreach ($region['locations'] as $location) {
				$id = $location['id'];
				$name = $location['name'];
				$src = $this->images_city . $location['icon'];
				$srcid = $name;
				$size = $location['icon_display_size'];
				$iconclass = 'locationicon';
				$divclass = 'locationdiv';
				$left = $bg_width * $location['pct_we'];
				$top = $bg_height * $location['pct_ns'];
				$locations[] = compact('id', 'name', 'src', 'srcid', 'size', 'iconclass', 'divclass', 'left', 'top');
			}
			foreach ($region['routes'] as $route) {
				$id = $route['id'];
				$name = $route['name'];
				$src = $this->images_route . $route['icon'];
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

			$region_json = json_encode($region, JSON_NUMERIC_CHECK);
			$background_json = json_encode($background, JSON_NUMERIC_CHECK);
			$locations_json = json_encode($locations, JSON_NUMERIC_CHECK);
			$routes_json = json_encode($routes, JSON_NUMERIC_CHECK);
			$images_json = json_encode($images, JSON_NUMERIC_CHECK);
		}
		$this->set(compact('background', 'region_json', 'background_json', 'locations_json', 'routes_json', 'preferences', 'images_json'));
//		$this->render('test');
	}

	public function index_old() {
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
		