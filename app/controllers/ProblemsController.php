<?php
use Jay\Repositories\ProblemSolverRepository as Solver;
use Jay\Repositories\CodeParserRepository as Parser;

class ProblemsController extends \BaseController
{
    private $sidebar;
    protected $solve;
    protected $parse;

    public function __construct(Solver $solve, Parser $parse)
    {
        $this->solve = $solve;
        $this->sidebar = Problem::all()->toArray();
        $this->parse = $parse;
    }

	/**
	 * Display a listing of the resource.
	 * GET /problems
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('problems.index')->with(['items' => $this->sidebar]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /problems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('problems.create')->with(['items' => $this->sidebar]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /problems
	 *
	 * @return Response
	 */
	public function store()
	{
        $inputs = Input::all();
        $problem = new Problem;
        $problem->id = $inputs['number'];
        $problem->number = str_pad($inputs['number'], 4, 0, STR_PAD_LEFT);
        $problem->title = $inputs['title'];
        $problem->description = $inputs['description'];
        $problem->url = 'https://projecteuler.net/problem='. $inputs['number'];
        $problem->save();

        return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 * GET /problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $problem         = Problem::find($id);
        $problem->answer = $this->solve->problem($id);
        $problem->code   = $this->parse->problem($id);
        return View::make('problems.show', compact('problem'))->with(['items' => $this->sidebar]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /problems/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $problem = Problem::find($id);
		return View::make('problems.edit', compact('problem'))->with(['items' => $this->sidebar]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $problem = Problem::find($id);
        $inputs = Input::all();
        $problem->number = str_pad($inputs['number'], 4, 0, STR_PAD_LEFT);
        $problem->title = $inputs['title'];
        $problem->url = 'https://projecteuler.net/problem='. $inputs['number'];
        $problem->description = $inputs['description'];
        $problem->save();

        return View::make('problems.show', compact('problem'))->with(['items' => $this->sidebar]);
	}

}
