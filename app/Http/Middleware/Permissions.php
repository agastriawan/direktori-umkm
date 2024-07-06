<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Helpers;
use Config;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function __construct()
    {
        $this->urlApi = Config::get('app.url_api');
        $this->helper = new Helpers();
    }

    public function handle(Request $request, Closure $next)
    {
        $customSessionLifetime = 15;

        if (!empty(Session::get('ApiToken'))) {
            $lastInteractionTimestamp = Session::get('last_interaction');
            $lastInteraction = is_int($lastInteractionTimestamp)
                ? now()->setTimestamp($lastInteractionTimestamp)
                : $lastInteractionTimestamp;
            Session::put('last_interaction', now()->timestamp);
            if (now()->diffInMinutes($lastInteraction) > $customSessionLifetime) {
                $this->helper->api('PUT', $this->urlApi . '/api/Usermanagement/' . Session::get('UserId'), 'json', $this->helper->token(), json_encode([
                    'islogin' => "No"
                ]));
                Session::flush();
                Session::flash('message', 'Sesi Habis, Silahkan Login Terlebih Dahulu');
                Session::flash('message-class', 'alert-danger');
                $response = redirect()->to(url('/'));
                $response->headers->add(['Cache-Control' => 'no-cache, no-store, must-revalidate', 'Pragma' => 'no-cache', 'Expires' => '0']);
                return $response;
            }

            $this->helper->public_generate(Session::get("SiteId"));
            return $next($request);
        } else {
            $request->session()->flash('message', 'Sesi Habis, Silahkan Login Terlebih Dahulu');
            $request->session()->flash('message-class', 'alert-danger');
            $response = redirect()->to(url('/'));
            $response->headers->add(['Cache-Control' => 'no-cache, no-store, must-revalidate', 'Pragma' => 'no-cache', 'Expires' => '0']);
            return $response;
        }
    }
}
