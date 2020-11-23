<?php


class Model
{
    function __construct()
    {
        mysqli_set_charset($this->link = new mysqli(
            'localhost',
            'root',
            '',
            'business_card'
        ), "utf8");
    }

    public function get_data($name_table)
    {
    }

    public function insert_data($name_table, $table_params, $values)
    {
    }

    public function update_data($name_table, $update_params, $elem_id)
    {
    }

    public function delete_data($name_table, $elem_id)
    {
    }
}

