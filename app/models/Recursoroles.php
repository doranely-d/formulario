<?php

class RecursoRoles extends \Phalcon\Mvc\Model
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
     * @Column(column="id_rol", type="integer", length=11, nullable=false)
     */
    public $id_rol;

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
        $this->setSource("recurso_roles");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'recurso_roles';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RecursoRoles[]|RecursoRoles|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RecursoRoles|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
