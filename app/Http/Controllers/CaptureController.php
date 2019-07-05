<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Client;
use App\Banner;

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
        (SELECT url FROM images WHERE id = landing_background_id) AS landingBg
        FROM config");
        $data['config'] = $configuration[0];
        $data['banners'] = Banner::select('banners.id', 'url', 'banners.created_at')
            ->join('images', 'images.id', 'banners.imagen_id')
            ->get();
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

        $mac = '<enter MAC address of guest device to auth>';
        $controlleruser     = ''; // the user name for access to the UniFi Controller
        $controllerpassword = ''; // the password for access to the UniFi Controller
        $controllerurl      = ''; // full url to the UniFi Controller, eg. 'https://22.22.11.11:8443'
        $duration = 2000;
        $site_id = '<enter your site id here>';
        
        $unifi_connection = new \UniFi_API\Client($controlleruser, $controllerpassword, $controllerurl, $site_id);
        $login= $unifi_connection->login();

        $auth_result = $unifi_connection->authorize_guest($mac, $duration);

        return redirect('success');
    } 

    public function success(){
        $configuration = app('db')->select("SELECT name, success_text,
        (SELECT url FROM images WHERE id = logo_id) AS logo,
        (SELECT url FROM images WHERE id = success_background_id) AS successBg
        FROM config");
        $data['config'] = $configuration[0];
        $data['banners'] = Banner::select('banners.id', 'url', 'banners.created_at')
            ->join('images', 'images.id', 'banners.imagen_id')
            ->get();
        return view('capture.success', $data);
    }
}
