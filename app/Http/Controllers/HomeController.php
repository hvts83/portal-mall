<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Config;
use App\Image;
use DB;
use Validator;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        
      $configuration = app('db')->select("SELECT name,(SELECT url FROM images WHERE id = logo_id) AS logo FROM config");
      $data['config'] = $configuration[0];
      
      $query = Client::selectRaw('*');
      if($request->inicio != '' and $request->fin != '' ){
        $query->whereBetween('created_at', [ $request->inicio, $request->fin]);
      }elseif($request->fecha != ''){
        $query->whereRaw('? = created_at', $request->fecha);
      }
      $data['clients'] = $query->get();
        
      return view('home')->with($data);
    }


    public function config(){
        $configuration = app('db')->select("SELECT name, success_text,
        (SELECT url FROM images WHERE id = logo_id) AS logo,
        (SELECT url FROM images WHERE id = landing_background_id) AS landingBg,
        (SELECT url FROM images WHERE id = success_background_id) AS successBg
        FROM config");
        $data['config'] = $configuration[0];
        return view('config', $data);
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required',
            'success_text' => 'required',
        ]);

        DB::beginTransaction();
          try {

            $config = Config::find(1);
            $config->name= $request->name;
            $config->success_text = $request->success_text;
            
            $url = 'images';

            if($request->hasFile('logo')){
              $imageName = 'logo' . time() . '.' . $request->logo->getClientOriginalExtension();
              $request->logo->move( base_path() . '/public/' . $url , $imageName );
              $imagen = new Image();
              $imagen->url = $url . '/' . $imageName;
              $imagen->save();
          
              $config->logo_id = $imagen->id;
            }

            if($request->hasFile('landingBg')){
              $imageName = 'landingBg' . time() . '.' . $request->landingBg->getClientOriginalExtension();
              $request->landingBg->move( base_path() . '/public/' . $url , $imageName );
              $imagen2 = new Image();
              $imagen2->url = $url . '/' . $imageName;
              $imagen2->save();
          
              $config->landing_background_id = $imagen2->id;
            }

            if($request->hasFile('successBg')){
              $imageName = 'successBg' . time() . '.' . $request->successBg->getClientOriginalExtension();
              $request->successBg->move( base_path() . '/public/' . $url , $imageName );
              $imagen3 = new Image();
              $imagen3->url = $url . '/' . $imageName;
              $imagen3->save();
          
              $config->success_background_id = $imagen3->id;
            }

            $config->save();
    
          } catch (\Exception $e) {
            DB::rollback();
            throw $e;
          }
          DB::commit();
          return redirect('configuracion');
    }

}
