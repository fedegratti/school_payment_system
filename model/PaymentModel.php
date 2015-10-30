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
}