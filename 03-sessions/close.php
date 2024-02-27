<?php

require "config/app.php";
require "config/database.php";

unset($_SESSION['uid']);
session_destroy();

header("location: index.php");