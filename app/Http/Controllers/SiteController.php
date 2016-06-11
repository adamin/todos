<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request as FRequest;
use Illuminate\Support\Facades\Redirect;

/**
 * Main site controller. 
 * Provides actions of logging into the site and managing user account settings.
 */
class SiteController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'login']]);
    }

    /**
     * Entry action to the site.
     * Determines if the user is logged in or not and redirects 
     * either to the login page or the dashboard depending on the result.
     */
    public function index() {
        if (Auth::check()) {  // Check is user logged in
            // redirect to dashboard
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('login');
        }
    }

    /**
     * Login action.
     */
    public function login() {
        if (Auth::check()) {  // Check is user logged in
            // redirect to dashboard
            return Redirect::to('dashboard');
        }

        if (FRequest::isMethod('post')) {

            $rules = array(
                'email' => 'required|email',
                'password' => 'required|alphaNum|min:3'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('login')
                                ->withErrors($validator) // send back all errors to the login form
                                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {
                // create our user data for the authentication
                $userdata = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                );

                // attempt to do the login
                if (Auth::attempt($userdata)) {
                    return Redirect::to('dashboard');
                } else {
                    // validation not successful, send back to form 
                    return Redirect::to('login');
                }
            }
        } else {
            $user = Auth::user();
            return view('site.login', compact('user'));
        }
    }

    /**
     * Logout action.
     */
    public function logout() {
        Auth::logout();

        return Redirect::to('/');
    }

    /**
     * Presents the user with a dashboard if logged in, 
     * redirects to the login page otherwise.
     */
    public function dashboard() {
        if (!Auth::check()) {  // Check is user logged in
            // redirect to dashboard
            return Redirect::to('login');
        }

        $user = Auth::user();
        return view('site.dashboard', compact('user'));
    }

    /**
     * Presents profile page to the user.
     */
    public function profile() {
        $user = Auth::user();
        return view('site.profile', compact('user'));
    }

    /**
     * Presents site settings page to the user.
     */
    public function settings() {
        $user = Auth::user();
        return view('site.settings', compact('user'));
    }

}