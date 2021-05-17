<?php

include "DB.php";

$strSQLSelect = "SELECT * from clients";
$command = $ConnectingDB->prepare($strSQLSelect);
$result = $command->execute();
$rowsClients = $command->fetchAll(PDO::FETCH_ASSOC);

echo "Data pulled from database clients table: " . print_r($rowsClients, true) . PHP_EOL;

$strSQLSelect = "SELECT * from clients_account";
$command = $ConnectingDB->prepare($strSQLSelect);
$result = $command->execute();
$rowsClientsAccounts = $command->fetchAll(PDO::FETCH_ASSOC);

echo "Data pulled from database clients_accounts table: " . print_r($rowsClientsAccounts, true). PHP_EOL;
?>
<html>
  <body>
    <?php foreach($rowsClients as $clientRow) { ?>
      <form>
        <?php foreach($clientRow as $colName => $colValue) { ?>
        <div>
          <label><?php echo $colName; ?></label>
          <input type="text" value="<?php echo $colValue; ?>">
        </div>
        <?php } ?> 
        <button type="submit">Edit</button>
      </form>
    <?php } ?> 
    
  </body>
</html>