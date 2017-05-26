<?php

namespace Controller\Sandwich;

use Dao\Dao;
use Domain\Sandwich\Flavour;
use Domain\Sandwich\Sandwich;
use Domain\Sandwich\Size;
use Domain\Sandwich\ToppedSandwich;
use Domain\Sandwich\Topping;
use Domain\Sandwich\Type;
use Domain\Supplier\Supplier;
use Domain\Util\Currency;
use Domain\Util\Money;
use Domain\Util\Name;
use Domain\Util\PositiveFloat;

class SandwichController
{

    /**
     * @param int $id
     *
     * @return ToppedSandwich
     */
    public function getToppedSandwichById( $id )
    {
        $dao                = new Dao();
        $toppedSandwichData = $dao->getToppedSandwichById( $id );

        if (!$toppedSandwichData) {
            throw new ToppedSandwichNotFoundException( 'ToppedSandwich with id: ' . $id . ' can not be found.' );
        }

        return $this->createToppedSandwichFromDatabaseData($toppedSandwichData);
    }

    /**
     * @param int $supplierId
     *
     * @return ToppedSandwich[]
     */
    public function getActiveToppedSandwichesForSupplierId( $supplierId )
    {
        $dao                  = new Dao();
        $toppedSandwichesData = $dao->getActiveToppedSandwichesBySupplierId( $supplierId );
        return $this->createToppedSandwichesFromDatabaseData( $toppedSandwichesData );
    }

    /**
     * @param array $toppedSandwichesData
     *
     * @return ToppedSandwich[]
     */
    private function createToppedSandwichesFromDatabaseData( $toppedSandwichesData )
    {
        $toppedSandwiches = [];

        foreach ($toppedSandwichesData as $toppedSandwichData) {

            $toppedSandwiches[] = $this->createToppedSandwichFromDatabaseData( $toppedSandwichData );
        }

        return $toppedSandwiches;
    }

    /**
     * @param array $toppedSandwichData
     *
     * @return ToppedSandwich
     */
    private function createToppedSandwichFromDatabaseData( $toppedSandwichData )
    {
        $sandwich = new Sandwich(
            new Type(
                new Name( $toppedSandwichData[ 'type' ] )
            ),
            new Size(
                new Name( $toppedSandwichData[ 'size' ] )
            ),
            new Flavour(
                new Name( $toppedSandwichData[ 'flavour' ] )
            )
        );

        $topping = new Topping(
            new Name( $toppedSandwichData[ 'topping' ] )
        );

        $money = new Money(
            new Currency( 'EUR' ),
            new PositiveFloat( $toppedSandwichData[ 'price' ] )
        );

        return new ToppedSandwich(
            $toppedSandwichData[ 'id' ],
            $sandwich,
            $topping,
            $money,
            $toppedSandwichData[ 'active' ]
        );
    }
}
