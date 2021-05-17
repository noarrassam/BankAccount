<?php
include "DB.php";

echo "<pre>";

if (isset($_POST['uploadBtn'])) {
    $fileName = $_FILES['myFile']['name'];
    $fileTmpName = $_FILES['myFile']['tmp_name'];
    $fileExtention = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowedType = array('csv');
    if (!in_array($fileExtention, $allowedType)) {
        ?>
        <div class="alert alert-danger"> 
            Invalid File Extention
        </div>
        <?php
    } else {
        $handle = fopen($fileTmpName, 'r');
        while (($myData = fgetcsv($handle, 1000, ',')) !== FALSE) {

            echo "File row data: " . print_r($myData, true) . PHP_EOL;

            $fname = $myData[0];
            $lname = $myData[1];
            $address = $myData[2];
            $phone_number = $myData[3];
            $email = $myData[4];
            $account_type = $myData[5];
            $account_balance = $myData[6];
            $withdrawals = $myData[7];
            $deposits = $myData[8];

            $myClientInsertData = [$fname, $lname, $address, $phone_number, $email];
            echo "Inserting client table data: " . print_r($myClientInsertData, true) . PHP_EOL;

            $strSQL = "INSERT INTO clients (fname, lname, address, phone_number, email) values (?,?,?,?,?)";
            $command = $ConnectingDB->prepare($strSQL);
            $result = $command->execute($myClientInsertData);
            echo "Insert done for client table" . PHP_EOL;
            print_r($result);

            $insertedClientId = $ConnectingDB->lastInsertId();

            echo "New client inserted: " . $insertedClientId . PHP_EOL;

            $clientAccountInsertData = [$insertedClientId, $account_type, $account_balance, $withdrawals, $deposits];
            echo "Inserting client account table data: " . print_r($clientAccountInsertData, true) . PHP_EOL;

            $strSQL1 = "INSERT INTO clients_account (client_id, account_type, account_balance, withdrawals, deposits) values (?,?,?,?,?)";
            $command = $ConnectingDB->prepare($strSQL1);
            $result = $command->execute($clientAccountInsertData);
            echo "Insert done for client_account table" . PHP_EOL;
            print_r($result);
        }
        if (!$result) {
            die("error in uploading file");
        } else {
            ?>
            <div class="alert alert-success">               
                File Uploaded Successfully!
            </div>              
            <?php
        }
    }
}
?>