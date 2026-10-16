ELECTRICAL SHOP MANAGEMENT SYSTEM

ITE 2C GROUP


PROJECT TITLE : Electrical Shop Management System

GROUP MEMBERS

No.	          Name of Group Member	                          ID Number	                   Contact
1	           Amuzu Sylvester	                         5240100271	                 0536455659
2	           Kwarteng Emmanuel	                         5240100272	                 0592286540
3	           Kusi Prince	                                 5240100273	                 0595856076
4	           Adjei Duku Siaw Isaac	                 5240100274	                 0242141781
5	           Andoh M. Benjamin	                         5240100275	                 0598732042
6	           Ofori Enock	                                 5240100276	                 0558733381
7	           Mensah Dennis	                         5240100277	                 0552715128
8	           Ntaadu Obed	                                 5240100278                      0550768300
9	           Aminu Sulemana  	                         5240100279	                 0593890865
10	           Adu Derrick	                                 5240100280	                 0556622440




1.	PROJECT DESCRIPTION

The Electrical Shop Management System is a database-driven web application developed to automate the daily operations of an electrical shop. The application provides an efficient way of managing suppliers, products, customers, staff, inventory, sales, invoices, and payments.

The system minimizes manual record keeping by allowing users to add, view, update, delete, and search records through an easy-to-use interface. It also generates useful reports that support business decision-making.


2.	TECHNOLOGIES USED

Frontend

- HTML
- CSS

Backend

-	PHP

Database

-	MySQL

Development Environment

- XAMPP
- Visual Studio Code
- MySQL Workbench


3.	HOW TO RUN THE APPLICATION

Step 1

Install XAMPP and start both Apache and MySQL services.

Step 2

Create a database named:

electricalshopdb

Import the provided electricalshopdb.sql file using phpMyAdmin or MySQL Workbench.

Step 3

Copy the source_code folder into:

C:\xampp\htdocs\Electrical_workshop

Step 4

Open your preferred web browser and visit:

http://localhost/Electrical_workshop

Step 5

Log into the application using the following credentials:

Username:  admin 

Password:  admin123 


4.	MAIN FEATURES DEMONSTRATED

The application demonstrates the following database operations:

- Add records
- View records
- Update records
- Delete records
- Search records

The following modules are implemented:

- Dashboard
- Supplier Management
- Product Management
- Customer Management
- Staff Management
- Inventory Management
- Sales Management
- Invoice Management
- Payment Management
- Reports

Additional features include:

- Automatic stock updates after sales
- Secure login system
- Dashboard summary
- Database connectivity using PHP and MySQL
- Report generation


5.	REPORTS GENERATED

The application generates the following reports:

- Supplier Report
- Product Report
- Inventory Report
- Sales Report
- Customer Report
- Staff Report
- Payment Report

These reports assist management in monitoring business activities and making informed decisions.


6.	PROJECT FILES INCLUDED

File/Folder| Description
 /sourcecode | Complete PHP application source code
 electricalshopdb.sql | Database creation script with sample data
 Report.pdf" Project documentation
 Video1_Intro.mp4 | Group introduction video
 Video2_Demo.mp4 | Application demonstration video
 Video3_Reports.mp4 | Reports demonstration video
 README.md | Project setup and user guide


7.	PROJECT STRUCTURE

Electrical_shop/
 authentication/
+-- config/
-- css/
+-- includes/
+-- inventory/
+-- payment/
+-- product/
+-- reports/
+-- sales/
+-- staff/
+-- supplier/
+-- customer/
+-- index.php


8.	DATABASE INFORMATION

Database Name

electricalshopdb

Major database tables:

- SUPPLIER
- PRODUCT
- CUSTOMER
- STAFF
- INVENTORY
- SALE
- SALE_DETAIL
- INVOICE
- PAYMENT


9.	DEFAULT LOGIN CREDENTIALS

Username: admin
 Password: admin123


10.	TROUBLESHOOTING

If the application cannot connect to the database:

1. Ensure Apache and MySQL are running in XAMPP.
2. Verify that the electrical_workshop database has been imported successfully.
2. Open  config/database.php .
3. Update the database connection settings if your MySQL username, password, or port differs from the defaults.
4. Restart Apache and MySQL after making changes.


11.	LICENSE

This project was developed for academic purposes in partial fulfillment of the requirements for the Database Concepts and Design course.


12.	ACKNOWLEDGEMENT

The group expresses sincere gratitude to the course lecturer, the Department of Information and Communication Technology, and University of Skills Training and Entrepreneurial Development (USTED) for their guidance and support throughout the development of this project.


CONTACT INFORMATION

For questions regarding this project, please contact any member of the project group using the details provided on the cover page.


