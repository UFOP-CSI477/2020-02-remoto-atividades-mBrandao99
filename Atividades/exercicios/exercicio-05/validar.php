<?php

   $data = $_POST;

   foreach ($data as $key => $value) {
       echo "<p><h3>$key: $value</h3></p>";
   }
    