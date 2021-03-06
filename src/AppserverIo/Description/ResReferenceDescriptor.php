<?php

/**
 * AppserverIo\Description\ResReferenceDescriptor
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

use AppserverIo\Lang\Reflection\ClassInterface;
use AppserverIo\Lang\Reflection\MethodInterface;
use AppserverIo\Lang\Reflection\PropertyInterface;
use AppserverIo\Description\Configuration\ResRefConfigurationInterface;
use AppserverIo\Psr\EnterpriseBeans\Annotations\Resource;
use AppserverIo\Psr\EnterpriseBeans\Description\NameAwareDescriptorInterface;
use AppserverIo\Psr\EnterpriseBeans\Description\ResReferenceDescriptorInterface;

/**
 * Utility class that stores a resource reference configuration.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/description
 * @link      http://www.appserver.io
 */
class ResReferenceDescriptor extends AbstractReferenceDescriptor implements ResReferenceDescriptorInterface
{

    /**
     * The resource type.
     *
     * @var string
     */
    protected $type;

    /**
     * The lookup name.
     *
     * @var string
     */
    protected $lookup;

    /**
     * Sets the resource type.
     *
     * @param string $type The resource type
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the resource type.
     *
     * @return string The resource type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the lookup name.
     *
     * @param string $lookup The lookup name
     *
     * @return void
     */
    public function setLookup($lookup)
    {
        $this->lookup = $lookup;
    }

    /**
     * Returns the lookup name.
     *
     * @return string The lookup name
     */
    public function getLookup()
    {
        return $this->lookup;
    }

    /**
     * Returns a new descriptor instance.
     *
     * @param \AppserverIo\Psr\EnterpriseBeans\Description\NameAwareDescriptorInterface $parent The parent descriptor instance
     *
     * @return \AppserverIo\Psr\EnterpriseBeans\Description\EpbReferenceDescriptorInterface The descriptor instance
     */
    public static function newDescriptorInstance(NameAwareDescriptorInterface $parent)
    {
        return new ResReferenceDescriptor($parent);
    }

    /**
     * Creates and initializes a beans reference configuration instance from the passed
     * reflection class instance.
     *
     * @param \AppserverIo\Lang\Reflection\ClassInterface $reflectionClass The reflection class with the beans reference configuration
     *
     * @return \AppserverIo\Psr\EnterpriseBeans\Description\ResReferenceDescriptorInterface|null The initialized descriptor instance
     */
    public function fromReflectionClass(ClassInterface $reflectionClass)
    {
        throw new \Exception(__METHOD__ . ' not implemented yet');
    }

    /**
     * Creates and initializes a beans reference configuration instance from the passed
     * reflection property instance.
     *
     * @param \AppserverIo\Lang\Reflection\PropertyInterface $reflectionProperty The reflection property with the beans reference configuration
     *
     * @return \AppserverIo\Psr\EnterpriseBeans\Description\ResReferenceDescriptorInterface|null The initialized descriptor instance
     */
    public function fromReflectionProperty(PropertyInterface $reflectionProperty)
    {

        // create a new annotation instance
        $annotationInstance = $this->getPropertyAnnotation($reflectionProperty, Resource::class);

        // if we found a @Resource annotation, load the annotation instance
        if ($annotationInstance === null) {
            // if not, do nothing
            return;
        }

        // load the reference name defined as @Resource(name=****)
        if ($name = $annotationInstance->getName()) {
            $this->setName($name);
        } else {
            $this->setName(ucfirst($reflectionProperty->getPropertyName()));
        }

        // load the resource type defined as @Resource(type=****)
        if ($type = $annotationInstance->getType()) {
            $this->setType($type);
        } else {
            $this->setType(ucfirst($reflectionProperty->getPropertyName()));
        }

        // load the lookup defined as @Resource(lookup=****)
        if ($lookup = $annotationInstance->getLookup()) {
            $this->setLookup($lookup);
        }

        // load the resource description defined as @Resource(description=****)
        if ($description = $annotationInstance->getDescription()) {
            $this->setDescription($description);
        }

        // load the injection target data
        if ($injectionTarget = InjectionTargetDescriptor::newDescriptorInstance()->fromReflectionProperty($reflectionProperty)) {
            $this->setInjectionTarget($injectionTarget);
        }

        // return the instance
        return $this;
    }

