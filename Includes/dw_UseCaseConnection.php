<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dw_UseCaseConnection = "localhost";
$database_dw_UseCaseConnection = "usecase";
$username_dw_UseCaseConnection = "admin";
$password_dw_UseCaseConnection = "123";
$dw_UseCaseConnection = mysql_pconnect($hostname_dw_UseCaseConnection, $username_dw_UseCaseConnection, $password_dw_UseCaseConnection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>