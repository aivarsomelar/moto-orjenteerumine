<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Library\Image\Cover\CoverController;
use App\Library\Image\Profile\UploadPicture;
use Illuminate\Support\Facades\Request;

class UploadController extends Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display upload form for cover picture uploading
     *
     * @return \Illuminate\View\View
     */
	public function getCoverUploadForm()
	{

        return view('forms.coverForm');
	}

    /**
     *
     */
    public function getProfileUploadForm()
    {
        return view('forms.profileForm');
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

        $profile = new UploadPicture;
        return $profile->uploadProfilePicture($request);
    }

}
