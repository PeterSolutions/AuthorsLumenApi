<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return authors list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return $this->successResponse($authors);

    }

    /**
     * Store a new author.
     *
     * param  Request  $request
     * return Response
     */
    public function create(Request $request)
    {

        //validacion
        $this->validate($request, [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ]);

        //$this->validate($request, $rules);

        $author = Author::create($request->all());

        return response()->json($author, 201);

        // return Author::create([
        //     'name' => $request->name,
        //     'gender' => $request->gender,
        //     'country' => $request->country
        // ]);
    }

    /**
     * return an specific author 
     * 
     */
    public function show($author)
    {
        $author = Author::findOrFail($author);

        return $this->successResponse($author);

    }

    /**
     * update the information of an existing author 
     * 
     */
    public function update(Request $request, $author)
    {
        //validacion
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $author = Author::findOrFail($author);

        $author->fill($request->all());

        if ($author->isClean()) {
            return $this->errorResponse('Al least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);

    }

    /**
     * remove an existing author 
     * 
     */
    public function destroy($author)
    {
        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse($author);

    }

}
