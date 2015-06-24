<?php
namespace App\Library\Image\Moments;

use Exception;
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

        if(!$this->getAllTeamPicturesIds())
        {
            return false;
        }

        $teamPicturesIds = $this->getAllTeamPicturesIds();

        $pictures = [];

        foreach ($teamPicturesIds as $teamPicturesId) {
           $query = DB::table(self::PICTURE_TABLE)
               ->where('id', '=', $teamPicturesId->picture_id)
               ->where ('level' ,'=', 'moments')
               ->first();

            if (!$query) {
                $this->errorHandler->setError("Picture(s) can't be received");
                return false;
            }

            $pictures[] = $query;
        }

        return $pictures;
    }

    /**
     * Get all pictures id's that team / user had uploaded
     *
     * @return array | bool
     */
    private function getAllTeamPicturesIds()
    {
        $query  = DB::table(self::TEAM_PICTURE_TABLE)->where('team_id', '=', $this->teamId)->get();

        if (!$query) {
            $this->errorHandler->setError("Team don't have pictures");
            return false;
        }

        return $query;
    }

    /**
     * Get random user uploaded picture
     */
    public function getRandomMomentPicture()
    {
        $query = DB::table(self::PICTURE_TABLE)
            ->where('level', '=', 'Moments')
            ->where('id', '=', $this->getRandomMomentPictureId())
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

    /**
     * Get random user picture id
     *
     * @return bool
     */
    private function getRandomMomentPictureId()
    {

        $query = DB::table(self::TEAM_PICTURE_TABLE)
            ->where('team_id', '=', $this->teamId)
            ->orderByRaw('RAND()')
            ->take(1)
            ->first();

        if (!$query) {
            return false;
        }

        return $query->picture_id;
    }
}