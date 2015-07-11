<?php
	function db_connect() {
	    $dsn = 'mysql:host=localhost;dbname=ritchief_tech_support';
	    $username = 'ritchief_336';
	    $password = '5bC$m8UgffqEC60hWEua';

	    try {
	        $db = new PDO($dsn, $username, $password);
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	    }

	    return $db;
	}
?>