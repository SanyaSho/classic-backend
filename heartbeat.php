// Minecraft Classic heartbeat by SanyaSho

<?php
// get POST data, if is not set return "UNDEFINED"
if( isset($_POST["name"]) ) { $name = $_POST["name"]; } else { $name = "UNDEFINED"; }
if( isset($_POST["users"]) ) { $users = (int)$_POST["users"]; } else { $users = "UNDEFINED"; }
if( isset($_POST["max"]) ) { $max = (int)$_POST["max"]; } else { $max = "UNDEFINED"; }
if( isset($_POST["public"]) ) { $ispublic = filter_var($_POST["public"], FILTER_VALIDATE_BOOLEAN); } else { $ispublic = "UNDEFINED"; }
if( isset($_POST["port"]) ) { $port = (int)$_POST["port"]; } else { $port = "UNDEFINED"; }

// {
//    "name": "Minceraft Server",
//    "users": 3,
//    "max": 16,
//    "public": false,
//    "port": 27015
// }
$serverstatus = array( 
			"name" => $name,
			"users" => $users,             
			"max" => $max,
			"public" => $ispublic,
			"port" => $port
);

// encode json from array
$serverjson = json_encode($serverstatus);

// recreate (if exists) and write json to file "./server.json"
$srv = fopen("./server.json", "w+");
fwrite($srv, $serverjson);
fclose($srv);
?>
