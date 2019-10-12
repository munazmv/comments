<?php

namespace Modules\Comment\Models;

use Carbon\Carbon;
use Modules\Core\Base\BaseModel;

/**
 * Class Comment
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $content
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package \Modules\Api\Comment\Models
 */
class Comment extends BaseModel
{

}
