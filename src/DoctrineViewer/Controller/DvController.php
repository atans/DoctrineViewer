<?php
namespace DoctrineViewer\Controller;

use Doctrine\ORM\EntityManagerInterface;
use DoctrineViewer\Exception;
use DoctrineViewer\Options\DoctrineViewerInterface;
use Zend\Mvc\Controller\AbstractActionController;

class DvController extends AbstractActionController
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var DoctrineViewerInterface
     */
    protected $options;

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
        if (! strlen($class)) {
            throw new Exception\RuntimeException('class is required');
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
     * @return EntityManagerInterface
     */
    public function getEntityManager()
    {
        if (!$this->entityManager instanceof EntityManagerInterface) {
            $this->setEntityManager($this->getServiceLocator()->get($this->getOptions()->getEntityManagerName()));
        }
        return $this->entityManager;
    }

    /**
     * Set entityManager
     *
     * @param  EntityManagerInterface $entityManager
     * @return DvController
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * Get options
     *
     * @return DoctrineViewerInterface
     */
    public function getOptions()
    {
        if (! $this->options instanceof DoctrineViewerInterface) {
            $this->setOptions($this->getServiceLocator()->get('doctrineviewer_module_options'));
        }
        return $this->options;
    }

    /**
     * Set options
     *
     * @param  DoctrineViewerInterface $options
     * @return DvController
     */
    public function setOptions(DoctrineViewerInterface $options)
    {
        $this->options = $options;
        return $this;
    }
}
