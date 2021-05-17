# Names: Noar Rassam

# PHP Project
# BankAccount


## Description
The web application works through the index page as the default page that contains a form to upload the csv file into the database “bank_account”. “bank_account” database contains two tables that are linked together through a foreign key “clients” and “clients_account”. Both tables have been set as auto increment. Also, the index page includes the “View_Form_Database.php”, which represents all the data from the csv file that will be inserted through the form. When a user clicks on submit button, it will go through the uploadCSV.php page to insert all the data into the tables, client and clients_account by adding the last inserted id of the client table into an array for the next inputs of the clients_account table. In addition, it checks whether the upload succeeded or not depending on the type of the file. Furthermore, “View_From_Database” uses a select statement as well as inner join to view all the data from in a table format, this form has a hyperlink of update that references the id in order to make the update of the specified values of the row tables. Therefore, the Update.php page updates all the form values if a user changed one of the inputs depending on both table’s ids. Finally, the form of user information inside the update.php page gets the id of the row that needs to be update it and view it in a url, so a user can use this id to update any field depending on the id.


## **XAMPP Control Panel**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/1.jpg" width="750" height="750">

## **Upload Client Info.**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/2.jpg" width="500" height="1000">

## **Excel File Contains Clients Info.**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/3.jpg" width="500" height="1000">


## **Uploaded Excel File**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/4.jpg" width="500" height="1000">


## **PHP MySql Database - clients table**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/5.jpg" width="500" height="1000">

## **PHP MySql Database - clients_Account Table**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/6.jpg" width="500" height="1000">


## **Student Info. - Update**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/7.jpg" width="500" height="1000">

## **Student Info. - Update**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/8.jpg" width="500" height="1000">

## **Updated Table**

<img src="https://github.com/noarrassam/BankAccount/blob/master/Images/9.jpg" width="500" height="1000">

