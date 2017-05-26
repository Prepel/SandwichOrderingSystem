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



    /** Order */

    /**
     * @param $personName
     *
     * @return array
     */
    public function getUnprocessedOrderByPersonName($personName)
    {
        $stmt = $this->pdo->prepare("
            SELECT      o.id as order_id,
                        o.person_name,
                        ol.id as order_line_id,
                        ol.topped_sandwich_id,
                        ol.amount,
                        ol.remark,
                        ol.processed
            FROM        `order` o
            INNER JOIN  order_line ol ON o.id = ol.order_id
            WHERE       person_name = :personName
            AND         ol.processed = 0
        ");

        $stmt->bindValue(':personName', $personName);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /** END OF Order */
}
