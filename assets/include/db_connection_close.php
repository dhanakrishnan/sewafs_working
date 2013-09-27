<?php
function closeConnection($dbconnect)
{
   if(isset($dbConnect))
   {
     mysql_close($dbConnect);
   }
}
?>