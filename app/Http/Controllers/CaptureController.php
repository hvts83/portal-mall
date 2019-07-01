<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Client;

class CaptureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    
    public function index() {
        $configuration = app('db')->select("SELECT name,
        (SELECT url FROM images WHERE id = logo_id) AS logo,
        (SELECT url FROM images WHERE id = landing_background_id) AS landingBg,
        (SELECT url FROM images WHERE id = publicity_id) AS publicity
        FROM config");
        $data['config'] = $configuration[0];
        return view('capture.index', $data);
    }

    public function store(Request $request){

        $request->validate([
            'email' => 'email|required',
            'birthday' => 'required|before:today',
            'sexo' => 'required'
        ]);

        $cliente = new Client;
        $cliente->email = $request->email;
        $cliente->birthday = $request->birthday;
        $cliente->sexo = $request->sexo;
        $cliente->promocion = $request->has('promocion') ? 1: 0;
        $cliente->save();

        return redirect('success');
    } 

    public function success(){
        $configuration = app('db')->select("SELECT name, success_text,
        (SELECT url FROM images WHERE id = logo_id) AS logo,
        (SELECT url FROM images WHERE id = publicity_id) AS publicity,
        (SELECT url FROM images WHERE id = success_background_id) AS successBg
        FROM config");
        $data['config'] = $configuration[0];
        return view('capture.success', $data);
    }
}
