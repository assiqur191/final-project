<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("LOCATION: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Single Order</title>
</head>
<body>
<?php
include "../view/include/header.php"; 
?>
	<h1>Single Order Page</h1>

	<?php 
        if (isset($_GET['id'])) {		
			$orderId =  (int)$_GET['id'];

        define("ORDERLIST", "../model/Orders.json");
        $handle = fopen(ORDERLIST, "r");
			$fr = fread($handle, filesize(ORDERLIST));
			$orderList = json_decode($fr);
			$fc = fclose($handle);
            $handle = fopen(ORDERLIST, "w");
            var_dump($orderList);

            if ($orderList === NULL)
            {
                echo "NO data found";
            }
            else{
                echo "<table border='1'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th>Food Name</th>";
					echo "<th>Food Price(Taka)</th>";
					echo "<th>Action(s)</th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
                    
                    echo "</tbody>";
					echo "</table>";

            }
            // foreach($orderList as $order)
            // {
            //     echo "<br>";
            //     echo $orderId;
            //     var_dump( $orderId);
            //     echo "<br>";
            //     echo "ORDER ID". $order->id;
            //     var_dump( $order->id);
            //     echo "<br>";
            //     echo $order->id === $orderId;
            //     echo "<br>";
            //     if ($order->id === $orderId)
            //     {
            //         echo  $order->id;
            //         if ($order->status === "In Queue")
            //         {
            //             $order->status = "Served";
            //         }
            //         else
            //         {
            //             $order->status = "In Queue";
            //         }
            //     }

        // }

            $data = json_encode($orderList);
			$fw = fwrite($handle, $data);
			$fc = fclose($handle);

		// define("FILENAME", "../model/FoodChartData.json");
		// if (isset($_GET['id'])) {		
		// 	$item_id = $_GET['id'];
		// 	$handle = fopen(FILENAME, "r");
		// 	$fr = fread($handle, filesize(FILENAME));
		// 	$arr1 = json_decode($fr);
		// 	$fc = fclose($handle);

		// 	$handle = fopen(FILENAME, "w");
		// 	$arr2 = array();
		// 	for ($i = 0; $i < count($arr1); $i++) {
		// 		if ($item_id === $arr1[$i]->item_id) {
		// 			$id_no = $i;
		// 			break;
		// 		}
		// 	}

		// 	for ($i = 0; $i < count($arr1); $i++) {
		// 		if ($id_no !== $i) {
		// 			array_push($arr2, $arr1[$i]);
		// 		}	
				
		// 	}

		// 	$data = json_encode($arr2);
		// 	$fw = fwrite($handle, $data);
		// 	$fc = fclose($handle);

			// if ($fw) {
			// 	header("LOCATION: .php");
			// }
		}
		else {
			die("Invalid Request");
		}
	?>

	

</body>
</html>