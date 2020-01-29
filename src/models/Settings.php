<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutbaseredirects\models;


use barrelstrength\sproutbase\base\SharedPermissionsInterface;
use Craft;
use craft\base\Model;

/**
 *
 * @property array  $sharedPermissions
 * @property string $mainPluginHandle
 * @property array  $settingsNavItems
 */
class Settings extends Model implements SharedPermissionsInterface
{
    /**
     * @var string
     */
    public $pluginNameOverride = '';

    /**
     * @var string
     */
    public $structureId = '';

    /**
     * @var bool
     */
    public $enable404RedirectLog = false;

    /**
     * @var int
     */
    public $total404Redirects = 250;

    /**
     * @var bool
     */
    public $trackRemoteIp = false;

    /**
     * @var string
     */
    public $redirectMatchStrategy = 'urlWithoutQueryStrings';

    /**
     * @var string
     */
    public $queryStringStrategy = 'removeQueryStrings';

    /**
     * @var string
     */
    public $excludedUrlPatterns;

    /**
     * @var int
     */
    public $cleanupProbability = 1000;

    public function getSettingsNavItems(): array
    {
        return [
            'general' => [
                'label' => Craft::t('sprout-base-redirects', 'General'),
                'url' => 'sprout-redirects/settings/general',
                'selected' => 'general',
                'template' => 'sprout-base-redirects/settings/general'
            ],
            'redirects' => [
                'label' => Craft::t('sprout-base-redirects', 'Redirects'),
                'url' => 'sprout-redirects/settings/redirects',
                'selected' => 'redirects',
                'template' => 'sprout-base-redirects/settings/redirects'
            ]
        ];
    }

    /**
     * @return array
     */
    public function getSharedPermissions(): array
    {
        return [
            'editRedirects'
        ];
    }
}
