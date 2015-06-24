<?php
namespace App\Library\Handler\Overt;

use App\Library\Image\Profile\ProfileController;
use Illuminate\Support\Facades\DB;

class TeamHandler
{

    /**
     * Get all teams
     *
     * @return bool
     */
    public function getAllTeams()
    {

        $query = DB::table('users')->get();

        if (!$query)
        {
            return false;
        }

        return $query;
    }

    /**
     * Get team profile picture
     *
     * @param $teamId
     * @return bool
     */
    public function getTeamProfilePicture($teamId)
    {

        $query = DB::table('pictures')
            ->where('id', '=', $this->getTeamProfilePictureId($teamId))
            ->first();

        if (!$query) {
            return 'thumbnail.png';
        }

        return $query->file_name;
    }

    /**
     * Get team profile picture with path
     *
     * @param $teamId
     * @return string
     */
    public function getTeamProfilePictureWithPath($teamId)
    {

        $profilePictureHandler = new ProfileController();

        return $profilePictureHandler->getProfilePicturesPath() . $this->getTeamProfilePicture($teamId);
    }

    /**
     * Get team profile picture id
     *
     * @param $teamId
     * @return int | bool
     */
    private function getTeamProfilePictureId($teamId)
    {
        $query = DB::table('team_data')
            ->where('team_id', '=', $teamId)
            ->first();

        if (!$query) {
            return false;
        }

        return $query->profile_picture;
    }
}