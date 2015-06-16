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
            return false;
        }

        return $query;
    }

    public function getTeamProfilePictureId()
    {
        $query = DB::table('team_data')->select('profile_picture')->where('team_id', '=', $this->teamId);

        if (!$query) {
            $this->uploadHandler->setError("Team don't have a profile picture. Please set it first");
        }

        return $query->team_id;
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