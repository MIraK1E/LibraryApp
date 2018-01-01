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

        public function fetchAll()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function lastInsertId()
        {
            return $this->dbh->lastInsertId();
        }

        public function insert($table, $array)
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
                    $this->bind($datakey,$datavalue);
                }

                if($this->execute())
                {
                    return;
                }
                else
                {
                    echo "$sql didn't work";
                }
            }
            else
            {
                echo "$sql didn't work";
            }
        }

        public function getbyId($table, $id, $table_id)
        {
            $this->prepare('SELECT * FROM '.$table.' WHERE '.$table_id.'= :id');
            $this->bind(':id', $id);
            $result = $this->fetch();
            return $result;
        }

        public function update($table, $array, $where, $id)
        {
            $update=''; $bind = array();

            for($i = 0; $i < count($array); $i++)
            {
                if($i == 0)
                {
                    $update = $array[$i][0].'='.':'.$array[$i][0];
                }
                else
                {
                    $update .= ','.$array[$i][0].'='.':'.$array[$i][0];
                }
                $bind[':'.$array[$i][0]] = $array[$i][1];
            }

            $sql = 'UPDATE '.$table.' SET '.$update.' WHERE '.$where.'= :id';

            if($this->prepare($sql))
            {
                $this->bind(':id', $id);

                foreach($bind as $datakey => $datavalue)
                {
                    $this->bind($datakey,$datavalue);
                }

                if($this->execute())
                {
                    return;
                }
                else
                {
                    echo "$sql didn't work";
                }
            }
            else
            {
                echo "$sql didn't work";
            }
        }

        public function destroy($id, $table, $where)
        {
            $sql = 'DELETE FROM '.$table.' WHERE '.$where.' = :id';

            if($this->prepare($sql))
            {
                $this->bind(':id', $id);
                $this->execute();
                $response = 'success';
                return $response;
            }
            else
            {
                $response = 'error';
                return $response;
            }
        }

    }

?>
