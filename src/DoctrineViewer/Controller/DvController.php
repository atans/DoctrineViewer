<?php
namespace DoctrineViewer\Controller;

use Doctrine\ORM\EntityManager;
use DoctrineViewer\Exception;
use Zend\Mvc\Controller\AbstractActionController;

class DvController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function indexAction()
    {
        $metadatas = $this->getEntityManager()->getMetadataFactory()->getAllMetadata();

        return array(
            'metadatas' => $metadatas,
        );
    }

    public function entityAction()
    {
        $request = $this->getRequest();

        $class = $request->getQuery('class');
        if (!$class) {
            throw new RuntimeException('class is required');
        }

        $metadata = $this->getEntityManager()->getClassMetadata($class);

        return array(
            'class'    => $class,
            'metadata' => $metadata,
        );
    }

    /**
     * Get entityManager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        if (!$this->entityManager instanceof EntityManager) {
            $this->setEntityManager($this->getServiceLocator()->get('doctrine.entitymanager.orm_default'));
        }
        return $this->entityManager;
    }

    /**
     * Set entityManager
     *
     * @param  EntityManager $entityManager
     * @return DvController
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }
}
