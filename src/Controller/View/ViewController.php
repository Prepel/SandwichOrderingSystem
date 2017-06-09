<?php

namespace Controller\View;


use Controller\Supplier\SupplierController;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ViewController
{
    public function renderPersonLoginOverview(Application $app, Request $request)
    {
        // step 1; check if cookie name is present. then redirect to step 2.
        if($request->cookies->get('username')){
            return Response::create('', 302, array("Location" => "/selectSupplier"));
        }
        // else render form
        return $app['twig']->render('login.twig');
    }

    public function renderSupplierSelectOverview(Application $app)
    {
        return 'test';
    }

    public function renderSandwichOverviewPage(Application $app, $supplierId){
        $supplierController = new SupplierController();
        $supplier = $supplierController->getSupplierById($supplierId);


        // TODO twig rendering en mooie pagina bouwen.

        // TODO mogelijk nog logica om te zorgen dat dit goed weergegeven kan worden.
        return print_r($supplier, true);
    }
}