    /**
     * Creates and initializes a beans reference configuration instance from the passed
     * reflection method instance.
     *
     * @param \AppserverIo\Lang\Reflection\MethodInterface $reflectionMethod The reflection method with the beans reference configuration
     *
     * @return \AppserverIo\Psr\EnterpriseBeans\Description\EpbReferenceDescriptorInterface|null The initialized descriptor instance
     */
    public function fromReflectionMethod(MethodInterface $reflectionMethod)
    {

        // load the annotation instance
        $annotationInstance = $this->getMethodAnnotation($reflectionMethod, Resource::class);

        // if we found a @Resource annotation, load the annotation instance
        if ($annotationInstance === null) {
            // if not, do nothing
            return;
        }

        // load the reference name defined as @Resource(name=****)
        if ($name = $annotationInstance->getName()) {
            $this->setName($name);
        } else {
            // use the name of the first parameter
            foreach ($reflectionMethod->getParameters() as $reflectionParameter) {
                $this->setName(ucfirst($name = $reflectionParameter->getParameterName()));
                break;
            }
        }

        // load the resource type defined as @Resource(type=****)
        if ($type = $annotationInstance->getType()) {
            $this->setType($type);
        } else {
            // use the name of the first parameter as local business interface
            foreach ($reflectionMethod->getParameters() as $reflectionParameter) {
                $this->setType(ucfirst($reflectionParameter->getParameterName()));
                break;
            }
        }

        // load the lookup defined as @Resource(lookup=****)
        if ($lookup = $annotationInstance->getLookup()) {
            $this->setLookup($lookup);
        }

        // load the resource description defined as @Resource(description=****)
        if ($description = $annotationInstance->getDescription()) {
            $this->setDescription($description);
        }

        // load the injection target data
        if ($injectionTarget = InjectionTargetDescriptor::newDescriptorInstance()->fromReflectionMethod($reflectionMethod)) {
            $this->setInjectionTarget($injectionTarget);
        } else {
            // initialize a default injection target, which is the constructor
            // and assume that the parameter name equals the reference name
            $injectionTarget = InjectionTargetDescriptor::newDescriptorInstance();
            $injectionTarget->setTargetMethod('__construct');
            $injectionTarget->setTargetMethodParameterName(lcfirst($name));

            // set the default injection target
            $this->setInjectionTarget($injectionTarget);
        }

        // return the instance
        return $this;
    }

    /**
     * Creates and initializes a beans reference configuration instance from the passed
     * configuration node.
     *
     * @param \AppserverIo\Description\Configuration\ResRefConfigurationInterface $configuration The configuration node with the beans reference configuration
     *
     * @return \AppserverIo\Psr\EnterpriseBeans\Description\EpbReferenceDescriptorInterface|null The initialized descriptor instance
     */
    public function fromConfiguration(ResRefConfigurationInterface $configuration)
    {

        // query for the reference name
        if ($name = (string) $configuration->getResRefName()) {
            $this->setName($name);
        }

        // query for the reference type
        if ($type = (string) $configuration->getResRefType()) {
            $this->setType($type);
        }

        // query for the description and set it
        if ($description = (string) $configuration->getDescription()) {
            $this->setDescription($description);
        }

        // query for the lookup name and set it
        if ($lookup = (string) $configuration->getLookupName()) {
            $this->setLookup($lookup);
        }

        // query for the reference position
        if ($position = (integer) $configuration->getPosition()) {
            $this->setPosition($position);
        }

        // load the injection target data
        if ($injectionTarget = $configuration->getInjectionTarget()) {
            $this->setInjectionTarget(InjectionTargetDescriptor::newDescriptorInstance()->fromConfiguration($injectionTarget));
        } else {
            // initialize a default injection target, which is the constructor
            // and assume that the parameter name equals the reference name
            $injectionTarget = InjectionTargetDescriptor::newDescriptorInstance();
            $injectionTarget->setTargetMethod('__construct');
            $injectionTarget->setTargetMethodParameterName(lcfirst($name));

            // set the default injection target
            $this->setInjectionTarget($injectionTarget);
        }

        // return the instance
        return $this;
    }

    /**
     * Merges the passed configuration into this one. Configuration values
     * of the passed configuration will overwrite the this one.
     *
     * @param \AppserverIo\Psr\EnterpriseBeans\Description\ResReferenceDescriptorInterface $resReferenceDescriptor The configuration to merge
     *
     * @return void
     */
    public function merge(ResReferenceDescriptorInterface $resReferenceDescriptor)
    {

        // merge the reference name
        if ($name = $resReferenceDescriptor->getName()) {
            $this->setName($name);
        }

        // merge the reference type
        if ($type = $resReferenceDescriptor->getType()) {
            $this->setType($type);
        }

        // merge the lookup name
        if ($lookup = $resReferenceDescriptor->getLookup()) {
            $this->setLookup($lookup);
        }

        // merge the description
        if ($description = $resReferenceDescriptor->getDescription()) {
            $this->setDescription($description);
        }

        // merge the injection target
        if ($injectionTarget = $resReferenceDescriptor->getInjectionTarget()) {
            $this->setInjectionTarget($injectionTarget);
        }
    }
}
