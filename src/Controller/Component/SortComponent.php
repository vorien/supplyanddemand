<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class SortComponent extends Component {

	public function array_orderby() {  // Thanks to jimpoz at jimpoz dot com (circa 2001)
		$args = func_get_args();
		$data = array_shift($args);
		foreach ($args as $n => $field) {
			if (is_string($field)) {
				$tmp = array();
				foreach ($data as $key => $row) {
					$tmp[$key] = $row[$field];
					$args[$n] = $tmp;
				}
			}
		}
		$args[] = &$data;
		call_user_func_array('array_multisort', $args);
		return array_pop($args);
	}

}
