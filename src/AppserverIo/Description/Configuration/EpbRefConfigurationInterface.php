<?php

/**
 * AppserverIo\Description\Configuration\EpbRefConfigurationInterface
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
 * Interface for a enterprise bean reference DTO implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */
interface EpbRefConfigurationInterface
{

    /**
     * Return's the enterprise bean reference information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The enterprise bean reference name information
     */
    public function getEpbRefName();

    /**
     * Return's the enterprise bean description information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The enterprise bean description information
     */
    public function getDescription();

    /**
     * Return's the enterprise bean link information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The enterprise bean link information
     */
    public function getEpbLink();

    /**
     * Return's the enterprise bean lookup name information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The enterprise bean lookup name information
     */
    public function getLookupName();

    /**
     * Return's the enterprise bean remote interface information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The enterprise bean remote interface information
     */
    public function getRemote();

    /**
     * Return's the enterprise bean local interface information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The enterprise bean local interface information
     */
    public function getLocal();

    /**
     * Return's the enterprise bean injection target information.
     *
     * @return \AppserverIo\Description\Configuration\InjectionTargetConfigurationInterface The enterprise bean injection target information
     */
    public function getInjectionTarget();
}
