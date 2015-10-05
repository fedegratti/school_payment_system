<?php
class ListStudentFeesView extends TwigView
{
    public function show($payedFees,$unPayedFees,$expiredFees,$student)
    {
        self::getTwig()->display('fee/listStudentFees.html.twig',array("payedFees" => $payedFees,
                                                                        "unPayedFees" => $unPayedFees,
                                                                        "student"=>$student,
                                                                        "expiredFees"=>$expiredFees));
    }
}