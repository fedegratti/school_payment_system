<?php

class ConfigurationController
{
    public static function listConfigurationView()
    {
        $configModel = new ConfigurationModel();

        (new ListConfigurationView())->show($configModel->getConfiguration());
    }

    public static function updateConfigurationView()
    {
        $configModel = new ConfigurationModel();
        $configModel->getConfiguration();
    }
    public static function updateConfigurationAction()
    {
        $configModel = new ConfigurationModel();
        $configModel->updateConfiguration($_POST);
    }

    public  static function isSiteEnabled()
    {
        $configModel = new ConfigurationModel();
        return $configModel->isSiteEnabled();
    }
    public  static function siteUnavailableView()
    {
        $configModel = new ConfigurationModel();
        (new UnavailableSiteView())->show($configModel->getDisabledSiteMessage());
    }
}