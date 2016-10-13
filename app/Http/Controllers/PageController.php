<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function index() 
	{
        return view('index', [
			'title' => 'Home'
		]);
    }
	
	public function about() 
	{
        return view('about', [
			'title' => 'About Us'
		]);
    }
	
	public function contact() 
	{
        return view('contact', [
			'title' => 'Contact Us'
		]);
    }
}
