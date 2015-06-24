<?php
namespace App\Library\Image\Profile;

use App\Library\Handler\Error\ErrorHandler;
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
     * Instance of error handler
     *
     * @var ErrorHandler
     */
    protected $errorHandler;

    /**
     * Set team id
     */
    public function __construct()
    {
        $this->teamId = Auth::id();
        $this->uploadHandler = new Image('profile', self::PATH, 'profile');
        $this->errorHandler = new ErrorHandler();
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
    protected function insertIntoTeamData($pictureId)
    {

        $query = DB::table('team_data')->insert([
            [
                'team_id' => $this->teamId,
                'profile_picture' => $pictureId
            ]
        ]);

        if (!$query) {
            $this->errorHandler->setError('Something went wrong while inserting team data');
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

        if ($this->isNewTeamData()) {
            if (!$this->insertIntoTeamData($pictureId)) {
                return false;
            }

            return true;

        }
        $query = DB::table('team_data')
            ->where('team_id', $this->teamId)
            ->update(['profile_picture' => $pictureId]);

        if (!$query) {
            $this->errorHandler->setError('Something went wrong while updating team data');
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

        return redirect()->back()->withErrors($this->errorHandler->getError());
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