<?php
namespace App\Library\Image\Moments;

use Illuminate\Support\Facades\DB;

/**
 * Get user uploaded pictures
 */
class GetPictures extends MomentController
{

    public function getAllTeamPictures()
    {

        $teamPicturesIds = $this->getAllTeamPicturesIds();

        $pictures = [];

        foreach ($teamPicturesIds as $teamPicturesId) {
           $query = DB::table('pictures')
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
        $query  = DB::table('team_pictures')->where('team_id', '=', $this->teamId)->get();

        if (!$query) {
            $this->errorHandler->setError("Team don't have pictures");
            return false;
        }

        return $query;
    }
}