<?php

/**
 * \AppserverIo\Description\Api\Node\SessionNode
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
use AppserverIo\Description\Configuration\SessionConfigurationInterface;

/**
 * DTO to transfer a session bean configuration.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */
class SessionNode extends AbstractNode implements SessionConfigurationInterface
{

    /**
     * The trait providing the reference information.
     *
     * @var \AppserverIo\Description\Api\Node\ReferencesNodeTrait
     */
    use ReferencesNodeTrait;

    /**
     * The session bean type information.
     *
     * @var \AppserverIo\Description\Api\Node\ValueNode
     * @DI\Mapping(nodeName="session-type", nodeType="AppserverIo\Description\Api\Node\ValueNode")
     */
    protected $sessionType;

    /**
     * The enterprise bean name information.
     *
     * @var \AppserverIo\Description\Api\Node\ValueNode
     * @DI\Mapping(nodeName="epb-name", nodeType="AppserverIo\Description\Api\Node\ValueNode")
     */
    protected $epbName;

    /**
     * The enterprise bean class information.
     *
     * @var \AppserverIo\Description\Api\Node\ValueNode
     * @DI\Mapping(nodeName="epb-class", nodeType="AppserverIo\Description\Api\Node\ValueNode")
     */
    protected $epbClass;

    /**
     * The init on startup information.
     *
     * @var \AppserverIo\Description\Api\Node\ValueNode
     * @DI\Mapping(nodeName="init-on-startup", nodeType="AppserverIo\Description\Api\Node\ValueNode")
     */
    protected $initOnStartup;

    /**
     * The post construct information.
     *
     * @var \AppserverIo\Description\Api\Node\PostConstructNode
     * @DI\Mapping(nodeName="post-construct", nodeType="AppserverIo\Description\Api\Node\PostConstructNode")
     */
    protected $postConstruct;

    /**
     * The pre destroy information.
     *
     * @var \AppserverIo\Description\Api\Node\PreDestroyNode
     * @DI\Mapping(nodeName="pre-destroy", nodeType="AppserverIo\Description\Api\Node\PreDestroyNode")
     */
    protected $preDestroy;

    /**
     * The post detach information.
     *
     * @var \AppserverIo\Description\Api\Node\PostDetachNode
     * @DI\Mapping(nodeName="post-detach", nodeType="AppserverIo\Description\Api\Node\PostDetachNode")
     */
    protected $postDetach;

    /**
     * The pre destroy information.
     *
     * @var \AppserverIo\Description\Api\Node\PreAttachNode
     * @DI\Mapping(nodeName="pre-attach", nodeType="AppserverIo\Description\Api\Node\PreAttachNode")
     */
    protected $preAttach;

    /**
     * The post activate information.
     *
     * @var \AppserverIo\Description\Api\Node\PostActivateNode
     * @DI\Mapping(nodeName="post-activate", nodeType="AppserverIo\Description\Api\Node\PostActivateNode")
     */
    protected $postActivate;

    /**
     * The pre passivate information.
     *
     * @var \AppserverIo\Description\Api\Node\PrePassivateNode
     * @DI\Mapping(nodeName="pre-passivate", nodeType="AppserverIo\Description\Api\Node\PrePassivateNode")
     */
    protected $prePassivate;

    /**
     * The remove method information.
     *
     * @var \AppserverIo\Description\Api\Node\PreAttachNode
     * @DI\Mapping(nodeName="remove-method", nodeType="AppserverIo\Description\Api\Node\RemoveMethodNode")
     */
    protected $removeMethod;

    /**
     * The enterprise bean remote interface information.
     *
     * @var \AppserverIo\Description\Api\Node\ValueNode
     * @DI\Mapping(nodeName="remote", nodeType="AppserverIo\Description\Api\Node\ValueNode")
     */
    protected $remote;

    /**
     * The enterprise bean local interface information.
     *
     * @var \AppserverIo\Description\Api\Node\ValueNode
     * @DI\Mapping(nodeName="local", nodeType="AppserverIo\Description\Api\Node\ValueNode")
     */
    protected $local;

    /**
     * The bean shared information.
     *
     * @var \AppserverIo\Description\Api\Node\ValueNode
     * @DI\Mapping(nodeName="shared", nodeType="AppserverIo\Description\Api\Node\ValueNode")
     */
    protected $shared;

    /**
     * Return's the session bean type information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode The session bean type information
     */
    public function getSessionType()
    {
        return $this->sessionType;
    }

    /**
     * Return's the enterprise bean name information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode The enterprise bean name information
     */
    public function getEpbName()
    {
        return $this->epbName;
    }

    /**
     * Return's the enterprise bean class information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode The enterprise bean class information
     */
    public function getEpbClass()
    {
        return $this->epbClass;
    }

    /**
     * Return's the init on startup information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode The init on startup information
     */
    public function getInitOnStartup()
    {
        return $this->initOnStartup;
    }

    /**
     * Return's the post construct information.
     *
     * @return \AppserverIo\Description\Api\Node\PostConstructNode The post construct information
     */
    public function getPostConstruct()
    {
        return $this->postConstruct;
    }

    /**
     * Return's the pre destroy information.
     *
     * @return \AppserverIo\Description\Api\Node\PreDestroyNode The pre destroy information
     */
    public function getPreDestroy()
    {
        return $this->preDestroy;
    }

    /**
     * Return's the post detach information.
     *
     * @return \AppserverIo\Description\Api\Node\PostDetachNode The post detach information
     */
    public function getPostDetach()
    {
        return $this->postDetach;
    }

    /**
     * Return's the pre attach information.
     *
     * @return \AppserverIo\Description\Api\Node\PreAttachNode The pre attach information
     */
    public function getPreAttach()
    {
        return $this->preAttach;
    }

    /**
     * Return's the post activate information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode
     */
    public function getPostActivate()
    {
        return $this->postActivate;
    }

    /**
     * Return's the pre passivate information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode
     */
    public function getPrePassivate()
    {
        return $this->prePassivate;
    }

    /**
     * Return's the remove method information.
     *
     * @return \AppserverIo\Description\Api\Node\RemoveMethodNode The remove method information
     */
    public function getRemoveMethod()
    {
        return $this->removeMethod;
    }

    /**
     * Return's the enterprise bean remote interface information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode The enterprise bean remote interface information
     */
    public function getRemote()
    {
        return $this->remote;
    }

    /**
     * Return's the enterprise bean local interface information.
     *
     * @return \AppserverIo\Description\Api\Node\ValueNode The enterprise bean local interface information
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Return's the bean shared information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface
     */
    public function getShared()
    {
        return $this->shared;
    }
}
