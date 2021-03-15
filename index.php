
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
      CREATE TABLE COMPANY
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      AGE            INT     NOT NULL,
      ADDRESS        CHAR(50),
      SALARY         REAL);
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
?>
