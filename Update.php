<?php
include "DB.php";

echo "<pre>";
$searchQueryParameter = filter_input(INPUT_GET, 'id');

if (isset($_POST['submit'])) {
    $id = filter_input(INPUT_POST, 'client_id');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $address = filter_input(INPUT_POST, 'address');
    $phone_number = filter_input(INPUT_POST, 'phone_number');
    $email = filter_input(INPUT_POST, 'email');
    $account_type = filter_input(INPUT_POST, 'account_type');
    $account_balance = filter_input(INPUT_POST, 'account_balance');
    $withdrawals = filter_input(INPUT_POST, 'withdrawals');
    $deposits = filter_input(INPUT_POST, 'deposits');


    global $ConnectingDB;
    $sql2 = "UPDATE clients, clients_account SET clients.fname='$fname', clients.lname='$lname', "
            . "clients.address='$address', "
            . "clients.phone_number='$phone_number', "
            . "clients.email='$email', "
            . "clients_account.account_type='$account_type', "
            . "clients_account.account_balance='$account_balance', "
            . "clients_account.withdrawals='$withdrawals', "
            . "clients_account.deposits='$deposits' "
            . "WHERE clients_account.client_id = '$searchQueryParameter' "
            . "AND clients.client_id = '$searchQueryParameter' ";
    $command = $ConnectingDB->prepare($sql2);
    $Execute = $command->execute();

    if ($Execute) {
        header("Location: View_From_Database.php?id=Record Updated Successfully");
    }
}
?>        

<!DOCTYPE html>
<html>
    <head>
        <title>Database Insertion</title>
        <link rel="stylesheet" href="main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        global $ConnectingDB;
        $strSQLSelect = "SELECT * from clients INNER JOIN clients_account ON clients.client_id = clients_account.client_id "
                . "where clients_account.client_id='$searchQueryParameter'";
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
        }
        ?> 
        <div id="content">
            <h1>Student Information</h1>
            <form action="Update.php?id=<?php echo $searchQueryParameter; ?>" method="POST">  
                <span class="fieldInfo">ID:</span>
                <input type="number" name="client_id" value="<?php echo $client_id; ?>">
                <br>
                <span class="fieldInfo">First Name:</span>
                <input type="text" name="fname" value="<?php echo $fname ?>">
                <br>
                <span class="fieldInfo">Last Name:</span>
                <input type="text" name="lname" value="<?php echo $lname; ?>">
                <br>
                <span class="fieldInfo">Address:</span>
                <input type="text" name="address" value="<?php echo $address; ?>">
                <br>
                <span class="fieldInfo">Phone Number:</span>
                <input type="number" name="phone_number" value="<?php echo $phone_number; ?>">
                <br>  
                <span class="fieldInfo">Email:</span>
                <input type="text" name="email" value="<?php echo $email; ?>">
                <br> 
                <span class="fieldInfo">Account Type:</span>
                <input type="text" name="account_type" value="<?php echo $account_type; ?>">
                <br> 
                <span class="fieldInfo">Account Balance:</span>
                <input type="text" name="account_balance" value="<?php echo $account_balance; ?>">
                <br>
                <span class="fieldInfo">Withdrawals:</span>
                <input type="text" name="withdrawals" value="<?php echo $withdrawals; ?>">
                <br> 
                <span class="fieldInfo">Deposits:</span>
                <input type="text" name="deposits" value="<?php echo $deposits; ?>">
                <br> 
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
    </body>
</html>