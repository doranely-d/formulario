<?php

class Registros extends \Phalcon\Mvc\Model
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
     * @Column(column="$apellido_paterno", type="string", length=1000, nullable=false)
     */
    public $apellido_paterno;

    
    /**
     *
     * @var string
     * @Column(column="apellido_materno", type="string", length=1000, nullable=false)
     */
    public $apellido_materno;

    /**
     *
     * @var string
     * @Column(column="ip", type="string", length=5, nullable=false)
     */
    public $ip;

    /**
     *
     * @var string
     * @Column(column="correo", type="string", length=5, nullable=false)
     */
    public $correo;
    /**
     *
     * @var string
     * @Column(column="comentarios", type="string", length=5, nullable=false)
     */
    public $comentarios;

    /**
     *
     * @var string
     * @Column(column="fecha_i", type="string", length=5, nullable=false)
     */
    public $fecha_i;

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
        $this->setSource("registros");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'registros';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Acciones[]|Acciones|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Acciones|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
