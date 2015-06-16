<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Library\Image\Profile\GetPicture;

class PictureController extends Controller {

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

    public function setProfilePicture($id)
    {

        $picture = new GetPicture;

        return $picture->setProfilePicture($id);
    }
}
