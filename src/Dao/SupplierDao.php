<?php

namespace Dao;

class SupplierDao extends Dao
{
    /**
     * @return array
     */
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
}
