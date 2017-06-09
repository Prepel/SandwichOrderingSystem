<?php

namespace Controller\View;


use Controller\Supplier\SupplierController;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ViewController
{
    /**
     * @param Application $app
     * @param Request $request
     *
     * @return mixed
     */
    public function renderPersonLoginOverview(Application $app, Request $request)
    {
        // step 1; check if cookie name is present. then redirect to step 2.
        if($request->cookies->get('username')){
            return Response::create('', 302, array("Location" => "/selectSupplier"));
        }
        // else render form
        return $app['twig']->render('login.twig');
    }

    /**
     * @param Application $app
     *
     * @return mixed
     */
    public function renderSupplierSelectOverview(Application $app)
    {
        $supplierController = new SupplierController();
        $suppliers = $supplierController->getSuppliers();

        return $app['twig']->render('suppliers.twig', ['suppliers' => $suppliers]);
    }

    /**
     * @param Application $app
     * @param $supplierId
     *
     * @return mixed
     */
    public function renderSandwichOverviewPage(Application $app, $supplierId){
        $supplierController = new SupplierController();
        $supplier = $supplierController->getSupplierById($supplierId);


        // TODO twig rendering en mooie pagina bouwen.

        // TODO mogelijk nog logica om te zorgen dat dit goed weergegeven kan worden.
        return print_r($supplier, true);
    }
}
