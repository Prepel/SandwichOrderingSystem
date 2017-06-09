<?php

namespace Controller\View;


use Controller\Supplier\SupplierController;
use Silex\Application;

class ViewController
{
    public function renderPersonLoginOverview(Application $app)
    {
        return $app['twig']->render('helloworld.twig');
    }

    public function renderSandwichOverviewPage(Application $app, $supplierId){
        $supplierController = new SupplierController();
        $supplier = $supplierController->getSupplierById($supplierId);


        // TODO twig rendering en mooie pagina bouwen.

        // TODO mogelijk nog logica om te zorgen dat dit goed weergegeven kan worden.
        return print_r($supplier, true);
    }
}
