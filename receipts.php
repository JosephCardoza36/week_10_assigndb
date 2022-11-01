<?php require_once('conn/connect.php'); ?>
<?php
    //Fill in the 'FROM clause and all other clauses needed'.
    $query = "SELECT receiptid, FORMAT(SUM(sellprice), 2) AS Total
                FROM receipts
                JOIN sales ON receiptid = receiptfk
                GROUP BY receiptid";
    $rs = mysqli_query($con, $query);
    $count = mysqli_num_rows($rs);

?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8">
        <title>Recent Transactions</title>
        <link href="styles.css" rel="stylesheet" type="text/css">
        <style>
            header, table {
                display: block;
                width: 360px;
            }
            header{
                margin: 60px auto 10px;
            }
            table {
                margin: 0 auto;
                border-spacing: 0;
                border-collapse: collapse;
            }
            td, th {
                padding: 4px;
            }
            .id {
                width: 70px;
            }
            .data {
                width: 290px;
            }
	        tr:nth-child(even) {
                background: #f2f2f2;
            }
		</style>
    </head>

    <body>
        <header>
		    <h1>SteveTronics</h1>
			<p id="title">Always the Highest Price</p>
		</header>
        <section>
            <table>
                <tr>
                    <th class="id">Receipt</th>
                    <th class="data">Total</th>
                </tr>
                <?php for($i=0; $i<$count; $i++) {  $row = mysqli_fetch_assoc($rs); ?>
                <tr>
                    <td style="text-align: right"><?php echo $row['receiptid']; ?></td>
                    <td style="text-align: right"><?php echo $row['Total']; ?></td>
                </tr>
		<?php } ?>
            </table>
        </section>
    </body>
</html>

