<?php
namespace App\Library\Image\Moments;

use Illuminate\Support\Facades\DB;

/**
 * Get user uploaded pictures
 */
class GetPictures extends MomentController
{

    /**
     * Table where all pictures are stored
     */
    const PICTURE_TABLE = 'pictures';

    /**
     * Table where pictures are connected with teams
     */
    const TEAM_PICTURE_TABLE = 'team_pictures';

    /**
     * Get all team pictures
     *
     * @return array|bool
     */
    public function getAllTeamPictures()
    {

       $query = DB::table(self::PICTURE_TABLE)
           ->where('uploader_team_id', '=', $this->teamId)
           ->where ('level' ,'=', 'moments')
           ->get();

        if (!$query) {
            return false;
        }
        return $query;
    }

    /**
     * Get random user uploaded picture
     *
     * @return array | bool
     */
    public function getRandomMomentPicture()
    {
        $query = DB::table(self::PICTURE_TABLE)
            ->where('level', '=', 'Moments')
            ->where('uploader_team_id', '=', $this->teamId)
            ->orderByRaw('RAND()')->take(1)->get();

        if (!$query) {
            return false;
        }

        return $query;
    }

    public function getRandomMomentPictureWithPath()
    {

        if ($this->getRandomMomentPicture()) {

            foreach ($this->getRandomMomentPicture() as $moment) {
                $result = $this->getMomentsPicturesPath() . $moment->file_name;
            }

            return $result;
        }

        return false;
    }
}