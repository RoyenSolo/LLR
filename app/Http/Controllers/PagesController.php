<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')
          ->take(4)
          ->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout() {
        $first = 'Matjaž';
        $last = 'Rihtaršič';
        $email = 'matjazrihtarsic@gmail.com';

        $full = $first . " " . $last;

        $data = [];
        $data['full'] = $full;
        $data['email'] = $email;
        return view('pages.about')->with('data', $data);
                                //      ->with('full', $full)->with('email', $email);
                                //      ->withFull($full)->withEmail($email);
    }

    public function getContact() {
        return view('pages.contact');
    }
}
