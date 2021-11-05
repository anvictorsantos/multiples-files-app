<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    public function formSubmit(Request $request)
    {   
        for ($i=0; $i < count($request->file) ; $i++) { 
            $fileName = $request->file[$i]->getClientOriginalName();
            $request->file[$i]->move( public_path('upload'), $fileName );
        }

        return response()->json(
            [
                'success' => 'You have successfully upload file.'
            ], 200
        );
    }
}
