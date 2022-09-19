<?php

namespace App\Domain\Users\Users\DTO;

use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    /**
     * @var integer|null
     */
    public $id;
    /**
     * @var string|null
     */
    public $name;
    /**
     * @var string|null
     */
    public $email ;
    /**
     * @var string|null
     */
    public $phone_number ;
    /**
     * @var string|null
     */
    public $email_verified_at ;
    /**
     * @var string|null
     */
    public $password ;
    /**
     * @var string|null
     */
    public $profile_picture ;
    /**
     * @var string|null
     */
    public $remember_token;
    /**
     * @var string|null
     */
    public $reset_password_token;
    /**
     * @var string|null
     */
    public $password_reset_at;
    /**
     * @var string|null
     */
    public $verification_token;
    /**
     * @var integer|null
     */
    public $role_id;


    public static function fromRequest($request){
        return new self([
            'id'=> $request['id'] ?? null,
            'name'=> $request['name'] ?? null,
            'email'=> $request['email'] ?? null,
            'email_verified_at'=> $request['email_verified_at'] ?? null,
            'phone_number'=> $request['phone_number'] ?? null,
            'password'=> $request['password'] ?? null,
            'remember_token'=> $request['remember_token'] ?? null,
            'profile_picture'=> $request['profile_picture'] ?? null,
            'reset_password_token'=> $request['reset_password_token'] ?? null,
            'password_reset_at'=> $request['password_reset_at'] ?? null,
            'verification_token'=> $request['verification_token'] ?? null,
            'role_id'=> $request['role_id'] ?? null,
        ]);
    }

    public function withVerificationToken()
    {
        $this->verification_token = Str::random(4);
        return $this;
    }
}
