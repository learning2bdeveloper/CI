<?php
defined('BASEPATH') or exit('No direct script access allowed');

define('KiloByte', 1024);
define('MegaByte', 1048576);
define('GigaByte', 1073741824);
define('TeraByte', 1099511627776);


function Get_Random_ID()
{
    return bin2hex(random_bytes(32));
}
