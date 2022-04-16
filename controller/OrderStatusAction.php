<?php
function updateOrderStatus($orderId)
    {
        define("ORDERLIST", "../model/FoodchartData.json");
        $handle = fopen(ORDERLIST, "r");
			$fr = fread($handle, filesize(ORDERLIST));
			$orderList = json_decode($fr);
			$fc = fclose($handle);
            $handle = fopen(ORDERLIST, "w");
            foreach($orderList as $order)
            {
                if ($order->id === $orderId)
                {
                    echo  $order->id;
                    if ($order->status === "In Queue")
                    {
                        $order->status = "Served";
                    }
                    else
                    {
                        $order->status = "In Queue";
                    }
                }

            }
            $data = json_encode($orderList);
			$fw = fwrite($handle, $data);
			$fc = fclose($handle);
            if ($fw) {
				// header("LOCATION: FoodChart.php");
                // header("LOCATION: ../views/Orders.php");
			}
            // $secondsWait = 1;
            // header("Refresh:$secondsWait");
            // header('Location: '.$_SERVER['PHP_SELF']);  
            // for ($i = 0; $i < count($orderList); $i++) {
			// 	if ($id_no !== $i) {
			// 		array_push($arr2, $arr1[$i]);
			// 	}	
			// }
        echo "jinsih";

    }
?>