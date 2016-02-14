<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Database\Schema\Collection;

/**
 * ModelMaps Controller
 *
 */
class ModelMapsController extends AppController {

	public function index() {
		$this->autoRender = false;
		//array order is important for graph edge hierarchy
		$connections = array("HasOne", "HasMany", "BelongsTo", "HasAndBelongsToMany");
		$connectionArray = array();

		$db = ConnectionManager::get('default');

		$collection = $db->schemaCollection();

		$tables = $collection->listTables();

		foreach ($tables as $table) {
			$connectionArray[$table] = [];
			foreach ($connections as $edgeRank => $connection) {
				$model = TableRegistry::get($table);
				echo($table . "<br />");
//				debug($model->associations());
				foreach ($model->associations() as $key => $association) {
//					debug($association);
					$class = get_class($association);
					$array = explode("\\", $class);
					$type = array_pop($array);
					echo("<span style='margin-left: 10px;'>" . $type . ": " . $key . "</span><br />");
//					if (!empty($connectionArray[$table][$key])) {
//						$currentVL = $connectionArray[$table][$key];
//					} else {
//						$currentVL = 0;
//					}
//					$connectionArray[$table][$key] = max(array($currentVL, $edgeRank));
				}
			}
//			debug($connectionArray);
//			$connectionArray = array_map("unserialize", array_unique(array_map("serialize", $connectionArray)));
//			$connectionArray = array_intersect_key($connectionArray, array_unique(array_map('serialize', $connectionArray)));
		}

//		$this->set(compact('tables', 'connectionArray'));
	}

}

?>
