<?php

	require __DIR__.'/vendor/autoload.php';

	use PHPRouter\RouteCollection;
	use PHPRouter\Router;
	use PHPRouter\Route;

    
    // Carga las cosas q esten en la carpeta model, view, controller.

    require_once __DIR__.'/autoload.php';

    if (!ConfigurationController::isSiteEnabled())
    {
        ConfigurationController::siteUnavailableView();
        return;
    }

    session_start();

	$collection = new RouteCollection();


    $collection->attachRoute(new Route('/', array(
        '_controller' => 'HomeController::showHomeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Login/', array(
        '_controller' => 'LoginController::loginView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Logout/', array(
        '_controller' => 'LoginController::logoutView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/Login/:error', array(
        '_controller' => 'LoginController::loginView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/LoginAction/', array(
        '_controller' => 'LoginController::loginAction',
        'methods' => 'POST'
    )));

	$collection->attachRoute(new Route('/AddUser/', array(
		'_controller' => 'UserController::addUserView',
		'methods' => 'GET'
	)));

	$collection->attachRoute(new Route('/AddUserAction/', array(
	    '_controller' => 'UserController::addUserAction',
	    'methods' => 'POST'
	)));

    $collection->attachRoute(new Route('/ListUsers/:index', array(
        '_controller' => 'UserController::listUsersView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListUsers/:index/:userId', array(
        '_controller' => 'UserController::listUsersView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListUsers/', array(
        '_controller' => 'UserController::listUsersView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateUser/:id', array(
        '_controller' => 'UserController::updateUserView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateUserAction/', array(
        '_controller' => 'UserController::updateUserAction',
        'methods' => 'POST'
    )));

	$collection->attachRoute(new Route('/AddStudent/', array(
        '_controller' => 'StudentController::addStudentView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/AddStudentAction/', array(
        '_controller' => 'StudentController::addStudentAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/ListStudents/', array(
        '_controller' => 'StudentController::listStudentsView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListStudents/:studentName', array(
        '_controller' => 'StudentController::listStudentsWithNameView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListStudentsWithPayedEnrolment/:fromIndex', array(
        '_controller' => 'StudentController::listStudentsWithPayedEnrolmentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/listStudentGuardiansView/:studentId', array(
        '_controller' => 'StudentController::listStudentGuardiansView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListAdmittedStudents/', array(
        '_controller' => 'StudentController::listAdmittedStudentsView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddGuardian/', array(
        '_controller' => 'GuardianController::addGuardianView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddGuardian/:studentId', array(
        '_controller' => 'GuardianController::addGuardianView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddGuardianForUser/:userId', array(
        '_controller' => 'GuardianController::addGuardianForUserView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddGuardianAction/', array(
        '_controller' => 'GuardianController::addGuardianAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/AddFee/', array(
        '_controller' => 'FeeController::addFeeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddFeeAction/', array(
        '_controller' => 'FeeController::addFeeAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/UpdateFeeAction/', array(
        '_controller' => 'FeeController::updateFeeAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/UpdateFee/:feeID', array(
        '_controller' => 'FeeController::updateFeeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/DeleteFee/:feeID', array(
        '_controller' => 'FeeController::deleteFeeAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/DeleteFeeAction/:feeID', array(
        '_controller' => 'FeeController::deleteFeeAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListFees/', array(
        '_controller' => 'FeeController::listFeesView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListFees/:id', array(
        '_controller' => 'FeeController::listStudentFeesView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/PayOrGrantFee/:feeId/:studentID/:grant', array(
        '_controller' => 'PaymentController::payOrGrantFeeView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/ListGuardians/:index', array(
        '_controller' => 'GuardianController::listGuardiansView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/ListGuardians/', array(
        '_controller' => 'GuardianController::listGuardiansView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/DeleteGuardian/:guardianID', array(
        '_controller' => 'GuardianController::deleteGuardianAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/UpdateGuardian/:guardianID', array(
        '_controller' => 'GuardianController::updateGuardianView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/UpdateGuardianAction/', array(
        '_controller' => 'GuardianController::updateGuardianAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithStudentAction/:guardianID/:studentID', array(
        '_controller' => 'GuardianController::associateWithStudentAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithUser/:userID', array(
        '_controller' => 'GuardianController::associateWithUserView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithUserAction/:guardianID/:userID', array(
        '_controller' => 'GuardianController::associateWithUserAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateStudent/:studentID', array(
        '_controller' => 'StudentController::updateStudentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateStudentAction/:studentID', array(
        '_controller' => 'StudentController::updateStudentAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/DeleteUser/:id', array(
        '_controller' => 'UserController::deleteUserView',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/DeleteUserAction/:id', array(
        '_controller' => 'UserController::deleteUserAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/DeleteStudentAction/:studentID', array(
        '_controller' => 'StudentController::deleteStudentAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddConfiguration/', array(
        '_controller' => 'ConfigurationController::addConfigurationView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AddConfigurationAction/', array(
        '_controller' => 'ConfigurationController::addConfigurationAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/ListConfigurations/', array(
        '_controller' => 'ConfigurationController::listConfigurationsView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateConfiguration/:configurationName', array(
        '_controller' => 'ConfigurationController::updateConfigurationView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/UpdateConfigurationAction/', array(
        '_controller' => 'ConfigurationController::updateConfigurationAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/DeleteConfigurationAction/:configurationName', array(
        '_controller' => 'ConfigurationController::deleteConfigurationAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/SiteUnavailable/', array(
        '_controller' => 'ConfigurationController::siteUnavailableView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/BreakGuardianStudentRelationship/:guardianId/:studentId', array(
        '_controller' => 'StudentController::breakGuardianStudentRelationshipAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithStudent/:studentId', array(
        '_controller' => 'GuardianController::associateWithStudentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/AssociateGuardianWithStudent/:studentId/:pagination', array(
        '_controller' => 'GuardianController::associateWithStudentView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/listRevenue', array(
        '_controller' => 'PaymentController::listRevenueView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/listRevenue/:year', array(
        '_controller' => 'PaymentController::listRevenueView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/listRevenueAction', array(
        '_controller' => 'PaymentController::listRevenueAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/listCollectorPaymentRevenue', array(
        '_controller' => 'PaymentController::listCollectorPaymentRevenueView',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/openMaps', array(
        '_controller' => 'MapsController::openMapsView',
        'methods' => 'GET'
    )));

	$router = new Router($collection);
	$router->setBasePath('/');

	$route = $router->matchCurrentRequest();

    // Vamos a usar el PHPRouter para todas las rutas relacionadas a la pagina de la escuela,
    // y Slim para todas las rutas de la api REST.
    // Asique si al llegar una ruta vemos que no pertenece al mapeo de PHPRouter, usamos slim.
    if ($route)
    {

        AuthController::checkPermission($route->getAction());
        $route->dispatch();
    }
    else
    {

        $slimApp = new \Slim\Slim();

        // Retorna un arreglo asociativo con las claves "por_pagar" y "pagas".
        // Cada arreglo dentro de esas 2 cosas contiene los datos de un alumno
        // http://localhost/cuotasImpagasYPorPagarDe/21/year/2016   << este tiene datos cargados para ver
        $slimApp->get('/cuotasImpagasYPorPagarDe/:studentID/year/:year', function ($studentID,$year) use($slimApp)
        {
            $slimApp->response->headers['Access-Control-Allow-Origin'] = "*";
            FeeService::listPaidAndToBePaidFeesOfStudentInYear($slimApp,$studentID,$year);
        });


        // Devuelve un arreglo de 12 posiciones, cada posicion representa un mes, y contiene la cantidad de ingresos
        // en ese mes.
        $slimApp->get('/ingresosTotalesEn/:year', function ($year) use($slimApp)
        {
            $slimApp->response->headers['Access-Control-Allow-Origin'] = "*";
            RevenueService::totalRevenueByMonthInYear($slimApp,$year);
        });

        $slimApp->get('/getUsersPosition', function ()
        {
            $positions = [[-57.9749, -34.9205], [-57.9799, -34.9305]];
            echo json_encode($positions);
        });

        // Si slim detecta q la ruta no existe, se va a encargar de retornar el codigo de error y lo q necesite.
        $slimApp->run();
    }


