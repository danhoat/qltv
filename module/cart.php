<?php
session_start();
if(isset($_SESSION['cart'])){
	$carts = $_SESSION['cart'];
	if( isset($_POST['submit']) ){
		$request = $_POST['cart'];

		foreach ($carts as $key => $quanlity) {

			if( (int) $request[$key] <= 0){
				// remove cart
				unset($_SESSION['cart'][$key]);
			} else 	if( $quanlity != (int)$request[$key] ){
				//update quanlity;
				$_SESSION['cart'][$key] = (int)$request[$key];
			}
		}

	}
	$new_carts = $_SESSION['cart'];
	if( count($new_carts) > 0 ){
		echo '<h1> Giỏ hàng</h1>';
		echo '<table><tr><td> Thu tu </td><td> Ten sp </td><td>So luong </td><td> Đơn Giá </td><td> Thành tiền</td></tr>';
		echo '<form method ="POST">';
		$i = 1;
		$total = 0;
		foreach ($new_carts as $key => $quanlity) {
			$sql = "SELECT * FROM products WHERE id={$key}";
			$result = mysql_query($sql);
			if ($result){
				$row 	= mysql_fetch_assoc($result);
				$title 	= $row['title'];
				$prices = $quanlity*$row['price'];
				$id = $row['id'];

			}
			$name = "SESSION['cart']['id']";
			echo '<tr>';
				echo "<td>{$i}</td>";
				echo "<td>{$title}</td>";
				echo "<td><input width ='10' size='3' type='text' name='cart[{$id}]'  value='{$quanlity}' /></td>";
				echo "<td>{$row['price']}</td>";
				echo "<td>{$prices}</td>";
				$total = $total + $prices;
				$i++;
			echo '</tr>';
			$total = number_format($total);

		}
		echo '<input type="hidden" name="submit" value="1" />';
		echo '<tr><td colspan="4"> </td><td><button> Update card</button></td></tr>';
		echo '</form>';
		echo "<tr><td colspan ='4'> &nbsp;Tổng tiền: </td><td>{$total} <span>$</span></td>";
		echo '</table>';
	}
}
?>