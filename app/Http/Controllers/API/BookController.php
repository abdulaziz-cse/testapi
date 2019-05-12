<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Book;
use  Validator ;

class BookController extends BaseController
{


public function index()
{
    # code...
    $books = Book::all();
    return $this->sendResponse($books->toArray(), 'Post read succesfully');
}


public function store(Request $request)
{
    # code...
    $input = $request->all();
    $validator =    Validator::make($input, [
    'patrs'=> 'required',
    'time'=> 'required',
    'name'=> 'required',
    'number'=> 'required',
    ] );
    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    $book = Book::create($input);
    return $this->sendResponse($book->toArray(), 'Posts  created succesfully');

}




}
