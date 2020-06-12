<?php

include ('xcrud.php');

if (isset($_POST['xcrud']['action']) && $_POST['xcrud']['action'] == 'user_status') {
    $user_id = $_POST['xcrud']['primary'];
    $status = $_POST['xcrud']['status'];

    if (isset($status) && $status == 1) {
        $data['status'] = 0;
    } else {
        $data['status'] = 1;
    }

    $db = Xcrud_db::get_instance();
    $db->query('UPDATE user
                    SET status = ' . $data['status'] . '
                    WHERE user_id = ' . $user_id);
}

echo Xcrud::get_requested_instance();
