
<?php
   $host        = "host = ec2-54-167-168-52.compute-1.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = dfisqqcbkggoj9";
   $credentials = "user = ezmebocjiznuyh password=f98ba2c2dcd27edfba139cabc5720a4bdc29a2fd749d6c54e11d34a95f6923a3";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      SELECT  FirstName,LatsName,Email,Phone from Contact;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_row($ret)) {
      echo "ID = ". $row[0] . "\n";
      echo "NAME = ". $row[1] ."\n";
      echo "ADDRESS = ". $row[2] ."\n";
      echo "SALARY =  ".$row[4] ."\n\n";
   }
   echo "Operation done successfully\n";
   pg_close($db);
?>
