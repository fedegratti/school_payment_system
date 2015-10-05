<?php

class ConfigurationController
{
    public static function addConfigurationView()
    {
        AuthController::checkPermission();
        $view = new AddConfigurationView();
        $view->show();
    }

    public static function addConfigurationAction ()
    {
        AuthController::checkPermission();
        $result = (new ConfigurationModel()) ->createConfiguration($_POST);
        if ($result == "SUCCESS")
        {
            header('Location: /ListConfigurations/');
        }
    }

    public static function listConfigurationsView()
    {
        AuthController::checkPermission();
        $configModel = new ConfigurationModel();

        (new ListConfigurationView())->show($configModel->getConfigurations());
    }

    public static function updateConfigurationView($configuration)
    {
        AuthController::checkPermission();
        $result = (new ConfigurationModel()) ->getConfiguration($configuration);

        $view = new UpdateConfigurationView();
        $view->show($result);
    }
    public static function updateConfigurationAction()
    {
        AuthController::checkPermission();
        $result = (new ConfigurationModel()) ->updateConfiguration($_POST);
        if ($result == "SUCCESS")
        {
            header('Location: /ListConfigurations');
        }
    }

    public static function isSiteEnabled()
    {
        $configModel = new ConfigurationModel();
        return $configModel->isSiteEnabled();
    }
    public static function siteUnavailableView()
    {
        $configModel = new ConfigurationModel();
        (new UnavailableSiteView())->show($configModel->getConfiguration("disabledSiteMessage")["value"]);
    }

    public static function deleteConfigurationAction($configuration)
    {
        AuthController::checkPermission();
        $result = (new ConfigurationModel()) ->deleteConfiguration($configuration);
        if($result == "SUCCESS")
        {
            header('Location: /ListConfigurations');
        }
        else
        {
            echo "fallo el delete, conf no existe";
        }

    }
}