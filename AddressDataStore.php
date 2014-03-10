<?php

require_once('filestore.php');

class AddressDataStore extends Filestore {
}
class AddressDataStoreLower extends AddressDataStore {
	function __construct ($filename) {
		$this->filename = strtolower($filename);
		parent::__construct($filename);
	}
}

