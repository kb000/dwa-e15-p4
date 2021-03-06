<?php

namespace Kb0\Vectography\Http\Controllers;

use Kb0\Vectography\Graphic;
use Session;
use Request;
use Response;
use Cookie;

class OwnershipController extends Controller
{
    const AuthCookieName = 'al';
    const AuthRequstParameterName = 'k';

    /**
     *  Stores an authorization key for the specified graphic by id to the user's ownership authorization list.
     *  @param $graphic Specified graphic id.
     *  @return void
     */
    public function storeById($graphic_id) {
        $graphic = Graphic::id($graphic_id)->first();
        return $this->store($graphic);
    }

    /**
     *  Stores an authorization key for the specified graphic to the user's ownership authorization list.
     *  @param $graphic Specified graphic.
     *  @return void
     */
    public function store(Graphic $graphic) {
        $incomingCookie = null;
        Cookie::setDefaultPathAndDomain('/', parse_url(Request::url(), PHP_URL_HOST));
        if (array_key_exists(OwnershipController::AuthCookieName, $_COOKIE)) {
            $incomingCookie = $_COOKIE[OwnershipController::AuthCookieName];
        }
        if ($incomingCookie) {
            $authList = json_decode($incomingCookie);
        } else {
            $authList = array();
        }

        if(!in_array($graphic->authKey, $authList)) {
            $authList[] = $graphic->authKey;
        }

        if(!empty($authList)) {
            $outgoingCookie = json_encode($authList);
            // $cookie = Cookie::forever(OwnershipController::AuthCookieName, $outgoingCookie);
            // Cookie::queue($cookie);            
            setcookie(OwnershipController::AuthCookieName, $outgoingCookie, 0, '/');
            Session::flash('messages',["Took ownership of Graphic [".$graphic->id."]."]);
            return back();
        } else {
            return back()->withErrors(["Failed to take ownership."]);
        }
    }
    
    /**
     *  Determines whether the specified graphic's key is contained in the user's ownership authorization list. (NOT admin priveleges).
     *  @param $request Incoming http request.
     *  @param $graphic Specified graphic.
     *  @return bool True if the graphic is owned. False otherwise.
     */
     public function isOwned($graphic) {
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
        $incomingCookie = null;
        $incomingCookie = Request::cookie(OwnershipController::AuthCookieName);
        if (array_key_exists(OwnershipController::AuthCookieName, $_COOKIE)) {
            $incomingCookie = $_COOKIE[OwnershipController::AuthCookieName];
        }
        if($incomingCookie) {
            $authList = json_decode($incomingCookie);
            return in_array($graphic->authKey, $authList);
        }

        # No check succeeded. Default is false.
        return false;
     }
}
