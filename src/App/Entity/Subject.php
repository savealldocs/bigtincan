<?php

namespace App\Entity;
use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="subject")
 */
class Subject extends Entity
{

    protected $code;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $description;


    /**
     * @Column(type="integer")
     * @var integer
     */
    protected $hidden;


    /**
     * @ManyToOne(targetEntity="Course", inversedBy="subject")
     * @JoinColumn(name="course_id", referencedColumnName="id")
     */
    private $course_id;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

}