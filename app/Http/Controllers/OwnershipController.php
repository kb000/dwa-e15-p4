<?php

namespace Kb0\Vectography\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;

class OwnershipController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const AuthCookieName = 'a.l';
    const AuthRequstParameterName = 'k';

    /**
     *  Stores an authorization key for the specified graphic to the user's ownership authorization list.
     *  @param $graphic Specified graphic.
     *  @return void
     */
    public function store(Graphic $graphic) {
        $incomingCookie = Request::cookie(OwnershipController::AuthCookieName);
        if($incomingCookie) {
            $authList = json_decode($incomingCookie);
        } else {
            $authList = array();
        }

        if(!in_array($graphic.authKey, $authList)) {
            $authList[] = $graphic.authKey;
        }

        if(!empty($authList)) {
            $outgoingCookie = json_encode($authList);
            Response::cookie(OwnershipController::AuthCookieName, $outgoingCookie)->forever();
        }
    }

    
    /**
     *  Determines whether the specified graphic's key is contained in the user's ownership authorization list. (NOT admin priveleges).
     *  @param $request Incoming http request.
     *  @param $graphic Specified graphic.
     *  @return bool True if the graphic is owned. False otherwise.
     */
     public function isOwned() {
        # Check request parameter for auth cookie.
        if (Request::has(OwnershipController::AuthRequstParameterName)) {
            $requestKey = Request::input(OwnershipController::AuthRequstParameterName);
            if($requestKey == $graphic.authKey) {
                return true;
            } else {
                return false;
            }
        }

        # Check ownership auth list in cookie.
        $incomingCookie = Request::cookie(OwnershipController::AuthCookieName);
        if($incomingCookie) {
            $authList = json_decode($incomingCookie);
            return in_array($graphic.authKey, $authList);
        }

        # No check succeeded. Default is false.
        return false;
     }
}
