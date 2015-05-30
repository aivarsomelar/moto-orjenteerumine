<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpSpec\Exception\Exception;

class RiddleController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('riddleForm');
	}

	public function saveRiddle(Request $request)
	{

		$validator = Validator::make(
			[
				'riddle' => $request->input('riddle'),
				'author' => $request->input('author')
			],
			[
				'riddle' => 'required',
				'author' => 'required|max:20'
			]
		);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}

		$this->addRiddleToDatabase($request);

		return redirect()->back()->with('message', 'Riddle successfully saved');
	}

	public function showRiddles()
	{

		$results = $this->getAllRiddles();

		return view(
			'riddles',
			[
				'riddles' => $results
			]
			);
	}

	private function addRiddleToDatabase(Request $request)
	{
		$query = DB::table('riddles')
			->insert(
				[
					'riddle' => $request->input('riddle'),
					'author' => ucfirst($request->input('author'))
				]
			);

		if (!$query) {
			throw new Exception('Something went wrong when trying save riddle');
		}

		return $this;
	}

	private function getAllRiddles()
	{
		$query = DB::select('select * from riddles');

		if (!$query){
			throw new Exception("Something went wrong when trying to get all riddles. Maybe there is no riddles yet!");
		}

		return $query;
	}

	public function deleteAllRiddles()
	{
		$query = DB::statement('TRUNCATE riddles');

		if (!$query)
		{
			throw new Exception("Can't TRUNCATE table" );
		}

		return 'Success';
	}
}
