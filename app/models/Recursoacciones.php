<?php

class RecursoAcciones extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_recurso", type="integer", length=11, nullable=false)
     */
    public $id_recurso;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_accion", type="integer", length=11, nullable=false)
     */
    public $id_accion;

    /**
     *
     * @var string
     * @Column(column="privacidad", type="string", length=50, nullable=false)
     */
    public $privacidad;

    /**
     *
     * @var string
     * @Column(column="estatus", type="string", length=50, nullable=false)
     */
    public $estatus;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("u314659280_formulario");
        $this->setSource("recurso_acciones");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'recurso_acciones';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RecursoAcciones[]|RecursoAcciones|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RecursoAcciones|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
