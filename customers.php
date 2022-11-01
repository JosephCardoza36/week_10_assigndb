<?php require_once('conn/connect.php'); ?>
<?php
    //Fill in the 'FROM clause and all other clauses needed'.
    $query = "SELECT DISTINCT firstname, lastname, receiptid
            FROM customers
            JOIN receipts ON customerid = customerfk
            JOIN sales ON receiptid = receiptfk;";
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
                width: 39px;
            }
            .data {
                width: 100px;
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
                    <th class="id">First Name</th>
                    <th class="data">Last Name</th>
                    <th class="data">Receipt</th>
                </tr>
                <?php for($i=0; $i<$count; $i++) {  $row = mysqli_fetch_assoc($rs); ?>
                <tr>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td style="text-align: right"><?php echo $row['receiptid']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </section>
    </body>
</html>

