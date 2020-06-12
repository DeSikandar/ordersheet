<?php

function publish_action($xcrud) {
    if ($xcrud->get('primary')) {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int) $xcrud->get('primary');
        $db->query($query);
    }
}

function unpublish_action($xcrud) {
    if ($xcrud->get('primary')) {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int) $xcrud->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata, $primary, $xcrud) {
    $xcrud->set_exception('ban_reason', 'Lol!', 'error');
    $postdata->set('ban_reason', 'lalala');
}

function test_column_callback($value, $fieldname, $primary, $row, $xcrud) {
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud) {
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload') {
        unlink($file_path);
        $xcrud->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function date_example($postdata, $primary, $xcrud) {
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime', $created);
}

function movetop($xcrud) {
    if ($xcrud->get('primary') !== false) {
        $primary = (int) $xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item) {
            if ($item['officeCode'] == $primary && $key != 0) {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item) {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}

function movebottom($xcrud) {
    if ($xcrud->get('primary') !== false) {
        $primary = (int) $xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item) {
            if ($item['officeCode'] == $primary && $key != $count - 1) {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item) {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }

    function inser_smart_category_map($postdata, $primary, $xcrud) {
        $db = Xcrud_db::get_instance();

        //$xcrud->query('SELECT * FROM category WHERE category_id = ' . $db->escape($primary));
        $query = 'SELECT * FROM category WHERE category_id = ' . $db->escape($primary);
        $db->query($query);
        $result = $db->row();
        $smart_cate = explode(',', $result['smart_category_id']);
        foreach ($smart_cate as $key => $value) {
            $db->query('INSERT INTO map_smart_category (category_id, smart_category_id)VALUES (' . $db->escape($primary) . ', ' . $value . ')');
        }
    }

}

function update_smart_category_map($postdata, $xcrud) {
    //$postdata->set('stock', '55');
    $db = Xcrud_db::get_instance();
    $db->query('DELETE FROM map_smart_category WHERE category_id = ' . $db->escape($primary));
    $query = 'SELECT * FROM category WHERE category_id = ' . $db->escape($primary);
    $db->query($query);
    $result = $db->row();
    $smart_cate = explode(',', $result['smart_category_id']);
    foreach ($smart_cate as $key => $value) {
        $db->query('INSERT INTO map_smart_category (category_id, smart_category_id)VALUES (' . $db->escape($primary) . ', ' . $value . ')');
    }
}

function active_inactive_status($status) {
    if ($status == '1') {
        return 'Active';
    } else if ($status == '0') {
        return 'Inactive';
    }
}

function admin_user_status($status) {
    if ($status == '1') {
        return 'Admin';
    } else if ($status == '0') {
        return 'User';
    }
}

function support_expiry($value, $fieldname, $primary, $row, $xcrud) {
    if (!$value) {
        return 'No Support <br/><br/>'
        . '<a href="#" data-target=".mdl_country" data-toggle="modal" class="btn btn-warning mo_date" data-event-id="'.$row['event.event_id'].'">Manage Support Date</a> ';;
    } else if (date('Y-m-d') <= $value) {
        return 'Support till '.date('d-m-Y', strtotime($value)).'  <br/><br/>'
        . '<a href="#" data-target=".mdl_country" data-toggle="modal" class="btn btn-warning mo_date" data-event-id="'.$row['event.event_id'].'">Manage Support Date</a> ';
    } else if (date('Y-m-d') >= $value) {
        //print_r($row);
        //return $xcrud;
        return 'Support Expired <br/><br/>'
        . '<a href="#" data-target=".mdl_country" data-toggle="modal" class="btn btn-warning mo_date" data-event-id="'.$row['event.event_id'].'">Manage Support Date</a> ';
    } else {
        return 'No Support <br/><br/>'
        . '<a href="#" data-target=".mdl_country" data-toggle="modal" class="btn btn-warning mo_date" data-event-id="'.$row['event.event_id'].'">Manage Support Date</a> ';;
    }
}

function event_expiry($value, $fieldname, $primary, $row, $xcrud) {
    return date('d-m-Y', strtotime($value)).'<br/><br/>'
        . '<a href="#" data-target=".mdl_expiry" data-toggle="modal" class="btn btn-warning ex_date" data-event-id="'.$row['event.event_id'].'">Manage Expiry Date</a> ';
}

function support_expiry_old($support_expiry_date) {

    if (date('Y-m-d') >= $support_expiry_date) {
        return $support_expiry_date;
    } else if (date('Y-m-d') <= $support_expiry_date) {
        return 'Support Expiry';
    } else {
        return 'Support No';
    }
}

function accessProtected($obj, $prop) {
    $reflection = new ReflectionClass($obj);
    $property = $reflection->getProperty($prop);
    $property->setAccessible(true);
    return $property->getValue($obj);
}

function remove_replacer($primary_key, $xcrud) {
    //print_r($xcrud);
    $val = accessProtected($xcrud, 'primary_val');
    $key = accessProtected($xcrud, 'primary_key');
    $table = accessProtected($xcrud, 'table');
    $db = Xcrud_db::get_instance();
    $query = 'Delete FROM ' . $table . ' WHERE ' . $key . ' = ' . (int) $val;
    $db->query($query);
}
