<?php

    abstract class Model
    {
        protected $dbh;
        protected $stmt;
        protected $table;
        //set connection
        public function __construct()
        {
            try
            {
                $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
            }
            catch(PDOException $e)
            {
                echo "Can't Connect";
            }
        }
        //prepare statement
        public function prepare($query)
        {
            $this->stmt = $this->dbh->prepare($query);
        }
        // bind parameter
        public function bind($param, $value, $type = null)
        {
            if(is_null($type))
            {
                switch(true)
                {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;

                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;

                    default:
                        $type = PDO::PARAM_STR;

                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
        // execute statement
        public function execute()
        {
            return $this->stmt->execute();
        }

        public function fetch()
        {
            $this->execute();
            return $this->dbh->fetch(PDO::FETCH_ASSOC);
        }

        public function fetchall()
        {
            $this->execute();
            return $this->dbh->fetchAll(PDO::FETCH_ASSOC);
        }

        public function lastInsertId()
        {
            return $this->dbh->lastInsertId();
        }

        public function Insert($table, $array, $print = false)
        {
            $this->table = $table;
            $count = count($array);
            $key; $value; $bind = array();

            for($i = 0; $i < $count; $i++)
            {
                if($i = 0)
                {
                    $key = $array[$i][0];
                    $value = ':'.$array[$i][1];
                }
                else
                {
                    $key .= ','.$array[$i][0];
                    $value .= ',:'.$array[$i][1];
                }
                array_push($bind,':'.$array[$i][1]);
            }

            $sql = "INSERT INTO ".$this->table."(".$key.")"."(".$value.")";
            $this->prepare($sql);

            for($i = 0; $i < $count; $i++)
            {
                $this->bind($bind[$i],$array[$i][1]);
            }

            if($this->execute())
            {
                return true;
            }
            else
            {
                return false;
            }

            if($print == true)
            {
                echo $sql;
            }
        }

    }

?>
