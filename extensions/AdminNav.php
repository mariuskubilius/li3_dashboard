<?php
namespace li3_dashboard\extensions;

class AdminNav extends \lithium\core\Object {
	
	protected $_classes = array(
		'libraries' => 'lithium\core\Libraries',
		'cache' => 'lithium\storage\Cache',
	);
	
	protected $_navigationFile = 'config/navigation.json';
	
	/**
	 * Retrieve admin navigation either from cache or from navigation.
	 * @return Array an array containing whole navigation
	 */
	public function get(){
		$cache = $this->_classes['cache'];
		$key = md5('dashboard').'.admin.nav';
		$nav = $cache::read('default', $key);
		if ($nav) {
			return $nav;
		}
		
		$nav = $this->_getItems();
		$cache::write('default', $key, $nav, '+15 minutes');
		return $nav;
	}
	/**
	 * returns all menu items defined in config json file
	 * @return array
	 */
	protected function _getItems() {
		$libraries = $this->_classes['libraries'];
		$items = array();
		foreach ($libraries::get() as $name => $config) {
			if ($name === 'lithium') {
				continue;
			}
			$file = "{$config['path']}/{$this->_navigationFile}";
			$json = file_exists($file) ? file_get_contents($file) : null;
			$parsed = $json ? json_decode($json, true) : null;
			$parsed ? $items = array_merge_recursive($parsed, $items) : null;
		}
		//$items = $this->_weight($items);
		return $this->_processItems($items);
	}
	
	protected function _weight($items) {
		usort($items, function($a, $b){
			if ($a['weight'] == $b['weight']) {
				return 0;
			}
			return ($a['weight'] < $b['weight']) ? -1 : 1;
		});
		return $items;
	}
	protected function _processItems($items) {
		$defaults = array(
			'title' => null,
			'link' => true,
			'weight' => 10,
			'params' => array(),
			'children' => array(),
		);
		$processed = array();
		$items = $this->_weight($items);
		foreach ($items as $key => $item) {
			if(!empty($item['children'])) $item['children'] = $this->_processItems($item['children']);
			$processed[] = $item + $defaults;
		}
		return $processed;
	}
}
?>












