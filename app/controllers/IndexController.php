<?php

class IndexController extends ControllerBase
{

	public function initialize()
	{
        $this->tag->setTitle('index');
        parent::initialize();
	}

	/**  Vista donde se muestra la página del formulario*/
	public function indexAction() {
    }

    /**  Vista donde se muestra la página del formulario*/
    public function modalAction() {
    }

    /**
     *  Guarda el registro
     * @author Dora Nely Vega Gonzalez
     */
    public function guardarAction()
    {
        \Phalcon\Mvc\Model::setup(['ignoreUnknownColumns' => true]);
        $this->view->disable();
        if ($this->request->isPost()) {
            if ($this->request->isAjax() == true) {
                try {
                    //obtenemos el valor de las variables
                    $id = $this->request->getPost('txtId', null, 0);
                    $nombre = $this->request->getPost('txtNombre', null, '');
                    $apellidoP = $this->request->getPost('txtApellidoP', null, '');
                    $apellidoM = $this->request->getPost('txtApellidoM', null, '');
                    $correo = $this->request->getPost('txtCorreo', null, '');
                    $comentarios = $this->request->getPost('txtComentarios', null, '');
                    $ip = empty($_SERVER["REMOTE_ADDR"]) ? "Desconocida" : $_SERVER["REMOTE_ADDR"];

                    if (!empty($nombre) & !empty($apellidoP) & !empty($apellidoM)
                        & !empty($correo) & !empty($comentarios)) {
                        if (empty(($id))) {
                            $registro = new Registros();
                            $registro->nombre = $nombre;
                            $registro->apellido_materno = $apellidoM;
                            $registro->apellido_paterno = $apellidoP;
                            $registro->correo = $correo;
                            $registro->ip = $ip;
                            $registro->comentarios =$comentarios;
                            $registro->fecha_i = date('Y-m-d');
                            $registro->estatus = 'AC';
                        } else {
                            $registro = Registros::findFirst($id);
                            $registro->nombre = $nombre;
                            $registro->apellido_materno = $apellidoM;
                            $registro->apellido_paterno = $apellidoP;
                            $registro->correo = $correo;
                            $registro->ip = $ip;
                            $registro->comentarios =$comentarios;
                        }

                        if ($registro) {
                            if ($registro->save()) {
                                $this->mensaje = ['success', 'Se guardaron correctamente los registros.', null];
                            } else {
                                foreach ($registro->getMessages() as $message) {
                                    $this->msnError .= $message->getMessage() . "<br/>";
                                }
                                $this->mensaje = ['danger', 'Ocurrio un error al agregar los registos.', null];
                            }
                        } else {
                            $this->mensaje = ['warning', 'La acción seleccionada no se encuentra en el sistema.', null];
                        }
                    } else {
                        $this->mensaje = ['warning', 'Los campos * son requeridos.', null];
                    }
                } catch (\Exception $e) {
                    $this->mensaje = ['danger', 'Ocurrio algo mal al intentar accesar a las acciones.', null];
                }
                //obtenemos el mensaje de respuesta
                $funcion = new Funciones();
                $this->resultado = $funcion->getMensaje($this->mensaje);
                $this->response->setContentType('application/json', 'UTF-8');
                $this->response->setJsonContent($this->resultado);
                $this->response->setStatusCode(200, "OK");
                $this->response->send();
            }
        } else {
            $this->response->setStatusCode(404, "Página no encontrada.");
        }
    }
}

