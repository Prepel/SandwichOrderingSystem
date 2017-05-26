<?php

namespace Dao;

class SandwichDao extends Dao
{
    /**
     * @param $toppedSandwichId
     *
     * @return array
     */
    public function getToppedSandwichById($toppedSandwichId)
    {
        $stmt = $this->pdo->prepare( "
            SELECT  id,
                    supplier_id,
                    type,
                    size,
                    flavour,
                    topping,
                    price,
                    active
            FROM    topped_sandwich
            WHERE   id = :toppedSandwichId
        " );

        $stmt->bindValue( ':toppedSandwichId', $toppedSandwichId );
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * @param int $supplierId
     *
     * @return array
     */
    public function getActiveToppedSandwichesBySupplierId( $supplierId )
    {
        $stmt = $this->pdo->prepare( "
            SELECT  id,
                    supplier_id,
                    type,
                    size,
                    flavour,
                    topping,
                    price,
                    active
            FROM    topped_sandwich
            WHERE   active = 1 
            AND     supplier_id = :supplierId
        " );

        $stmt->bindValue( ':supplierId', $supplierId );
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
