<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	protected function initialize()
	{
		$this->tag->prependTitle('Sistema Formulario : ');
		$this->view->setVars(
			[
				'id_usuario' => $this->session->usuario['id_usuario'],
				'usuario'    => $this->session->usuario['usuario'],
				'isLogin'    => $this->session->usuario['isLogin'],
				'roles'        => $this->session->usuario['roles'],
			]
		);
	}
}
