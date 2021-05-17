<?php
include "DB.php";
?>

<?php
$searchQueryParameter = filter_input(INPUT_GET, 'id');
?>

<!DOCTYPE>
<html>
    <head>
        <title>View Data From Database</title>
        <link rel="stylesheet" href="Include/style.css">
    </head>
    <body>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <table width="1000" border="5" align="center">
                <caption>View From Database</caption>
                <tr>
                    <th>Client ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>E-Mail</th>
                    <th>Account Number</th>
                    <th>Account Type</th>
                    <th>Account Balance</th>
                    <th>Withdrawals</th>
                    <th>Deposits</th>
                    <th>Update</th>
                </tr>

                <?php
                global $ConnectingDB;
                $strSQLSelect = "SELECT * from clients INNER JOIN clients_account ON clients.client_id = clients_account.client_id ";

                $command = $ConnectingDB->prepare($strSQLSelect);
                $result = $command->execute();

                while ($rowsClients = $command->fetch()) {
                    $client_id = $rowsClients["client_id"];
                    $fname = $rowsClients["fname"];
                    $lname = $rowsClients["lname"];
                    $address = $rowsClients["address"];
                    $phone_number = $rowsClients["phone_number"];
                    $email = $rowsClients["email"];
                    $account_number = $rowsClients ["account_number"];
                    $account_type = $rowsClients ["account_type"];
                    $account_balance = $rowsClients ["account_balance"];
                    $withdrawals = $rowsClients ["withdrawals"];
                    $deposits = $rowsClients ["deposits"];
                    ?> 

                    <tr>
                        <td><?php echo $client_id; ?></td>
                        <td><?php echo $fname; ?></td>
                        <td><?php echo $lname; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $phone_number; ?></td>
                        <td><?php echo $email; ?></td>  
                        <td><?php echo $account_number; ?></td> 
                        <td><?php echo $account_type; ?></td>
                        <td><?php echo $account_balance; ?></td>
                        <td><?php echo $withdrawals; ?></td>
                        <td><?php echo $deposits; ?></td>
                        <td><a href="Update.php?id=<?php echo $client_id; ?>">Update</a></td>    
                    </tr>
                <?php } ?>
            </table>
        </form>
    </body>   
</html>