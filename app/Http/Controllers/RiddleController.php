<?php namespace App\Http\Controllers;

use App\Library\Handler\Error\ErrorHandler;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpSpec\Exception\Exception;

class RiddleController extends Controller
{

    /**
     * Instance of error handler
     *
     * @var ErrorHandler
     */
    protected $error;

    /**
     * Construct a new instances
     */
    public function __construct()
    {
        $this->error = new ErrorHandler();
    }

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('forms.riddleForm');
	}

    /**
     * Show single riddle page
     *
     * @return \Illuminate\View\View
     */
    public function showRiddle($id)
    {

        $riddle = $this->getRiddle($id);

        if (!$riddle) {
            return redirect()->back()->withErrors($this->error->getError());
        }

        return view('riddle')->with('riddle', $riddle);
    }

    /**
     * Page where riddle is saved into database
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws Exception
     */
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

    /**
     * Show all riddles
     *
     * @return \Illuminate\View\View
     * @throws Exception
     */
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

    /**
     * Add riddle to database
     *
     * @param Request $request
     * @return $this
     * @throws Exception
     */
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

    /**
     * Get all riddles from database
     *
     * @return mixed
     * @throws Exception
     */
	private function getAllRiddles()
	{
		$query = DB::select('select * from riddles');

		if (!$query){
			throw new Exception("Something went wrong when trying to get all riddles. Maybe there is no riddles yet!");
		}

		return $query;
	}

    /**
     * Get single riddle from database
     *
     * @param $id
     * @return bool
     */
    private function getRiddle($id)
    {
        $query = DB::table('riddles')->where('id', '=', $id)->first();

        if (!$query) {
            $this->error->setError('Riddle does nor exist');
            return false;
        }

        return $query;
    }

    /**
     * Link to delete all riddles
     *
     * @return string
     * @throws Exception
     */
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
