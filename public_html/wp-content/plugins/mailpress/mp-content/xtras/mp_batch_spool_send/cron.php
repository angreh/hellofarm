<?php

define('DOING_CRON', true);

$path = substr(dirname(__FILE__),0,strpos(dirname(__FILE__),'wp-content'));

include($path . 'wp-load.php');
include($path . 'wp-admin/includes/admin.php');

do_action('mp_process_batch_spool_send');

MP_::mp_die();