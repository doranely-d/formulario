<?php

class Roles extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=500, nullable=false)
     */
    public $nombre;

    /**
     *
     * @var string
     * @Column(column="estatus", type="string", length=5, nullable=false)
     */
    public $estatus;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("u314659280_formulario");
        $this->setSource("roles");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'roles';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Roles[]|Roles|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Roles|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
