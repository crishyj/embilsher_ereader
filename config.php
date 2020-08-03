<?php

    $DB = new mysqli('localhost', 'root', '', 'ereader');

    if ($DB->connect_errno) {
        echo 'Failed to connect to MySQL: ('.$DB->connect_errno.') '.$DB->connect_error;
    }
    $DB->set_charset('utf8');