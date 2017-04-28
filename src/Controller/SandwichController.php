<?php

namespace Controller;

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
     * @param Supplier $supplier
     *
     * @return array
     */
    public function getActiveToppedSandwichesForSupplier( Supplier $supplier )
    {
        $dao                = new Dao();
        $toppedSandwichData = $dao->getActiveToppedSandwichesBySupplierId( $supplier->getId() );
        return $this->createToppedSandwichesFromDatabaseData( $toppedSandwichData );
    }

    /**
     * @param $toppedSandwichData
     *
     * @return array
     */
    private function createToppedSandwichesFromDatabaseData( $toppedSandwichData )
    {
        $toppedSandwiches = [];

        // TODO think of a good name
        foreach ($toppedSandwichData as $ts) {

            $sandwich = new Sandwich(
                new Type(
                    new Name( $ts[ 'type' ] )
                ),
                new Size(
                    new Name( $ts[ 'size' ] )
                ),
                new Flavour(
                    new Name( $ts[ 'flavour' ] )
                )
            );

            $topping = new Topping(
                new Name( $ts[ 'topping' ] )
            );

            $money = new Money(
                new Currency( 'EUR' ),
                new PositiveFloat( $ts[ 'price' ] )
            );


            $toppedSandwiches[] = new ToppedSandwich(
                $ts[ 'id' ],
                $sandwich,
                $topping,
                $money,
                $ts[ 'active' ]
            );
        }

        return $toppedSandwiches;
    }
}
