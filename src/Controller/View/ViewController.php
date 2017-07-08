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
    public function renderOrderPage(Application $app, $supplierId = 1){
        $supplierController = new SupplierController();
        $supplier = $supplierController->getSupplierById($supplierId);

        $uniqueToppings = $supplier->getUniqueToppings();

            return $app['twig']->render(
            'orderPage/orderPage.twig',
            [
                'supplier' => $supplier,
                'toppings' => $uniqueToppings
            ]
        );
        // TODO twig rendering en mooie pagina bouwen.

        // TODO mogelijk nog logica om te zorgen dat dit goed weergegeven kan worden.
    }

    /**
     * @param Application $app
     * @param $flavour
     * @param $supplierId
     */
    public function renderSelectPopup(Application $app, $flavour, $supplierId){

        // TODO Get all linked sandwiches to flavour and supplier
        // TODO get possible configurations
        // TODO render twig.

    }
}
