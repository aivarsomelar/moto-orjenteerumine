<?php
namespace App\Library\Cover;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;


/**
 * Control actions with cover pictures
 */
class CoverController extends Controller
{

    /**
     * All covers pictures from database
     */
    private $allCovers;

    private $count;

    /**
     * Folder path to covers pictures
     *
     * @var string
     */
    const PATH = '/pic/covers/';

    /**
     * Table name
     *
     * @var string
     */
    const TABLE = 'covers';

    /**
     * Get random cover picture data
     */
    public function getRandomCoverPicData()
    {
        $query = DB::table(self::TABLE)->orderByRaw('RAND()')->take(1)->get();

        if (!$query) {
            throw new Exception("There was problem wit getting random cover picture");
        }

        return $query;
    }

    /**
     * Return cover picture name with path
     *
     * @return string
     * @throws Exception
     */
    public function getRandomCoverPicWithPath()
    {
        foreach ($this->getRandomCoverPicData() as $cover) {
            $result = self::PATH.$cover->file_name;
        }

        return $result;
    }
}