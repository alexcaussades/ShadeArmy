<?php

use ShadeLife\auth;

session_start();

require 'autoload.php';



 echo auth::generateToken();
