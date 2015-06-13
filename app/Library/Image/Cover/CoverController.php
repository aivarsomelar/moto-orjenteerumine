<?php
namespace App\Library\Image\Cover;

use App\Http\Controllers\Controller;
use App\Library\Image\Image;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Control actions with cover pictures
 */
class CoverController extends Controller
{

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
    const TABLE = 'cover';

    private $error;

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

    public function uploadCoverPictureFile($uploadedFile)
    {

        $cover = new Image(self::PATH);

        if (!$cover->uploadImage($uploadedFile)) {
            $this->setError($cover->getError());
            return false;
        }

        return true;
    }

    /**
     * Get error message
     *
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set error message
     *
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}