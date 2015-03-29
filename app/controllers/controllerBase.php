<?php

class ControllerBase extends Phalcon\Mvc\Controller
{
	public function initialize()
	{
	$this->tag->setDoctype(\Phalcon\Tag::HTML5);
	echo $this->tag->getDoctype();
	}

}