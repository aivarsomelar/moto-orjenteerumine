<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Library\Image\Profile\ProfileController;

class PictureController extends Controller {

	/**
	 * Display all profile pictures
	 *
	 * @return Response
	 */
	public function getAllProfilePictures()
	{
		$pictures = new ProfileController();

        return view('pictures.allProfile')
            ->with('pictures', $pictures->getAllProfilePicturesData())
            ->with('path', $pictures->getProfilePicturesPath());
	}

    public function setProfilePicture($id)
    {

        $picture = new ProfileController();

        return $picture->setProfilePicture($id);
    }
}
