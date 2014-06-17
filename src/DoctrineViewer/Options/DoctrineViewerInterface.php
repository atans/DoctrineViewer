<?php
namespace DoctrineViewer\Options;

interface DoctrineViewerInterface
{
    /**
     * Set entityManagerName
     *
     * @param  string $entityManagerName
     * @return ModuleOptions
     */
    public function setEntityManagerName($entityManagerName);

    /**
     * Get entityManagerName
     *
     * @return string
     */
    public function getEntityManagerName();
}