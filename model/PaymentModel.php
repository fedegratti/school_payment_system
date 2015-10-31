<?php

/**
 * Created by PhpStorm.
 * User: Skeith
 * Date: 30/10/2015
 * Time: 17:05
 */
class PaymentModel extends PDORepository
{
    public function payOrGrantFee($feeId,$studentId,$grant)
    {
        $query = "INSERT INTO payment (studentId,feeId,grantholding,createDate) VALUES (?,?,?,CURRENT_DATE)";

        $this->executeQuery($query,array($studentId,$feeId,$grant));
        return $this->getLastInsertedID();
    }

    public function generateUserPayment($userId, $paymentId)
    {
        $query = "INSERT INTO user_payments (userid,paymentid) VALUES (?,?)";
        $this->executeQuery($query,array($userId,$paymentId));
    }

    public function getYearlyCollectorPaymentRevenueOfUser($userId)
    {
        $queryYears ="SELECT year,month,sum(amount * collectorPayment / 100) as amount
                      FROM fee
                      WHERE deleted=false and fee.id in (SELECT feeid
                                                         FROM payment as p inner join user_payments as up on(p.id = up.paymentid)
                                                          where up.userid = ?)

                      group by year,month";

        $stmnt = $this->executeQuery($queryYears,array($userId));
        $years = $stmnt->fetchAll(PDO::FETCH_ASSOC);

        if($stmnt->rowCount() == 0)
            return array();

        //echo '<pre>'; print_r($years); echo '</pre>';

        // CANCEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEER
        // para entender por q pija hice esto, descomenta el echo q esta ^ ahi arriba, y el echo q esta abajo de to do
        // y carga la vista de comision
        $result = array();
        $currentYear["year"]= $years[0]["year"];
        $currentYear["months"]=array();

        foreach($years as $item)
        {
            if($item["year"] != $currentYear["year"])
            {
                array_push($result,$currentYear);

                // esperemos que esta variable no siga referenciando a lo q se pusheo en el arreglo...
                $currentYear["year"] = $item["year"];
                $currentYear["months"]=array();
            }
            array_push($currentYear["months"],array("month"=>$item["month"],
                                                    "amount"=> $item["amount"]));
        }
        array_push($result,$currentYear);

        //echo '<pre>'; print_r($result); echo '</pre>'; die;
        return $result;
    }
}