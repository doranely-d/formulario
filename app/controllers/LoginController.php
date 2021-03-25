<?php

class LoginController extends ControllerBase
{

	public function initialize()
	{
		$this->tag->setTitle('Login');
		parent::initialize();
	}

	/**  Vista donde se muestra la página de login*/
	public function indexAction() {}

	 /**
     *  Método para dar/denegar acceso por medio de login
     *  @author Dora Nely Vega Gonzalez
     */
    public function loginAction(){
        \Phalcon\Mvc\Model::setup(['ignoreUnknownColumns' => true]);
        $this->view->disable();

        if ($this->request->isPost()) {

            try {
				$usuario = $this->request->getPost('txtUsuario', null, '');
                $password = $this->request->getPost('txtPassword', null, '');

                if (!empty($usuario) && !empty($password)) {

                    //Consulta el usuario a ingresar
                    $usuario = Usuarios::query()
                        ->columns(array('id_usuario' => "Usuarios.id", 'usuario' => 'Usuarios.usuario',
                            'password' => 'Usuarios.password', 'estatus' => 'Usuarios.estatus'))
                        ->innerJoin('Usuarioroles', "Usuarioroles.id_usuario = Usuarios.id", 'Usuarioroles')
                        ->innerJoin('Roles', "Roles.id = Usuarioroles.id_rol", 'Roles')
                        ->conditions('Usuarios.usuario= :usuario: AND Usuarios.estatus= :estatus: 
                                    AND Usuarioroles.estatus= :estatus:')
                        ->bind(['usuario' => trim($usuario), 'estatus' => 'AC'])
                        ->execute()->getFirst();

                    if ($usuario) {
                        //Hacemos la consulta de los roles del usuario
                        $roles = Roles::query()
                            ->columns(array('id' => "Roles.id", 'nombre' => "Roles.nombre"))
                            ->innerJoin('Usuarioroles', "Usuarioroles.id_rol = Roles.id", 'Usuarioroles')
                            ->conditions('Usuarioroles.id_usuario = :id_usuario: AND Roles.estatus = :estatus:')
                            ->bind(['id_usuario' => $usuario->id_usuario, 'estatus' => 'AC'])
                            ->execute();

                        if($roles){
                            //validamos el password
                            $security = new \Phalcon\Security();

                            if ($security->checkHash($password, $usuario->password)) {
                                //crea la sesión del usuario
                                $this->session->usuario = [
                                    "id_usuario" => $usuario->id_usuario,
                                    "usuario" => $usuario->usuario,
                                    "roles" => $roles,
                                    "isLogin" => 'isLogin'
                                ];
                                $this->mensaje = ['success', 'A ingresado correctamente al sistema.', null];
                            }else{
                                $this->mensaje = ['warning', 'El usuario o la contraseña son incorrectos.', null];
                            }
                        }else{
                            $this->mensaje = ['warning', 'El usuario o la contraseña son incorrectos.', null];
                        }
                    } else {
                        $this->mensaje = ['warning', 'El usuario no se encuentra registrado.', null];
                    }
                } else {
                    $this->mensaje = ['warning', 'Los campos * son requeridos.', null];
                }
            } catch (\Exception $e) {
                $this->mensaje = ['error', 'Ocurrio algo mal al intentar entrar al sistema.', null];
            }

            //obtenemos el mensaje de respuesta
            $funcion = new Funciones();
            $this->resultado = $funcion->getMensaje($this->mensaje);
            $this->response->setContentType('application/json', 'UTF-8');
            $this->response->setJsonContent($this->resultado);
            $this->response->setStatusCode(200, "OK");
            $this->response->send();
        } else {
            $this->response->setStatusCode(404, "Página no encontrada");
        }
    }

    /**
     *  Método para cerrar sesiones
     *  @author Dora Nely Vega González
     */
    public function logoutAction() {
        $this->view->disable();

        //Remueve la sesión de usuario
        $this->session->remove("usuario");
        // Destruye la sesión usuario
        $this->session->destroy();

        return $this->response->redirect('index');
    }
}

