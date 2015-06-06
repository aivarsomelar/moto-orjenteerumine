<?php namespace App\Http\Controllers;

use App\Library\Image\Cover\CoverController;
use Illuminate\View\View;

class PublicController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
    /**
	public function __construct()
	{
		$this->middleware('guest');
	}
*/
    /**
     * Page with list of teams
     *
     * @return View
     */
	public function allTeams()
	{


		return view('teams.all');
	}

    /**
     * Single team view with description
     *
     * @return View
     */
    public function teamDescription()
    {
        $coverPicture = new CoverController();
        return view('teams.description')->with('cover', $coverPicture->getRandomCoverPicWithPath());
    }

}
