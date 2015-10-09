<?php

class ConfigurationController
{
    public static function addConfigurationView()
    {
        $view = new AddConfigurationView();
        $view->show();
    }

    public static function addConfigurationAction ()
    {
        $result = (new ConfigurationModel()) ->createConfiguration($_POST);
        if ($result == "SUCCESS")
        {
            header('Location: /ListConfigurations/');
        }
    }

    public static function listConfigurationsView()
    {
        $configModel = new ConfigurationModel();

        (new ListConfigurationView())->show($configModel->getConfigurations());
    }

    public static function updateConfigurationView($configurationName)
    {

        $result = (new ConfigurationModel()) ->getConfiguration($configurationName);

        $view = new UpdateConfigurationView();
        $view->show($result);
    }
    public static function updateConfigurationAction()
    {

        $result = (new ConfigurationModel()) ->updateConfiguration($_POST);
        header('Location: /ListConfigurations');
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

    public static function deleteConfigurationAction($configurationName)
    {

        $result = (new ConfigurationModel()) ->deleteConfiguration($configurationName);
        if($result == "SUCCESS")
        {
            header('Location: /ListConfigurations');
        }
        else
        {
            echo "fallo el delete, conf no existe";
        }

    }

    public static function actionNotFound()
    {
        echo "rescatate wachin";
    }

}