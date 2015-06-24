<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Library\Image\Moments\GetPictures;
use App\Library\Image\Profile\GetPicture;

class PictureController extends Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display all profile pictures
	 *
	 * @return Response
	 */
	public function getAllProfilePictures()
	{
		$pictures = new GetPicture;

        return view('pictures.allProfile')
            ->with('pictures', $pictures->getAllProfilePicturesData())
            ->with('path', $pictures->getProfilePicturesPath());
	}

    /**
     * Set a team profile picture
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function setProfilePicture($id)
    {

        $picture = new GetPicture;

        return $picture->setProfilePicture($id);
    }

    public function getAllTeamPictures()
    {

        $pictures = new GetPictures();

        return view('pictures.allMoments')
            ->with('pictures', $pictures->getAllTeamPictures())
            ->with('path', $pictures->getMomentsPicturesPath());
    }
}
