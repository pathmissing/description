<?php

/**
 * AppserverIo\Description\Api\Node\ReferencesNodeTrait
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Description\Api\Node;

use AppserverIo\Description\Annotations as DI;

/**
 * DTO to transfer the reference configuration.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */
trait ReferencesNodeTrait
{

    /**
     * The enterprise bean reference information.
     *
     * @var array
     * @DI\Mapping(nodeName="epb-ref", nodeType="array", elementType="AppserverIo\Description\Api\Node\EpbRefNode")
     */
    protected $epbRefs = array();

    /**
     * The resource reference information.
     *
     * @var array
     * @DI\Mapping(nodeName="res-ref", nodeType="array", elementType="AppserverIo\Description\Api\Node\ResRefNode")
     */
    protected $resRefs = array();

    /**
     * The resource reference information.
     *
     * @var array
     * @DI\Mapping(nodeName="bean-ref", nodeType="array", elementType="AppserverIo\Description\Api\Node\BeanRefNode")
     */
    protected $beanRefs = array();

    /**
     * The persistence unit reference information.
     *
     * @var array
     * @DI\Mapping(nodeName="persistence-unit-ref", nodeType="array", elementType="AppserverIo\Description\Api\Node\PersistenceUnitRefNode")
     */
    protected $persistenceUnitRefs = array();

    /**
     * Return's the enterprise bean reference information.
     *
     * @return array The enterprise bean reference information
     */
    public function getEpbRefs()
    {
        return $this->epbRefs;
    }

    /**
     * Return's the resource reference information.
     *
     * @return array The resource reference information
     */
    public function getResRefs()
    {
        return $this->resRefs;
    }

    /**
     * Return's the bean reference information.
     *
     * @return array The bean reference information
     */
    public function getBeanRefs()
    {
        return $this->beanRefs;
    }

    /**
     * Return's the persistence unit reference information.
     *
     * @return array The persistence unit reference information
     */
    public function getPersistenceUnitRefs()
    {
        return $this->persistenceUnitRefs;
    }
}
