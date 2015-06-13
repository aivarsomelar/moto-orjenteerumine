<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Library\Image\Image;

class UploadController extends Controller {

	public function getCoverUploadForm()
	{

        return view('upload.coverForm');
	}

    public function saveCoverPicture()
    {

        $upload = new Image('cover', '/pic/covers/', 'cover');
        if(!$upload->uploadPicture()) {
            return redirect()->back()->withErrors($upload->getError());
        }

        return redirect()->back()->with('message', 'Cover picture successfully uploaded');
    }

}
