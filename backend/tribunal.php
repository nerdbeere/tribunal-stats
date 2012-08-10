<?php

require_once('tribunal.class.php');

class Stats {
	public function __construct() {
		$this->Tribunal = new Tribunal();
	}

	protected function _get($name) {
		$data = $this->Tribunal->{$name}();
		$result = array();

		$i = 0;
		foreach($data as $key => $item) {
			$result[$i]['name'] = $item['_id'];
			foreach($item['value'] as $key2 => $val) {
				$result[$i][$key2] = $val;
			}
			$i++;
		}

		return $result;
	}

	public function getData() {
		$data = array();

		$data['reported_champions'] = $this->_get('getReportedChampions');
		$data['report_reasons'] = $this->_get('getReportReasons');

		return json_encode($data);
	}
}

$Stats = new Stats();
print $Stats->getData();