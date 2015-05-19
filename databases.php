<?php

	function get_guitar1_dbconnection() {
		$server = '127.0.0.1';
		$database = 'ritchief_guitar1';
		$username = 'ritchief_336';
		$password = '5bC$m8UgffqEC60hWEua';
		$dsn = 'mysql:host=' . $server . ';dbname=' . $database;
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

		try {
			$db_guitar1 = new PDO($dsn, $username, $password, $options);
			return $db_guitar1;
		} catch (PDOException $ex) {
			echo 'Connection failed';
		}
	}

	$link = get_guitar1_dbconnection();

	if (is_object($link)) {
		echo 'It worked';
	}

	foreach($link->query('SELECT * FROM products') as $row) {
		print_r(var_dump($row));
	}

?>