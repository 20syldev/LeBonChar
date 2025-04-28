<?php
require_once '../config/database.php';
require_once '../config/session.php';
require_once '../config/auth.php';

checkAuth();

require_once '../routes/web.php';