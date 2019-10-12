<?php

namespace Modules\Web\Auth\Requests;

use Modules\Core\Base\BaseRequest;

/**
 * Class AttemptLoginRequest
 *
 * @property string $email
 * @property string $password
 *
 * @package \Modules\Web\Auth\Requests
 */
class AttemptLoginRequest extends BaseRequest
{
    /**
     * Validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }
}
