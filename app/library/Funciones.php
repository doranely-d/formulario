<?php
class Funciones extends \Phalcon\Mvc\User\Component
{
	/**
	 *  genera el mensaje de respuesta
	 *  @var string $mensaje con la información del mensaje
	 *  @return array con el mensaje de respuesta
	 *  @author Dora Nely Vega Gonzalez
	 */
	public function getMensaje($mensaje)
	{
		$resultado = array();

		if($mensaje){
			$resultado['estatus'] = $mensaje[0]; // obtiene el estatus del mensaje en la posición 0
			$resultado['mensaje'] = $mensaje[1]; // obtiene el string del mensaje en la posición 1
			$resultado['datos'] = $mensaje[2]; // obtiene los datos del mensaje en la posición 2
		}

		return $resultado; //mensaje de respuesta
	}
}