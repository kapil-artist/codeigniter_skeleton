<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{

    function __construct()
    {
        parent::__construct();
        $db = db_connect();
        $pager = \Config\Services::pager();
    }

    function addData($table, $data)
    {
        // pe($data);
        $builder = $this->db->table($table);
        $builder->insert($data);
        $insert_id = $this->db->insertID();
        
        return $insert_id;
    }

    function updateData($table, $where, $data)

    {
        $builder = $this->db->table($table);

        foreach ($where as $key => $val) {
            $builder->where($key, $val);
        }

        $builder->update($data);

        //    p($this->db->getLastQuery());
    }

    function deleteData($table, $where)
    {
        $builder = $this->db->table($table);
        foreach ($where as $key => $val) {
            $builder->where($key, $val);
        }
        $builder->delete();
        //        p($this->db->getLastQuery());
    }


    function addlink($data)
    {
        $builder = $this->db->table('links');
        $builder->insert($data);
    }

    function getAll($table, $data)
    {
        $return = [];
        $builder = $this->db->table($table);
        if (!empty($data['select'])) {
            $builder->select($data['select']);
        } else {
            $builder->select('*');
        }
        if (!empty($data['where'])) {
            foreach ($data['where'] as $key => $value) {
                $builder->where(["$key" => $value]);
            }
        }
        if (!empty($data['whereSpecific'])) {
            $builder->where($data['whereSpecific'], NULL, FALSE);
        }
        if (!empty($data['whereIn'])) {
            foreach ($data['whereIn'] as $key => $value) {
                $builder->whereIn($key, $value);
            }
        }
        if (!empty($data['like'])) {
            foreach ($data['like'] as $key => $value) {
                $builder->like($key, $value);
            }
        }
        if (!empty($data['orLike'])) {
            foreach ($data['orLike'] as $key => $value) {
                $builder->orLike($key, $value);
            }
        }
        if (!empty($data['groupBy'])) {
            $builder->groupBy($data['groupBy']);
        }

        $orderByAsc = !empty($data['orderBy']) ? 'ASC' : 'DESC';
        if (!empty($data['orderByColumn'])) {
            $builder->orderBy($data['orderByColumn'], $orderByAsc);
        } 
        if (!empty($data['limit'])) {
            $start = !empty($data['start']) ? $data['start'] : $start;
            $builder->limit($data['limit'], $start);
        }
        if (!empty($data['linksJoin'])) {
            $builder->join($data['jointable'], $data['linksJoinCondition'], 'left');
        }
        if (!empty($data['linksJoin2'])) {
            $builder->join($data['jointable2'], $data['linksJoinCondition2'], 'left');
        }
        if (!empty($data['linksJoin2'])) {
            $builder->join($data['jointable3'], $data['linksJoinCondition2'], 'left');
        }


        $query = $builder->get();

        foreach ($query->getResult() as $row) {
            if (!empty($row)) {
                $pid = !empty($data['primary_id']) ? $data['primary_id'] : 'id';
                $idValue = !empty($pid) ? $row->$pid : $row->id;
                $return[$idValue] = $row;
            }
        }
        if (!empty($data['pe'])) {
            $a = $this->db->getLastQuery();
            pe($a);
        }
        return $return;
    }

    function getCount($table, $data = [])
    {
        $builder = $this->db->table($table);
        return $builder->countAll();
    }
    function getSum($table, $data = [])
    {
        $builder = $this->db->table($table);
        if(!empty($data['sumField'])){
            $builder->select("sum(".$data['sumField'].") as count");
        }
        if (!empty($data['sumWhereCondition'])) {
            foreach ($data['sumWhereCondition'] as $key => $value) {
                $builder->where(["$key" => $value]);
            }
        }
        if (!empty($data['pe'])) {
            $a = $this->db->getLastQuery();
            pe($a);
        }
        
        $query = $builder->get();
        $return = [];
        foreach ($query->getResult() as $row) {
            if (!empty($row)) {
                array_push($return,$row);
            }
        }

        return $return;
    }


    function queryExecutor($query)
    {
        $sql = "$query";
        $query = $this->db->query($sql);
        foreach ($query->getResult() as $row) {
            $return[] = $row;
        }
        return $return;
    }
}
