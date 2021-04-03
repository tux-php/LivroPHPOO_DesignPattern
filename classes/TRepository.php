<?php

/* @author fernando */

final class TRepository {

    private $class;

    function __construct($class) {
        $this->class = $class;
    }

    function load(TCriteria $criteria) {
        $sql = new TSqlSelect();
        $sql->addColumn('*');
        $sql->setEntity(constant($this->class . '::TABLENAME'));
        $sql->setCriteria($criteria);

        if ($conn = TTransaction::get()) {
            TTransaction::log($sql->getInstruction());

            $result = $conn->Query($sql->getInstruction());
            $results = array();

            if ($result) {
                while ($row = $result->fetchObject($this->class)) {
                    $results[] = $row;
                }
            }
            return $results;
        } else {
            throw new Exception('Nã há transação ativa!!!');
        }
    }

    function delete(TCriteria $criteria) {
        $sql = new TSqlDelete();
        $sql->setEntity(constant($this->class . '::TABLENAME'));
        $sql->setCriteria($criteria);

        if ($conn = TTransaction::get()) {
            TTransaction::log($sql->getInstruction());

            $result = $conn->exec($sql->getInstruction());

            return $result;
        } else {
            throw new Exception('Nã há transação ativa!!!');
        }
    }

    function count(TCriteria $criteria) {
        $sql = new TSqlSelect();
        $sql->addColumn('count(*)');
        $sql->setEntity(constant($this->class . '::TABLENAME'));

        $sql->setCriteria($criteria);

        if ($conn = TTransaction::get()) {
            TTransaction::log($sql->getInstruction());

            $result = $conn->Query($sql->getInstruction());


            if ($result) {
                $row = $result->fetch();
            }
            return $row[0];
        } else {
            throw new Exception('Nã há transação ativa!!!');
        }
    }

}
