<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Library\Image\Cover\CoverController;
use App\Library\Image\Profile\ProfileController;
use Illuminate\Support\Facades\Request;

class UploadController extends Controller
{

    /**
     * Display upload form for cover picture uploading
     *
     * @return \Illuminate\View\View
     */
	public function getCoverUploadForm()
	{

        return view('upload.coverForm');
	}

    /**
     *
     */
    public function getProfileUploadForm()
    {
        return view('upload.profileForm');
    }

    /**
     * Save uploaded cover picture into database and correct folder
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function saveCoverPicture()
    {

        $cover = new CoverController();
        return $cover->uploadCoverPicture();
    }

    public function saveProfilePicture(Request $request)
    {

        $profile = new ProfileController();
        return $profile->uploadProfilePicture($request);
    }

}
