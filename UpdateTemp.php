<?php
include "DB.php";
?>

<?php
$searchQueryParameter = filter_input(INPUT_GET, 'id');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
         
//        for($count = 0; $count < is_countable($id); $count++)
//        {
//            $data = array(
//              ':fname' => $fname[$count],
//                ':lname' => $lname[$count],  
//                ':address' => $address[$count],  
//                ':phone_number' => $phone_number[$count],  
//                ':email' => $email[$count],  
//                ':account_type' => $account_type[$count],  
//                ':account_balance' => $account_balance[$count],  
//                ':withdrawals' => $withdrawals[$count],
//                ':deposits' => $deposits[$count],
//                ':id' => $id[$count]
//                
//            );
//        }
          
       global $ConnectingDB;
       $sql2 = "UPDATE clients, clients_account SET clients.fname='$fname', clients.lname='$lname', "
                . "clients.address='$address', "
                . "clients.phone_number='$phone_number', "
                . "clients.email='$email', "
                . "clients_account.account_type='$account_type', "
                . "clients_account.account_balance='$account_balance', "
                . "clients_account.withdrawals='$withdrawals', "
                . "clients_account.deposits='$deposits' "
                . "INNER JOIN clients on clients.client_id = clients_account.client_id";
         $command = $ConnectingDB->prepare($sql2);
         $Execute = $command->execute();
         
          if ($Execute) {
            echo '<span class="success">Records has been updated Successfully</span>';
        }

//        global $ConnectingDB;
//        $sql = "UPDATE clients, clients_account SET fname='$fname', lname='$lname', "
//                . "clients.address='$address', "
//                . "clients.phone_number='$phone_number', "
//                . "clients.email='$email', "
//                . "clients_account.account_type='$account_type', "
//                . "clients_account.account_balance='$account_balance', "
//                . "clients_account.withdrawals='$withdrawals', "
//                . "clients_account.deposits='$deposits' "
//                . "WHERE clients.client_id = clients_account.client_id";
//        $command = $ConnectingDB->prepare($sql);
//        $Execute = $command->execute();
        
//        $sql2 = "UPDATE clients INNER JOIN clients_account ON clients.client_id = clients_account.client_id SET  "
//                . "clients.address='$address', "
//                . "clients.phone_number='$phone_number', "
//                . "clients.email='$email', "
//                . "clients_account.account_type='$account_type', "
//                . "clients_account.account_balance='$account_balance', "
//                . "clients_account.withdrawals='$withdrawals', "
//                . "clients_account.deposits='$deposits' WHERE clients.client_id='$id'";
//                 $command = $ConnectingDB->prepare($sql2);
//                 $Execute = $command->execute();
        
//        global $ConnectingDB;
//        $sql2 = "UPDATE clients_account SET account_type='$account_type', account_balance='$account_balance', withdrawals='$withdrawals', deposits='$deposits' WHERE client_id='$id'";
//        $command = $ConnectingDB->prepare($sql2);
//        $result = $command->execute();
       
      
    }
}
?>