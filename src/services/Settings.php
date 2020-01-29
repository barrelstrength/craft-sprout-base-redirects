<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutbaseredirects\services;

use barrelstrength\sproutbase\SproutBase;
use barrelstrength\sproutbaseredirects\models\Settings as RedirectsSettings;
use Craft;
use craft\base\Model;
use yii\base\Component;
use yii\db\Exception;

/**
 *
 * @property null|Model $pluginSettings
 * @property Model      $redirectsSettings
 * @property int        $descriptionLength
 */
class Settings extends Component
{
    /**
     * @return Model|null
     */
    public function getPluginSettings()
    {
        $sproutSeo = Craft::$app->getPlugins()->getPlugin('sprout-seo');
        $settings = null;
        if ($sproutSeo) {
            $settings = $sproutSeo->getSettings();
        } else {
            $sproutRedirects = Craft::$app->getPlugins()->getPlugin('sprout-redirects');
            if ($sproutRedirects) {
                $settings = $sproutRedirects->getSettings();
            }
        }

        return $settings;
    }

    /**
     * @return Model
     */
    public function getRedirectsSettings(): Model
    {
        $settings = SproutBase::$app->settings->getBaseSettings(RedirectsSettings::class);

        return $settings;
    }

    /**
     * @param array $settingsArray
     *
     * @return mixed
     * @throws Exception
     */
    public function saveRedirectsSettings(array $settingsArray)
    {
        return SproutBase::$app->settings->saveBaseSettings($settingsArray, RedirectsSettings::class);
    }
}
