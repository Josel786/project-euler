<?php namespace Jay\Repositories;

class CodeParserRepository
{
    private $file;

    public function __construct()
    {
        $this->file = \File::get('../app/Jay/Repositories/ProblemSolverRepository.php');
    }

    public function problem($id)
    {
        $pattern = '/(?:problem_'.$id.')\(.*\)[\n\s\t]+\{([\w\s\t\d\[\]\(\)\-\/\"\'\\\|$=<>;:,.+%&!*?]+)\}/';
        preg_match($pattern, $this->file, $code);
        if($code)
            return $code[1];

        return 'Pattern Failed.';
    }

}
