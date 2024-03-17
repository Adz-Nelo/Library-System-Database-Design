<?php 

try {
    if($connections = mysqli_connect("localhost","root","","quiz3_db")) {

}

} catch (mysqli_sql_exception) {
    echo "Server not connected ";
}

?>