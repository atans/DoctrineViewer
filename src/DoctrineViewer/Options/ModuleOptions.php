<?php
namespace DoctrineViewer\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements DoctrineViewerInterface
{
    /**
     * @var string
     */
    protected $entityManagerName = 'doctrine.entitymanager.orm_default';

    /**
     * Get entityManagerName
     *
     * @return string
     */
    public function getEntityManagerName()
    {
        return $this->entityManagerName;
    }

    /**
     * Set entityManagerName
     *
     * @param  string $entityManagerName
     * @return ModuleOptions
     */
    public function setEntityManagerName($entityManagerName)
    {
        $this->entityManagerName = $entityManagerName;
        return $this;
    }
}