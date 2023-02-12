
<?php
# Incorporate the MySQL connection script.
require  'connect.php'  ;

# Display MySQL version and host.
if( mysqli_ping( $dbc ) ) 
{ echo 'MySQL server' . mysqli_get_server_info( $dbc ).
 'connected on ' . mysqli_get_host_info( $dbc ) ; };
?>