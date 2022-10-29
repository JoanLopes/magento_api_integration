<?php

namespace App\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

class CollectionService
{
    public function jsonToCollection(JsonResponse $json):ArrayCollection
    {
        $arrayOrder = json_decode( $json->getContent(),true);
        $orderArr = [];
        foreach ($arrayOrder['items'] as $arr ) {

            $arrayIntersect = [
                'customer_email' =>'',
                'customer_firstname'=>'',
                'grand_total'=>''
            ];
            $orderArr[] = array_intersect_key($arr, $arrayIntersect);
        }
        return new ArrayCollection($orderArr);
    }
}