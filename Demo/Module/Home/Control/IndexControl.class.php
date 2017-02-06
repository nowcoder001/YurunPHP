<?php
class IndexControl extends Control
{
	public function index()
	{
		// 驱动使用
		// Cache::set('memcache.yurunphp',Yurun::YURUN_VERSION);
		// echo Cache::get('memcache.yurunphp');
		
		$model = new TestModel;
		$this->view->msg = $model->getMsg();
		$this->view->memory = memory_get_usage() / 1024;
		// $this->view->xxx和$this->view->set('xxx','')是等价的
		$this->view->set('time', (microtime(true) - YURUN_START) * 1000);
		$this->view->display();
	}
}