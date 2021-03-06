<?php

/**
 * AppserverIo\Description\Configuration\BeanRefConfigurationInterface
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

namespace AppserverIo\Description\Configuration;

/**
 * Interface for a bean reference DTO implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */
interface BeanRefConfigurationInterface
{

    /**
     * Return's the bean reference information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The bean reference name information
     */
    public function getBeanRefName();

    /**
     * Return's the bean link information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The bean link information
     */
    public function getBeanLink();

    /**
     * Return's the bean reference information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The bean reference name information
     */
    public function getBeanRefType();

    /**
     * Return's the bean description information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The bean description information
     */
    public function getDescription();

    /**
     * Return's the bean injection target information.
     *
     * @return \AppserverIo\Description\Configuration\InjectionTargetConfigurationInterface The bean injection target information
     */
    public function getInjectionTarget();
}
