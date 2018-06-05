<?php


class QueryComposer
{
    private static function build_where($q, &$query, &$args)
    {
        if (isset($q->where)) {
            $query .= ' WHERE';
            $arr = explode(' ', $q->where);
            foreach ($arr as $key => $value) {
                if (!($key % 4)) {
                    $query .= ' ' . $value . ' ';
                    continue;
                }
                if (($key - 2) % 4) //1,2,3
                    $query .= ' ' . $value;
//                if (!($key % 4))
//                    $query .= ' \'';
//                if (($key - 2) % 4)
//                    $query .= ' \'' . $value .'\'';

//                if (($key - 2) % 4)
//                    $query .= ' ' . $value;
                else {
                    $query .= " ?";
//                        $query .= " :key$key";
                    $args[] = $value;
//                        $args[":key$key"] = $value;
                }
            }
        }
    }

    private static function buildSelect($q)
    {
        $args = [];
        $query = "SELECT ";
        $i = 0;
        if (isset($q->params))
            foreach ($q->params as $value) {
                $query .= $value;
                if ($i != count($q->params) - 1)
                    $query .= ', ';
                $i++;
            }
        else $query .= '* ';
        $query .= ' FROM `' . $q->table . '`';
        // join 
        if (isset($q->join)) {
            foreach ($q->join as $table =>$cond) {
                $query.= ' join ' . $table . ' ON ' . $cond;
            }
        }
        QueryComposer::build_where($q, $query, $args);

        if (isset($q->orderBy)) {
            if ($q->orderBy[count($q->orderBy) - 1] != 'desc')
                array_push($q->orderBy, 'asc');
            $query .= " ORDER BY ";
            $i = 0;
            foreach ($q->orderBy as $value) {
                $query .= $value . ' ';
                if ($i < count($q->orderBy) - 2)
                    $query .= ' ,';
                $i++;
            }
        }
        if (isset($q->limit)) {
            $query .= "LIMIT $q->limit";
        }
        return sql($query, $args);
    }

    private static function buildInsert($q)
    {
        $args = [];
        $query = "INSERT INTO `" . $q->table . "` (";
        $str = "";
        $i = 0;
        if (isset($q->params[0]))
            foreach ($q->params[0] as $key => $value) {
                $query .= $key;
                $str .= " ?";
                if ($i != count($q->params[0]) - 1) {
                    $query .= ', ';
                    $str .= ",";
                }
                $args[] = $value;
                $i++;
            }
        else throw new Exception("Error: There is no parameters!");
        $query .= ') VALUES (';
        $query .= $str . ')';
        return sql($query, $args);
    }

    private static function buildUpdate($q)
    {
        $args = [];
        $query = "UPDATE `" . $q->table . '` SET ';
        $i = 0;
        if (isset($q->params[0]))
            foreach ($q->params[0] as $key => $value) {
                $query .= " $key = ?";
                if ($i != count($q->params[0]) - 1)
                    $query .= ' ,';
                $args[] = $value;
                $i++;
            }
        else throw new Exception("Error: There is no parameters!");
        QueryComposer::build_where($q, $query, $args);
        return sql($query, $args);
    }

    private static function buildDelete($q)
    {
        $args = [];
        $query = "DELETE FROM `" . $q->table . '`  ';
        QueryComposer::build_where($q, $query, $args);
        return sql($query, $args);
    }

    public static function compose($q)
    {
        $possible_actions = [$q->select, $q->insert, $q->update, $q->delete];
        if (array_sum($possible_actions) != 1)
            throw new Exception("Error: Invalid syntax!");

        if ($possible_actions[0]) {// select
            return QueryComposer::buildSelect($q);
        }
        if ($possible_actions[1]) {// insert
            return QueryComposer::buildInsert($q);
        }
        if ($possible_actions[2]) {// update
            return QueryComposer::buildUpdate($q);

        } else {// delete
            return QueryComposer::buildDelete($q);
        }
    }

}