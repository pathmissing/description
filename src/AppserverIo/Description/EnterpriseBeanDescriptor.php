<?php

/**
 * AppserverIo\Description\EnterpriseBeanDescriptor
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
 * @link      https://github.com/appserver-io/description
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Description;

use AppserverIo\Lang\String;
use AppserverIo\Lang\Boolean;
use AppserverIo\Lang\Reflection\ClassInterface;
use AppserverIo\Description\Configuration\ConfigurationInterface;
use AppserverIo\Psr\EnterpriseBeans\EnterpriseBeansException;
use AppserverIo\Psr\EnterpriseBeans\Description\BeanDescriptorInterface;

/**
 * Abstract class for all enterprise bean descriptors.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/description
 * @link      http://www.appserver.io
 */
abstract class EnterpriseBeanDescriptor extends AbstractNameAwareDescriptor implements BeanDescriptorInterface
{

    /**
     * Trait with functionality to handle bean, resource and persistence unit references.
     *
     * @var AppserverIo\Description\DescriptorReferencesTrait
     */
    use DescriptorReferencesTrait;

    /**
     * The beans class name.
     *
     * @var string
     */
    protected $className;

    /**
     * Sets the beans class name.
     *
     * @param string $className The beans class name
     *
     * @return void
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * Returns the beans class name.
     *
     * @return string The beans class name
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Return's the annoation class name.
     *
     * @return string The annotation class name
     */
    abstract protected function getAnnotationClass();

    /**
     * Initializes the bean configuration instance from the passed reflection class instance.
     *
     * @param \AppserverIo\Lang\Reflection\ClassInterface $reflectionClass The reflection class with the bean configuration
     *
     * @return void
     */
    public function fromReflectionClass(ClassInterface $reflectionClass)
    {

        // load class name
        $this->setClassName($reflectionClass->getName());

        // create a new annotation instance
        $annotationInstance = $this->getClassAnnotation($reflectionClass, $this->getAnnotationClass());

        // load the default name to register in naming directory
        if ($nameAttribute = $annotationInstance->getName()) {
            $this->setName(DescriptorUtil::trim($nameAttribute));
        } else {
            // if @Annotation(name=****) is NOT set, we use the short class name by default
            $this->setName($reflectionClass->getShortName());
        }

        // initialize the shared flag @Annotation(shared=true)
        $this->setShared($annotationInstance->getShared());

        // initialize references from the passed reflection class
        $this->referencesFromReflectionClass($reflectionClass);
    }

    /**
     * Initializes a bean configuration instance from the passed configuration node.
     *
     * @param \AppserverIo\Description\Configuration\ConfigurationInterface $configuration The bean configuration
     *
     * @return void
     */
    public function fromConfiguration(ConfigurationInterface $configuration)
    {

        // query for the class name and set it
        if ($className = (string) $configuration->getEpbClass()) {
            $this->setClassName(DescriptorUtil::trim($className));
        }

        // query for the name and set it
        if ($name = (string) $configuration->getEpbName()) {
            $this->setName(DescriptorUtil::trim($name));
        }

        // merge the shared flag
        if ($shared = $configuration->getShared()) {
            $this->setShared(Boolean::valueOf(new String($shared))->booleanValue());
        }

        // initialize references from the passed deployment descriptor
        $this->referencesFromConfiguration($configuration);
    }

    /**
     * Merges the passed configuration into this one. Configuration values
     * of the passed configuration will overwrite the this one.
     *
     * @param \AppserverIo\Psr\EnterpriseBeans\Description\BeanDescriptorInterface $beanDescriptor The configuration to merge
     *
     * @return void
     */
    public function merge(BeanDescriptorInterface $beanDescriptor)
    {

        // check if the classes are equal
        if ($this->getName() !== $beanDescriptor->getName()) {
            throw new EnterpriseBeansException(
                sprintf('You try to merge a bean configuration for "%s" with "%s"', $this->getName(), $beanDescriptor->getName())
            );
        }

        // merge the class name
        if ($className = $beanDescriptor->getClassName()) {
            $this->setClassName($className);
        }

        // merge the shared flag
        $this->setShared($beanDescriptor->isShared());

        // merge the references
        $this->mergeReferences($beanDescriptor);
    }
}
