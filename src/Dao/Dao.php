<?php

namespace Dao;

class Dao
{
    /** @var  \PDO */
    protected $pdo;

    /**
     * Dao constructor.
     */
    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
        // set fetch mode to fetch assoc default, so we don't have to add it in every fetch.
        $this->pdo->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC );
    }

    /** Sandwiches */
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


    /** END OF Sandwiches */

    /** Supplier */

    public function getSuppliers()
    {
        $stmt = $this->pdo->prepare("
            SELECT  id,
                    name,
                    email,
                    phone_number
            FROM    supplier
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * @param int $supplierId
     *
     * @return array
     */
    public function getSupplierById( $supplierId )
    {
        $stmt = $this->pdo->prepare( "
            SELECT  id,
                    name,
                    email,
                    phone_number
            FROM    supplier
            WHERE   id = :supplierId 
        " );

        $stmt->bindValue( ':supplierId', $supplierId );
        $stmt->execute();

        return $stmt->fetch();
    }

    /** END OF Supplier */
}
