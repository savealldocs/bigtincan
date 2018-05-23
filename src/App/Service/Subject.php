<?php

namespace App\Service;

use App\Service;
use App\Entity\Subject as SubjectEntity;
use Doctrine\ORM\EntityRepository;

class Subject extends Service
{
    /**
     * @return array|null
     */
    public function getSubjectDetail($id = null)
    {
        $query = $this->getEntityManager()->createQuery('SELECT s FROM App\Entity\Subject s WHERE s.id=:id')->setParameter('id', $id);
        $subjects = $query->getResult();

        if (empty($subjects)) {
            return '{data:null}';
        }

        $data = array();
        foreach ($subjects as $subject)
        {
            $data[] = array(
                'id' => $subject->getId(),
                'description' => $subject->getDescription(),
                'name' => $subject->getName()
            );
        }
        return $data;
    }

    /**
     * @param null $id
     * @param null $name
     * @param null $description
     * @return array|mixed
     */
    public function setSubjectDetail($id = null, $name= null, $description = null)
    {

        $data = array();
        $qb = $this->getEntityManager()->createQueryBuilder();
        $q = $qb->update('App\Entity\Subject ','s')
            ->set('s.description', $qb->expr()->literal($description))
            ->set('s.name', $qb->expr()->literal($name))
            ->where('s.id = ?1')
            ->setParameter(1, $id)
            ->getQuery();
        $data = $q->execute();
        return $data;
    }

    /**
     * @param null $id
     * @return array|mixed
     */
    public function deleteSubject($id = null)
    {
        $data = array();
        $qb = $this->getEntityManager()->createQueryBuilder();

        $q = $qb->delete('App\Entity\Subject ','s')
            ->where('s.id = ?1')
            ->setParameter(1, $id)
            ->getQuery();
        $data = $q->execute();
        return $data;
    }

    public function setSubjectHidden($id = null, $hidden = null)
    {
        $data = array();
        $qb = $this->getEntityManager()->createQueryBuilder();
        $q = $qb->update('App\Entity\Subject ','s')
            ->set('s.hidden', $hidden)
            ->where('s.id = ?1')
            ->setParameter(1, $id)
            ->getQuery();
        $data = $q->execute();

        return $data;
    }

}