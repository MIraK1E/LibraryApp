<?php

    abstract class Model
    {
        protected $dbh;
        protected $stmt;
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
            return true;
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
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function fetchall()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function lastInsertId()
        {
            return $this->dbh->lastInsertId();
        }

        public function Insert($table, $array)
        {
            $key=''; $value=''; $bind = array();

            for($i = 0; $i < count($array); $i++)
            {
                if($i == 0)
                {
                    $key = $array[$i][0];
                    $value = ':'.$array[$i][0];
                }
                else
                {
                    $key .= ','.$array[$i][0];
                    $value .= ',:'.$array[$i][0];
                }
                $bind[':'.$array[$i][0]] = $array[$i][1];
            }


            $sql = 'INSERT INTO '.$table.'('.$key.')'.'VALUES'.'('.$value.')';

            if($this->prepare($sql))
            {
                foreach($bind as $datakey => $datavalue)
                {
                    echo $datakey.'=>'.$datavalue.'<br/>';
                    $this->bind($datakey,$datavalue);
                }

                if($this->execute())
                {
                    return;
                }
                else
                {
                    /*print_r($this->stmt);
                    print_r($this->dbh);
                    print_r($bind);
                    echo $sql;*/
                }
            }
            else
            {
                /*echo $sql;
                echo "didn't work";*/
            }
        }

    }

?>
