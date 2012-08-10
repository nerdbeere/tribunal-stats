<?php

class Tribunal {

	public function __construct() {
		$m = new Mongo();
		$db = $m->selectDB("tribunal");
		$this->Incidents = $db->incidents;
		$this->Cases = $db->cases;
		$this->ReportedChampions = $db->reported_champions;
		$this->ReportReasons = $db->report_reasons;
	}

	public function getReportedChampions() {
		$res = $this->ReportedChampions->find();
		return $res->sort(array(
			'value.count' => -1
		));
	}

	public function getReportReasons() {
		$res = $this->ReportReasons->find();
		return $res->sort(array(
			'value.count' => -1
		));
	}
}
