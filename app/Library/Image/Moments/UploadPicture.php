<?php
namespace App\Library\Image\Moments;

use Illuminate\Support\Facades\DB;

class UploadPicture extends MomentController
{

    /**
     * Upload user picture, add picture into database
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function uploadMomentPicture()
    {

        if (!$this->uploadHandler->uploadPicture($this->teamId, false)) {
            return redirect()->back()->withErrors($this->uploadHandler->getError());
        }

        return redirect()->back()->with('message', 'Picture successfully uploaded');
    }

    private function connectPictureWithTeam()
    {

        $query = DB::table('team_pictures')->insert(
            [
                'team_id' => $this->teamId,
                'picture_id' => $this->uploadHandler->getPictureId()
            ]
        );

        if (!$query) {
            $this->errorHandler->setError("Picture can't be connected with team");
            return false;
        }

        return $query;
    }
}
