<?php
namespace App;
use Doctrine\ORM\Mapping;
/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks()
 */
abstract class Entity
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * Constructor
     */
    public function __construct()
    {
    //
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}