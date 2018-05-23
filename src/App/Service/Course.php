<?php

namespace App\Service;

use App\Service;
use App\Entity\Course as CourseEntity;
use Doctrine\ORM\EntityRepository;

class Course extends Service
{
        /**
     * @return array|null
     */
    public function getCourses()
    {
        $repository = $this->getEntityManager()->getRepository('App\Entity\Course');
        $courses = $repository->findAll();

        if (empty($courses)) {
            return '{data:null}';
        }

        /**
         * @var \App\Entity\Course $course
         */
        $data = array();
        foreach ($courses as $course)
        {
            $data[] = array(
                'id' => $course->getId(),
                'name' => $course->getName(),
                'code' => $course->getCode()
            );
        }

        return $data;
    }

    /**
     * @param null $id
     * @return array|string
     */
    public function getSubjects($id = null)
    {
        $query = $this->getEntityManager()->createQuery('SELECT s FROM App\Entity\Subject s WHERE s.course_id=:id')->setParameter('id', $id);

        $subjects = $query->getResult();

        if (empty($subjects)) {
            return '{data:null}';
        }

        /**
         * @var \App\Entity\Subject $subject
         */
        $data = array();
        foreach ($subjects as $subject)
        {
            $data[] = array(
                'id' => $subject->getId(),
                'name' => $subject->getName(),
                'description' => $subject->getDescription(),
                'hidden' => $subject->getHidden()

            );
        }

        return $data;
    }
}