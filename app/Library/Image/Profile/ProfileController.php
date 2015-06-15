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
    private $teamId;

    /**
     * Instance of image
     *
     * @var Image
     */
    private $uploadHandler;

    /**
     * Set team id
     */
    public function __construct()
    {
        $this->teamId = Auth::id();
        $this->uploadHandler = new Image('profile', self::PATH, 'profile');
    }

    /**
     * Upload profile picture, add picture into database, connect picture with team
     *
     * @param Request $request
     * @return $this|ProfileController|\Illuminate\Http\RedirectResponse
     */
    public function uploadProfilePicture(Request $request)
    {

        $reusable = $this->isReusable($request);

        if (!$this->uploadHandler->uploadPicture($reusable)) {
            return redirect()->back()->withErrors($this->uploadHandler->getError());
        }

        if ($this->isNewTeamData()) {
            if (!$this->insertIntoTeamData()) {
                return $this->redirectWithErrors();
            }
        } else {

            if (!$this->updateTeamData($this->uploadHandler->getPictureId())) {
                return $this->redirectWithErrors();
            }
        }

        return redirect()->back()->with('message', 'Profile picture successfully uploaded');
    }

    public function setProfilePicture($id)
    {
        if (!$this->updateTeamData($id)) {
            return $this->redirectWithErrors();
        }

        return redirect()->back()->with('message', 'Profile picture successfully uploaded');
    }

    /**
     * Check readability
     *
     * @param Request $request
     * @return bool
     */
    private function isReusable(Request $request)
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
    private function isNewTeamData()
    {

        $query = DB::table('team_data')->where('team_id', '=', $this->teamId)->get();

        if (!$query) {
            return true;
        }

    }

    /**
     * Insert profile picture into team_data table
     *
     * @return bool
     */
    private function insertIntoTeamData()
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
    private function updateTeamData($pictureId)
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
    private function redirectWithErrors()
    {

        return redirect()->back()->withErrors($this->uploadHandler->getError());
    }

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

    public function getProfilePicturesPath()
    {

        return self::PATH;
    }

}