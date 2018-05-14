<?php

session_start();

session_unset();

session_destroy();

header("Location:http://projectrfid.coolpage.biz/index.html");
?>