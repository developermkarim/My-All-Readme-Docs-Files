<?php


class MethodChain{
    protected $result = 0;

    public function add($number)
    {
        $this->result += $number;
        return $this;
    }

    public function subtract($sub_name)
    {
        $this->result -= $sub_name;
        return $this;
    }

    public function multiply($multiply_num)
    {
        $this->result *= $multiply_num;
        return $this;
    }

    public function getResult()
    {
        return "Method chaining Result : " . $this->result;
    }

}

$chain_intance = new MethodChain();

echo $chain_intance->add(12)->subtract(10)->multiply(5)->getResult();