<?php

namespace App\Resource;

use App\Resource;
use App\Service\Subject as SubjectService;

class Subject extends Resource
{
    /**
     * @var \App\Service\Subject
     */

    private $subjectService;

    /**
     * Get subject service
     */
    public function init()
    {
        $this->setSubjectService(new SubjectService($this->getEntityManager()));
    }

    /**
     * @param null $id
     */
    public function get($id = null)
    {
       $data = $this->getSubjectService()->getSubjectDetail($id);

        if ($data === null) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        $response = array('subject' => $data);
        self::response(self::STATUS_OK, $response);
    }

    /**
     * @param null $id
     * @param null $description
     * @return string
     */
    public function put($id = null)
    {
        $hidden = $this->getSlim()->request()->params('hidden');
        if(isset($hidden))
        {
            $data = $this->getSubjectService()->setSubjectHidden($id,$hidden);
        }
        else {
            $name = $this->getSlim()->request()->params('name');
            $description = $this->getSlim()->request()->params('description');
            if (empty($name) || empty($description) || $name === null || $description === null) {
                self::response(self::STATUS_BAD_REQUEST);
                return;
            }
            $data = $this->getSubjectService()->setSubjectDetail($id, $name, $description);
        }

        if (empty($data)) {
            self::response(self::STATUS_NOT_FOUND);
            return ;
        }
        self::response(self::STATUS_OK);
    }

    /**
     * @param null $id
     * @return string
     */

    public function delete($id = null)
    {
        $data = $this->getSubjectService()->deleteSubject($id);

        if (empty($data)) {
            self::response(self::STATUS_NOT_FOUND);
            return ;
        }
        self::response(self::STATUS_OK);
    }

    /**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'));
    }

    /**
     * @return \App\Service\Subject
     */
    public function getSubjectService()
    {
        return $this->subjectService;
    }

    /**
     * @param \App\Service\Subject $subjectService
     */
    public function setSubjectService($subjectService)
    {
        $this->subjectService = $subjectService;
    }


    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}