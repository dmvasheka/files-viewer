<?php

namespace App\Core;

use App\Core\DB\DbAdapter;

abstract class Model
{
    private static $dbh;
    public $row;
    public $result;
    public $data = array();
    private $tableName;

    /**
     * Model constructor.
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->dbh = DbAdapter::getInstance();
        $this->dbh->loadConfig();
    }



    /**
     * @param $arrParams
     * @param null $arrConditions
     * @return mixed
     */
    public function read($arrParams, $arrConditions = null)
    {
        $sql = null;
        if (isset($arrParams)) {
            $params = implode(', ', $arrParams);
            $sql = "SELECT {$params} FROM  {$this->tableName} ";

            if (isset($arrConditions)) {
                $sql .= ' WHERE ';
                $condition = implode(' AND WHERE ', $arrConditions);
                $sql .= $condition;
            }
        }
        if (isset($sql)) {
            $stm = $this->dbh->query($sql);
            $result = $stm->fetch();
            return $result;
        }
        return false;

    }

    /**
     * @param $arrColumns
     * @param $arrValues
     * @return bool
     */
    public function create($arrColumns, $arrValues)
    {
        if (isset($arrColumns) && isset($arrValues)) {
            $tableName = $this->tableName;
            $columns = '`' . implode('`, `', $arrColumns) . '`';
            $value = "'" . implode("', '", $arrValues) . "'";
            $sql = "INSERT INTO `{$tableName}` ( {$columns} ) VALUES ( {$value} )";
            $stm = $this->dbh->query($sql);

            return true;
        }
        return false;
    }

    /**
     * @param $arrParams
     * @param null $arrConditions
     * @return bool
     */
    public function update($arrParams, $arrConditions = null)
    {
        $sql = null;
        if (isset($arrParams)) {
            $params = implode(", " , $arrParams);
            $sql = "UPDATE  `{$this->tableName}` SET {$params}";

            if (isset($arrConditions)) {
                $sql .= ' WHERE ';
                $condition = implode(' AND WHERE ', $arrConditions);
                $sql .= $condition;
            }
        }
        if (isset($sql)) {
            $stm = $this->dbh->query($sql);
            return true;
        }
        return false;
    }

    /**
     * @param $arrConditions
     * @return bool
     */
    public function delete($arrConditions)
    {
        if (isset($arrConditions)) {
            $tableName = $this->tableName;
            $conditions = implode(', ', $arrConditions);
            $sql = "DELETE FROM {$tableName} WHERE {$conditions}";
            $stm = $this->dbh->query($sql);
            return true;
        }
        return false;
    }

}

