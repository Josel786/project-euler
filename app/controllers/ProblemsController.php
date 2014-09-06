<?php

class ProblemsController extends \BaseController
{
    private $sidebar;

    public function __construct()
    {
        $this->sidebar = Problem::all()->toArray();
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
        $problem->number = str_pad($inputs['number'], 4, 0, STR_PAD_LEFT);
        $problem->title = $inputs['title'];
        $problem->description = $inputs['description'];
        $problem->url = $inputs['url'];
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
        $problem = Problem::find($id);
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
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
