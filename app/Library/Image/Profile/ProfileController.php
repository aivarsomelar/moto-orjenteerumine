<?php
namespace App\Library\Image\Profile;

use App\Library\Image\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

/**
 * Control actions with profile pictures
 */
class ProfileController
{

    /**
     * File system path where profile pictures are stored
     */
    const PATH = '/pic/profile/';

    /**
     * Team id
     *
     * @var int
     */
    protected $teamId;

    /**
     * Instance of image
     *
     * @var Image
     */
    protected $uploadHandler;

    /**
     * Set team id
     */
    public function __construct()
    {
        $this->teamId = Auth::id();
        $this->uploadHandler = new Image('profile', self::PATH, 'profile');
    }

    /**
     * Check readability
     *
     * @param Request $request
     * @return bool
     */
    protected function isReusable(Request $request)
    {
        if (!$request::input('reusable')) {
            return false;
        }

        return true;
    }

    /**
     * Check if this team data exist in team_data table
     *
     * @return bool
     */
    protected function isNewTeamData()
    {

        $query = DB::table('team_data')->where('team_id', '=', $this->teamId)->get();

        if (!$query) {
            return true;
        }

        return false;
    }

    /**
     * Insert profile picture into team_data table
     *
     * @return bool
     */
    protected function insertIntoTeamData()
    {

        $query = DB::table('team_data')->insert([
            [
                'team_id' => $this->teamId,
                'profile_picture' => $this->uploadHandler->getPictureId()
            ]
        ]);

        if (!$query) {
            $this->uploadHandler->setError('Something went wrong while inserting team data');
            return false;
        }

        return true;
    }

    /**
     * Update profile picture in team_data table
     *
     * @param int $pictureId
     * @return bool
     */
    protected function updateTeamData($pictureId)
    {

        $query = DB::table('team_data')
            ->where('team_id', $this->teamId)
            ->update(['profile_picture' => $pictureId]);

        if (!$query) {
            $this->uploadHandler->setError('Something went wrong while updating team data');
            return false;
        }

        return true;
    }

    /**
     * Redirect back to previous page with errors
     *
     * @return $this
     */
    protected function redirectWithErrors()
    {

        return redirect()->back()->withErrors($this->uploadHandler->getError());
    }

    /**
     * Get file system path where profile pictures are saved
     *
     * @return string
     */
    public function getProfilePicturesPath()
    {

        return self::PATH;
    }

}