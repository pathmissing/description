<?php

/**
 * AppserverIo\Description\Configuration\AnnotationRegistryConfigurationInterface
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
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/description
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Description\Configuration;

/**
 * Interface for all DTOs to transfer a doctrine entity manager custom annotation configuration.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/description
 * @link      http://www.appserver.io
 */
interface AnnotationRegistryConfigurationInterface extends DirectoriesAwareConfigurationInterface
{

    /**
     * Returns the annotation registry's type.
     *
     * @return string The fannotation registry's type
     */
    public function getType();

    /**
     * Returns the annotation registry's file.
     *
     * @return string The annotation registry's file
     */
    public function getFile();

    /**
     * Returns the annotation registry's namespace.
     *
     * @return string The annotation registry's namespace
     */
    public function getNamespace();
}
