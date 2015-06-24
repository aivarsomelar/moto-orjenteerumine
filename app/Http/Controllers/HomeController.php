<?php namespace App\Http\Controllers;


use App\Library\Image\Cover\CoverController;
use App\Library\Image\Moments\GetPictures;
use App\Library\Image\Profile\GetPicture;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $covers = new CoverController();
        $profilePicture = new GetPicture();
        $momentPicture = new GetPictures();
        $riddle = new RiddleController();

		return view('myteam.dashboard.dashboard')
            ->with('cover', $covers->getRandomCoverPicWithPath())
            ->with('profilePicture', $profilePicture->getTeamProfilePictureWithPath())
            ->with('randomRiddle', $riddle->getRandomRiddle())
            ->with('randomMomentPicture', $momentPicture->getRandomMomentPictureWithPath());
	}

    public function getTeamMemberAddForm()
    {
        return view('forms.addTeamMemberForm');
    }
}
