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
    const TABLE = 'pictures';

    private $error;

    /**
     * Get random cover picture data
     */
    public function getRandomCoverPicData()
    {
        $query = DB::table(self::TABLE)->where('level', '=', 'cover')->orderByRaw('RAND()')->take(1)->get();

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

    public function uploadCoverPicture()
    {
        $upload = new Image('cover', '/pic/covers/', 'cover');
        if(!$upload->uploadPicture(0, true)) {
            return redirect()->back()->withErrors($upload->getError());
        }

        return redirect()->back()->with('message', 'Cover picture successfully uploaded');
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