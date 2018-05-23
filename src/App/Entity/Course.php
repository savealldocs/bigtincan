<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping ;


 /**
  * @Entity
  * @Table(name="course")
  */
class Course extends Entity
{

    /**
     * @Column(type="string", length=45)
     * @var string
     */
    protected $code;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @OneToMany(targetEntity="Subject", mappedBy="course")
     */
    private $subject;
}