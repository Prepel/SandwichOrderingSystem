<?php

namespace Controller\Supplier;

use Controller\Sandwich\SandwichController;
use Dao\SupplierDao;
use Domain\Supplier\Supplier;
use Domain\Util\Email;
use Domain\Util\Name;
use Domain\Util\PhoneNumber;

class SupplierController
{

    public function getSuppliers()
    {
        $dao = new SupplierDao();
        $suppliersData = $dao->getSuppliers();

        return $this->createSuppliersFromDatabaseData($suppliersData);
    }

    /**
     * @param int $supplierId
     *
     * @return Supplier
     */
    public function getSupplierById( $supplierId )
    {
        $dao          = new SupplierDao();
        $supplierData = $dao->getSupplierById( $supplierId );

        if (!$supplierData) {
            throw new SupplierNotFoundException( 'Supplier with id: ' . $id . ' can not be found.' );
        }

        return $this->createSupplierFromDatabaseData( $supplierData );
    }

    /**
     * @param array $suppliersData
     *
     * @return Supplier[]
     */
    private function createSuppliersFromDatabaseData($suppliersData)
    {
        $suppliers = [];
        foreach($suppliersData as $supplierData) {
            $suppliers[] = $this->createsupplierFromDatabaseData($supplierData);
        }

        return $suppliers;
    }

    /**
     * @param array $supplierData
     *
     * @return Supplier
     */
    private function createsupplierFromDatabaseData( $supplierData )
    {
        $sandwichController = new SandwichController();
        $toppedSandwiches   = $sandwichController->getActiveToppedSandwichesForSupplierId( $supplierData[ 'id' ] );

        return new Supplier(
            $supplierData[ 'id' ],
            new Name( $supplierData[ 'name' ] ),
            new Email( $supplierData[ 'email' ] ),
            new PhoneNumber( $supplierData[ 'phone_number' ] ),
            $toppedSandwiches
        );
    }
}
