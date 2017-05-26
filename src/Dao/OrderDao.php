<?php

namespace Dao;

class OrderDao extends Dao
{
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

}
