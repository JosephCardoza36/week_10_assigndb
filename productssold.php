<?php require_once('conn/connect.php'); ?>
<?php
    //Fill in the 'FROM clause and all other clauses needed'.
    $query = "SELECT receiptid, sku, mfgr, modelnumber
              FROM receipts
              JOIN sales ON receiptid = receiptfk
              JOIN products ON productid = productfk;";
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
                width: 500px;
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
                width: 71px;
            }
            .data {
                width: 146px;
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
                    <th class="data">SKU</th>
                    <th class="data">Manufacturer</th>
                    <th class="data">Model Number</th>
                </tr>
                <?php for($i=0; $i<$count; $i++) {  $row = mysqli_fetch_assoc($rs); ?>
                <tr>
                    <td style="text-align: right"><?php echo $row['receiptid']; ?></td>
                    <td style="text-align: center"><?php echo $row['sku']; ?></td>
                    <td><?php echo $row['mfgr']; ?></td>
                    <td><?php echo $row['modelnumber']; ?></td>
                </tr>
            <?php } ?>
            </table>
        </section>
    </body>
</html>

