shopplus
=======

Custom Z Publish module for custom shopping cart functionality would like to give you more info but 
I do not have any history with this module.


Retain user shopping cart over different devices.
================================================

The default functionality for the shopping cart is to use the session id however this will not be retained
for a logged in user if they are using different devices like a mobile phone and desktop.

This version has been modified to user the user_id as well the following sql from *sql/mysql/abandoned-cart.sql* 
will need to be run to add the user_id column to the ezbasket table.
A example cli command to add the column is listed below from the site directory

*mysql -h your_own_db_host -u opur_own_db_username -p your_own_database < extension/shopplus/sql/mysql/abandoned-cart.sql*
