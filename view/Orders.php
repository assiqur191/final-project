<?php 
	session_start();
    // require_once ( '.php' );
    include "../controller/OrderStatusAction.php";
    
    

	if(!isset($_SESSION['id'])){
		header("LOCATION: ../view/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-RESTAURANT</title>
</head>
<body>
<?php 
	include "../view/include/header.php"; 
    
?>

<?php
	define("FILENAME", "../model/Orders.json");
			$handle = fopen(FILENAME, "r");
			$arr1 = NULL;
			$size = filesize(FILENAME);
			if ($size > 0) {
				$fr = fread($handle, $size);
				$arr1 = json_decode($fr);
				$fc = fclose($handle);
				// var_dump($arr1);
			}
	if ($arr1 === NULL) {
			echo "No record(s) found";
		}
		else {
			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>User ID</th>";
			echo "<th>User Name</th>";
			echo "<th>Food Items</th>";
			echo "<th>Total Price</th>";
			echo "<th>Address</th>";
			echo "<th>Phone</th>";
			echo "<th>Pobox</th>";
			echo "<th>Order Status</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
            foreach($arr1 as $item)
            {   
                echo "<tr>";
                echo $item->id;
                echo "<td style='text-align:center'>" . $item->id . "</td>";
				echo "<td style='text-align:center'>" . $item->userName . "</td>";
                if($item->foodChart === Null)
                {

				echo "<td style='text-align:center'>" ."The Order Have No Food" . "</td>";
                } 
                else
                {
                    echo "<td style='text-align:center'>";
                        echo "<ol>";
                        foreach( $item->foodChart as $foodItem)
                        {
                                echo "<li>";
                                    echo "<strong> Item ID: ";
                                    echo "</strong>";
                                    echo $foodItem->itemId ;
                                    echo " || ";
                                    echo "<strong> Item Name: ";
                                    echo "</strong>";
                                    echo $foodItem->foodName ;
                                    echo "<strong> Food Price: ";
                                    echo "</strong>";
                                    echo $foodItem->foodPrice;

                        }
                        echo "</ol>";
                    echo "</td>";
                }
				echo "<td style='text-align:center'>";
                if($item->foodChart === Null)
                {
                    echo "There is no Item in this order";
                } 
                else
                {   $totalPrice = 0;
                        foreach( $item->foodChart as $foodItem)
                        {
                            $totalPrice = $totalPrice + $foodItem->foodPrice;
                        }
                    echo $totalPrice;
                }
                
                echo "</td>";
				echo "<td style='text-align:center'>" . $item->address . "</td>";
				echo "<td style='text-align:center'>" . $item->phone . "</td>";
				echo "<td style='text-align:center'>" . $item->poBox . "</td>";
                echo "<td style='text-align:center'>" . "<a href='SingleOrderPage.php?id=" .  $item->id . "'>See Order</a>" . "</td>";

                // echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] ."\" >";
                // echo "<form method=\"post\" action=\"" . updateOrderStatus(1) ."\" >";
                echo "<button type=\"submit\">";
                // echo $item->orderStatus;
                echo "</button>";
                echo "</td>";
                echo "</tr>";
            }
                echo "</form>";
				echo "</tbody>";
				echo "</table>";
				
		}	

?>

<?php 

	include '../view/include/footer.php'; 
?>

</body>
</html>