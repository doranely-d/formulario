<?php

use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class RegistrosController extends ControllerBase
{

	public function initialize()
	{
        $this->tag->setTitle('Registros');
        parent::initialize();
	}

	/**  Se muestran los registros*/
	public function indexAction() {  }

	/**
	 *  Hace un listado con los registros en formato json
	 * @author Dora Nely Vega Gonzalez
	 */
	public function mostrarAction(){
		\Phalcon\Mvc\Model::setup(['ignoreUnknownColumns' => true]);
		$this->view->disable();

		//Defición de Variables al realizar el filtro
		$limit = $this->request->get('limit', null, 0);
		$offset = $this->request->get('offset', null, 0);
		$order = $this->request->get('order', null, '');
		$sort = $this->request->get('sort', null, '');
		$search = $this->request->get('search', null, '');
		$tienda = $this->request->get('tienda', null, 1);
		$currentPage = (($offset / $limit) + 1);
		$total = 0;
		$rows = array();

		if ($this->request->isGet() == true) {
			if ($this->request->isAjax() == true) {

                $registros = Registros::find([
					'conditions' => "UPPER(nombre) LIKE UPPER(:nombre:)  and estatus='AC'",
					'bind' => ['nombre' => '%' . strtoupper(trim($search)) . '%'],
					'order' => trim($sort) . ' ' . strtoupper(trim($order)),
				
                ]);
				
				// Crear un paginador del modelo
				$paginacion = new PaginatorModel(
					[
						'data' => $registros,
						'limit' => $limit,
						'page' => $currentPage,
					]
				);
				//Obtiene el total de registros
				$total = $paginacion->getPaginate()->total_items;

				// Obtener los resultados paginados
				$rows = $paginacion->getPaginate()->items;
			
			   
				$this->response->setContentType('application/json', 'UTF-8');
				$this->response->setJsonContent(array('total' => $total, 'rows' => $rows));
				$this->response->setStatusCode(200, "OK");
				$this->response->send();
			}
		} else {
			$this->response->setStatusCode(404, "Página no encontrada.");
		}
	}

	/**
	 *  Borra el registro
	 * @var integer $id del registro
	 * @author Dora Nely Vega Gonzalez
	 */
	public function borrarAction()
	{
		\Phalcon\Mvc\Model::setup(['ignoreUnknownColumns' => true]);
		$this->view->disable();

		if ($this->request->isPut() == true) {
			if ($this->request->isAjax() == true) {
				try {
					//obtenemos el id
					$id = $this->request->get('id', null, 0);

					$registro = Registros::findFirst($id);

					if ($registro) {
                        $registro->estatus = 'IN';  //cambiamos el estatus a INACTIVO

						if ($registro->save()) {
							$this->mensaje = ['success', 'Se borro correctamente la acción seleccionada.', null];
						} else {
							foreach ($registro->getMessages() as $message) {
								$this->msnError .= $message->getMessage() . "<br/>";
							}
							$this->mensaje = ['danger', 'Ocurrio un problema al intentar borrar la acción seleccionada.', null];
						}
					} else {
						$this->mensaje = ['warning', 'La acción no se encuentra en base de datos.', null];
					}
				} catch (\Exception $e) {
                    $this->logger->error($e->getFile() . '::' . $e->getLine() . '::' . $e->getMessage());
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

	/**
     *  Función para exportar el reporte
     *  @return array en formato excel 
     *  @author Dora Nely Vega Gonzalez
     */
    public function exportarAction(){
       
		//Obtemos los registros
		$registros = Registros::find("estatus='AC'");

		//enviamos los registros a la vista
		$this->view->registros = $registros;

        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=Registros");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
    }
}

