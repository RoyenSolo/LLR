<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodingLogicController extends Controller
{
    public function test() {

      $howManyTags = rand(1, 4);

      $tagArray = ["a", "b", "c", "d"];

      $postTagArray = array_rand($tagArray, $howManyTags);



      //dd($postTagArray);

      //$postTagArray = 1;

      return view('pages.codingLogic')->with('postTagArray', $postTagArray);

    }
}
