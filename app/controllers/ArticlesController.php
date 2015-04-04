<?php

class ArticlesController extends ControllerBase
{

	public function indexAction()
	{
		$this->view->setTemplateBefore('public');
	}

}
