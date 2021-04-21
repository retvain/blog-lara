<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;
use Illuminate\Http\Request;


/**
 * Class BaseController for all manage controllers in blog admin panel
 *
 * Must be parent for all manage controllers
 * @package App\Http\Controllers\Blog\Admin
 */
abstract class BaseController extends GuestBaseController
{

    public function __construct()
    {
        //initializing common things
    }
}
