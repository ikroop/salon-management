<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PagesController extends Controller
{
    public function index(){
        $title = 'This is the index page!';
        // pass title as an array
        return view('pages.index')->with('title', $title);
    }
}