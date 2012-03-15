<?php
namespace li3_dashboard\controllers;

use li3_dashboard\models\Dashboard;
use li3_dashboard\extensions\AdminNav;

class DashboardController extends \app\extensions\action\Controller {
	
	public function admin_index() {
		$adminNav = new AdminNav();
		$adminNav = $adminNav->get();
		print_r($adminNav);
	}
}
