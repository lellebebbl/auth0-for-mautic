<?php

namespace MauticPlugin\MauticAuth0Bundle\Integration;


use Doctrine\ORM\NonUniqueResultException;
use GuzzleHttp\Client;
use Mautic\CoreBundle\Helper\CoreParametersHelper;
use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\ConfigurationTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\BasicInterface;
use Mautic\PluginBundle\Integration\AbstractSsoServiceIntegration;
use Mautic\UserBundle\Entity\User;
use Mautic\UserBundle\Security\Provider\UserProvider;

/**
 * Class Auth0AuthIntegration
 *
 * @package MauticPlugin\MauticAuth0Bundle\Integration
 */
class Auth0AuthIntegration extends BasicIntegration implements BasicInterface
{
    use ConfigurationTrait;

    public const NAME         = 'Auth0Auth';
    public const DISPLAY_NAME = 'Auth0';
    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return self::DISPLAY_NAME;
    }

    public function getIcon(): string
    {
        return 'plugins/MauticAuth0Bundle/Assets/img/auth0auth.png';
    }

    /**
     * @inheritDoc
     */
    public function getAuthenticationType()
    {
        // TODO: Implement getAuthenticationType() method.
    }

    /**
     * @inheritDoc
     */
    public function getUser($response)
    {
        // TODO: Implement getUser() method.
    }
}