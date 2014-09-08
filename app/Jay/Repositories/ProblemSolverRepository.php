<?php namespace Jay\Repositories;

class ProblemSolverRepository
{
    public function problem($id)
    {
        if(method_exists($this, "problem_$id"))
            return $this->{"problem_$id"}();

        return 'No Answer';
    }

    /**
     * find the sum of all multiples of 3 or 5 below 1000
     */
    public function problem_1()
    {
        $multiples = [];
        for($i = 0; $i < 1000; $i++)
            if($i % 3 == 0 || $i % 5 == 0)
                $multiples[] = $i;

        return array_sum($multiples);
    }

    /**
     * By considering the terms in the Fibonacci sequence whose values do not exceed four million, find the sum of the even-valued terms.
     */
    public function problem_2()
    {
        $a = 1;
        $b = 2;
        $even = [$b];
        while($a < 4000000):
            $c = $a + $b;
            $a = $b;
            $b = $c;
            if($b % 2 == 0)
                $even[] = $b;
        endwhile;

        return array_sum($even);
    }

    /**
     * What is the largest prime factor of the number 600851475143 ?
     */
    public function problem_3()
    {
        $n = 600851475143;
        $prime_factor = 0;
        $i = 2;

        while($i * $i <= $n):
            if($n % $i == 0):
                $n = $n / $i;
                $prime_factor = $i;
            else:
                $i++;
            endif;
        endwhile;

        if($n > $prime_factor) return $n;

        return false;
    }

    public function problem_13()
    {
        $numbers = \File::get('../app/Jay/Files/problem_13.txt');
        $numbers = explode("\n", $numbers);
        array_pop($numbers);
        $sum = 0;
        foreach($numbers as $number)
            $sum = bcadd($number, $sum);

        $answer = substr($sum, 0, 10);

        return $answer;
    }
}
