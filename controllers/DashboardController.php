<?php
namespace dashboard\controllers;

use dashboard\models\Dashboard;
use dashboard\extensions\AdminNav;

class DashboardController extends \app\extensions\action\Controller {
	
	public function admin_index() {
		$adminNav = new AdminNav();
		$adminNav = $adminNav->get();
		print_r($adminNav);
	}
}
