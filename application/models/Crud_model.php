<?php
class Crud_model extends CI_Model {

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // insert row into table
    public function insert_row($table, array $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id(); // will return the new inserted id
    }

    // update row from table
    public function update_row($table, array $data, array $where) {
        foreach ($where as $key => $value) {
            $this->db->where("$key", "$value");
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();  // will return number of rows affected or 0 if not
    }

    // delete row from table
    public function delete_row($table, array $where) {
        foreach ($where as $key => $value) {
            $this->db->where("$key", "$value");
        }
        $this->db->delete($table);
        return $this->db->affected_rows(); // will return number of rows affected or 0 if not
    }

    function updateDataBatch($data, $tab, $whereAttr) {
        $this->db->update_batch($tab, $data, $whereAttr);
    }

    function insertDataBatch($table, $data) {
        $this->db->insert_batch($table, $data);
    }

    public function fetch_result($options) {

        $select = false;
        $table = false;
        $join = false; // should be array | array('t2' => 't2.id = t1.id')
        $order = false;
        $limit = false;
        $where = false;
        $where_custom = false;
        $or_where = false;
        $where_not_in = false;
        $single = false;
        $like = false;
        $count = false;

        extract($options);

        if ($select != false)
            $this->db->select($select);

        if ($table != false)
            $this->db->from($table);

        if ($where != false)
            $this->db->where($where);

        if ($where_not_in != false) {
            foreach ($where_not_in as $key => $value) {
                if (count($value) > 0)
                    $this->db->where_not_in($key, $value);
            }
        }

        if ($like != false) {
            $this->db->like($like);
        }

        if ($or_where != false)
            $this->db->or_where($or_where);

        if ($where_custom != false)
            $this->db->where($where_custom);

        if ($count == false) {
            if ($limit != false) {
                if (is_array($limit)) {
                    $this->db->limit($limit[0], $limit[1]);
                } else {
                    $this->db->limit($limit);
                }
            }
        }

        if ($order != false) {
            foreach ($order as $key => $value) {
                if (is_array($value)) {
                    foreach ($order as $orderby => $orderval) {
                        $this->db->order_by($orderby, $orderval);
                    }
                } else {
                    $this->db->order_by($key, $value);
                }
            }
        }

        if ($join != false) {
            foreach ($join as $key => $value) {
                if (is_array($value)) {
                    if (count($value) == 3) {
                        $this->db->join($value[0], $value[1], $value[2]);
                    } else {
                        foreach ($value as $key1 => $value1) {
                            $this->db->join($key1, $value1);
                        }
                    }
                } else {
                    $this->db->join($key, $value);
                }
            }
        }

        if ($single) {
            return $this->db->get()->row();
        }

        if ($count) {
            return $this->db->get()->num_rows(); // run query and return number of rows
        } else {
            return $this->db->get()->result(); // run query
        }
    }

}
