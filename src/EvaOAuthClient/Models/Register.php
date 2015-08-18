<?php

namespace Eva\EvaOAuthClient\Models;

use Eva\EvaUser\Models\Register as UserRegister;
use Eva\EvaOAuthClient\Entities\AccessTokens;
use Eva\EvaEngine\Exception;
use Eva\EvaEngine\Mvc\Model as BaseModel;

class Register extends UserRegister
{
    public function register($accessToken = null)
    {

        $accessToken = $accessToken ? : OAuthManager::getAccessToken();

        if (!$accessToken) {
            throw new Exception\ResourceConflictException('ERR_OAUTH_NO_ACCESS_TOKEN');
        }

//        $register = new UserRegister();
//        $register->username = $this->username;
//        $register->email = $this->email;
        $disablePassword = true;
        if ($this->password) {
            $disablePassword = false;
//            $register->password = $this->password;
        }

        $this->status = 'active';
        $this->accountType = 'basic';
        $this->emailStatus = 'inactive';
        $this->providerType = $this->getProviderType('web', 'oauth', $accessToken['adapterKey']);
        $this->avatar = isset($accessToken['remoteImageUrl']) ? $accessToken['remoteImageUrl'] : '';         //添加头像

//        $user = $register->register($disablePassword);

        $user = parent::register($disablePassword);

        $accessTokenEntity = new AccessTokens();
        $accessTokenEntity->assign($accessToken);
        $accessTokenEntity->tokenStatus = 'active';
        $accessTokenEntity->userId = $user->id;
        if (!$accessTokenEntity->save()) {
            throw new Exception\RuntimeException('ERR_OAUTH_TOKEN_CREATE_FAILED');
        }

        return $user;
    }
}
