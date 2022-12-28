<?php

// echo "Hi " . phpversion();

$db_host = "db";
$db_user = "user";
$db_password = "User_Pass";
$db_name = "MyDatabase";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
  die("Connection error: {${$conn->connect_error}}<br><br>");
} else {
  echo "Connection with MySQL is established!<br><br>";
}

echo apache_get_version()."<br>";
echo "PHP ".PHP_VERSION."<br>";
echo "MySQL ".$conn->server_info."<br>";

$sql = "SELECT * FROM users";

if ($result = $conn->query($sql)) {
  while ($data = $result->fetch_object()) {
    $users[] = $data;
  }
}

foreach ($users as $user) {
  echo "<br>";
  echo $user->username . " " . $user->password;
}

/*
drop table if exists `users`;

create table `users` (
  id int not null auto_increment,
  username text not null,
  password text not null,
  primary key (id)
);

insert into `users` (username, password) values
  ("admin", "password"),
  ("Denis", "denis"),
  ("Guy", "qwerty");
*/
