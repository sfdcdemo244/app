
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
      SELECT * from salesforce.contact;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_assoc($ret)) {
      echo "FirstName = ". $row['firstname'] . "<br>";
   echo "LastName = ". $row['lastname'] ."<br>";
      echo "Email = ". $row['email'] ."<br>";
      echo "Phone =  ".$row['phone'] ."<br>";
   }
   echo "Operation done successfully\n";
   pg_close($db);
?>
