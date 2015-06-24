<?php
namespace App\Library\Image\Profile;


use Illuminate\Support\Facades\Request;

class UploadPicture extends ProfileController
{

    /**
     * Upload profile picture, add picture into database, connect picture with team
     *
     * @param Request $request
     * @return $this|ProfileController|\Illuminate\Http\RedirectResponse
     */
    public function uploadProfilePicture(Request $request)
    {

        $reusable = $this->isReusable($request);

        if (!$this->uploadHandler->uploadPicture($this->teamId, $reusable)) {
            return redirect()->back()->withErrors($this->uploadHandler->getError());
        }

        if ($this->isNewTeamData()) {
            if (!$this->insertIntoTeamData($this->uploadHandler->getPictureId())) {
                return $this->redirectWithErrors();
            }
        } else {

            if (!$this->updateTeamData($this->uploadHandler->getPictureId())) {
                return $this->redirectWithErrors();
            }
        }

        return redirect()->back()->with('message', 'Profile picture successfully uploaded');
    }
}
