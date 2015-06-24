<?php
namespace App\Library\Image\Profile;


use Illuminate\Support\Facades\DB;

class GetPicture extends ProfileController
{

    /**
     * Get all reusable profile pictures from database
     *
     * @return bool
     */
    public function getAllProfilePicturesData()
    {

        $query = DB::table('pictures')
            ->where('level', '=', 'profile')
            ->where('reusable', '=', 1)
            ->get();

        if (!$query) {
            return $this->errorHandler->setError('No profile pictures were found!');
        }

        return $query;
    }

    /**
     * Get team profile picture with path
     *
     * @return bool|string
     */
    public function getTeamProfilePictureWithPath()
    {

        $query = DB::table('pictures')
            ->select('file_name')
            ->where('level', '=', 'profile')
            ->where('id', '=', $this->getTeamProfilePictureId())
            ->first();

        if (!$query) {
            if (!$this->errorHandler->getError()) {
                $this->errorHandler->setError('Profile picture not exist');
            }

            return false;
        }

        return $this->getProfilePicturesPath(). $query->file_name;
    }

    /**
     * Get team profile picture id
     *
     * @return mixed
     */
    private function getTeamProfilePictureId()
    {
        $query = DB::table('team_data')->select('profile_picture')->where('team_id', '=', $this->teamId)->first();

        if (!$query) {
            $this->errorHandler->setError("Team don't have a profile picture. Please set it first");
            return false;
        }

        return $query->profile_picture;
    }
    
    /**
     * Set profile picture
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function setProfilePicture($id)
    {
        if (!$this->updateTeamData($id)) {
            return $this->redirectWithErrors();
        }

        return redirect()->back()->with('message', 'Profile picture successfully uploaded');
    }


}