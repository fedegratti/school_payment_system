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

        $result = array();
        $currentYear["year"]= $years[0]["year"];
        $currentYear["months"]=array();

        foreach($years as $item)
        {
            if($item["year"] != $currentYear["year"])
            {
                array_push($result,$currentYear);

                $currentYear["year"] = $item["year"];
                $currentYear["months"]=array();
            }
            array_push($currentYear["months"],array("month"=>$item["month"],
                "amount"=> $item["amount"]));
        }
        array_push($result,$currentYear);
        return $result;
    }


    public function getMontlyRevenueByYear($year)
    {
        $query= "select f.month as 'mes', sum(f.amount) as 'cantidad'
                 FROM payment as p
                   	  inner join fee as f on (p.feeId = f.id)
                 WHERE f.year = ?
                  	   and f.deleted=false
                  	   and f.kind = 2
				 group by f.month
                  ";

        $queryResult = $this->executeQuery($query,array($year))->fetchAll(PDO::FETCH_ASSOC);

        $montlyRevenue = array(0,0,0,0,0,0,0,0,0,0,0,0);
        // Con esto creamos un nuevo arreglo que posee todos los meses con sus valores setteados, dado que
        // puede pasar que la consulta sql no devuelva todos los meses.
        foreach($queryResult as $month)
        {
            $montlyRevenue[$month["mes"]-1] = $month["cantidad"]; // El -1 es porq en nuestra db los meses arrancan del 1
        }
        return $montlyRevenue;
    }

    // esta funcion fue hecha a las 2 de la ma?ana, no acepto ningun tipo  de criticas xD
    public function getTotalRevenue()
    {
        $queryYears ="SELECT sum(amount) as amount, kind, year, month
                      FROM fee as f inner join payment as p on(f.id=p.feeId)
                      WHERE f.deleted=false
                      group by kind, year, month";

        $stmnt = $this->executeQuery($queryYears,array());
        $years = $stmnt->fetchAll(PDO::FETCH_ASSOC);


        //echo '<pre>'; print_r($years); echo '</pre>'; die;
        if($stmnt->rowCount() == 0)
            return array();


        $result = array();
        $currentYear["year"]= $years[0]["year"];
        $currentYear["monthlyFees"]=array();
        $currentYear["entryFees"]=array();
        foreach($years as $item)
        {
            if($item["year"] != $currentYear["year"])
            {

                $currentYear["monthlyFees"]=$this->fullfillMonthsInArray($currentYear["monthlyFees"]);

                $currentYear["entryFees"]=$this->fullfillMonthsInArray($currentYear["entryFees"]);
                array_push($result,$currentYear);

                $currentYear["year"] = $item["year"];
                $currentYear["monthlyFees"]=array();
                $currentYear["entryFees"]=array();

            }
            if($item["kind"] == 1)
            {
                array_push($currentYear["entryFees"],array("month"=>$item["month"],
                    "amount"=> $item["amount"]));
            }
            else
            {
                array_push($currentYear["monthlyFees"],array("month"=>$item["month"],
                    "amount"=> $item["amount"]));
            }

        }
        $currentYear["monthlyFees"]=$this->fullfillMonthsInArray($currentYear["monthlyFees"]);

        $currentYear["entryFees"]=$this->fullfillMonthsInArray($currentYear["entryFees"]);

        array_push($result,$currentYear);

        //echo '<pre>'; print_r($result); echo '</pre>'; die;
        return $result;



    }


    function fullfillMonthsInArray($months)
    {

        //echo '<pre>'; print_r($months); echo '</pre>';
        $montlyRevenue = array(0,0,0,0,0,0,0,0,0,0,0,0);


        // Con esto creamos un nuevo arreglo que posee todos los meses con sus valores setteados, dado que
        // puede pasar que la consulta sql no devuelva todos los meses.
        foreach($months as $month)
        {
            if(isset($month["month"]))
                $montlyRevenue[$month["month"]-1] = $month["amount"];
            else
                return $montlyRevenue;
        }

        return $montlyRevenue;
    }
}