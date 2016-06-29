<?php

abstract class View

{

	protected $data = [];

	public function __construct($data) {
		$this->data = $data;

	}  

	abstract public function render();
}

// Header and footer normally go on this page ie common page content