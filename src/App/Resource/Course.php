<?php

namespace App\Resource;
use App\Resource;
use App\Service\Course as CourseService;

class Course extends Resource
{
    /**
     * @var \App\Service\Course
     */
    private $courseService;

    /**
     * Get course service
     */
    public function init()
    {
        $this->setCourseService(new CourseService($this->getEntityManager()));
    }

    /**
     * @param null $id
     */
    public function get($id = null)
    {
        if ($id === null) {
            $data = $this->getCourseService()->getCourses();
        } else {
            $data = $this->getCourseService()->getSubjects($id);
        }


        if ($data === null) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        $response = array('course' => $data);
        self::response(self::STATUS_OK, $response);
    }


    /**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'));
    }

    /**
     * @return \App\Service\Course
     */
    public function getCourseService()
    {
        return $this->courseService;
    }

    /**
     * @param \App\Service\Course $courseService
     */
    public function setCourseService($courseService)
    {
        $this->courseService = $courseService;
    }


    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}