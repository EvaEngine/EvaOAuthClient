<?php

namespace Eva\EvaOAuthClient\Entities;

/**
 * @package
 * @category
 * @subpackage
 *
 * @SWG\Model(id="AccessToken")
 */
class AccessTokens extends \Eva\EvaEngine\Mvc\Model
{
    /**
     * @SWG\Property(
     *   name="adapterKey",
     *   type="string",
     *   description="OAuth provider key (weibo | tencent)"
     * )
     *
     * @var string
     */
    public $adapterKey;

    /**
     * @SWG\Property(
     *   name="token",
     *   type="string",
     *   description="OAuth access token"
     * )
     * @var string
     */
    public $token;

    /**
     * @SWG\Property(
     *   name="version",
     *   type="string",
     *   description="OAuth version (OAuth1 | OAuth2)"
     * )
     * @var string
     */
    public $version;

    /**
     *
     * @var string
     */
    public $tokenStatus = 'active';

    /**
     * @SWG\Property(
     *   name="scope",
     *   type="string",
     *   description="OAuth scope"
     * )
     * @var string
     */
    public $scope;

    /**
     * @SWG\Property(
     *   name="refreshToken",
     *   type="string",
     *   description="OAuth refresh token"
     * )
     * @var string
     */
    public $refreshToken;

    /**
     *
     * @var integer
     */
    public $refreshedAt;

    /**
     * @SWG\Property(
     *   name="expireTime",
     *   type="string",
     *   description="OAuth token expire time, format as 2014-12-02 07:52:38"
     * )
     * @var string
     */
    public $expireTime;

    /**
     *
     * @var string
     */
    public $remoteToken;

    /**
     * @SWG\Property(
     *   name="remoteUserId",
     *   type="string",
     *   description="OAuth user unique id, use OpenID for tencent"
     * )
     * @var string
     */
    public $remoteUserId;

    /**
     * @SWG\Property(
     *   name="remoteUserName",
     *   type="string",
     *   description="OAuth user name"
     * )
     * @var string
     */
    public $remoteUserName;

    /**
     * @SWG\Property(
     *   name="remoteNickName",
     *   type="string",
     *   description="OAuth user nick name"
     * )
     * @var string
     */
    public $remoteNickName;

    /**
     * @SWG\Property(
     *   name="remoteEmail",
     *   type="string",
     *   description="OAuth user email"
     * )
     * @var string
     */
    public $remoteEmail;

    /**
     * @SWG\Property(
     *   name="remoteImageUrl",
     *   type="string",
     *   description="OAuth user avatar url"
     * )
     * @var string
     */
    public $remoteImageUrl;


    /**
     * @SWG\Property(
     *   name="remoteImageExtra",
     *   type="string",
     *   description="OAuth user info json string"
     * )
     * @var string
     */
    public $remoteExtra;

    /**
     *
     * @var integer
     */
    public $userId;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'adapterKey' => 'adapterKey',
            'token' => 'token',
            'version' => 'version',
            'tokenStatus' => 'tokenStatus',
            'scope' => 'scope',
            'refreshToken' => 'refreshToken',
            'refreshedAt' => 'refreshedAt',
            'expireTime' => 'expireTime',
            'remoteToken' => 'remoteToken',
            'remoteUserId' => 'remoteUserId',
            'remoteUserName' => 'remoteUserName',
            'remoteNickName' => 'remoteNickName',
            'remoteEmail' => 'remoteEmail',
            'remoteImageUrl' => 'remoteImageUrl',
            'remoteExtra' => 'remoteExtra',
            'userId' => 'userId'
        );
    }

    protected $tableName = 'oauth_accesstokens';
}
