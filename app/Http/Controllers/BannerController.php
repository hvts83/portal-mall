<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Image;
use App\Banner;

class BannerController extends Controller{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data['banners'] = Banner::select('banners.id', 'url', 'banners.created_at')
            ->join('images', 'images.id', 'banners.imagen_id')
            ->get();
        $configuration = app('db')->select("SELECT name,(SELECT url FROM images WHERE id = logo_id) AS logo FROM config");
        $data['config'] = $configuration[0];  

        return view("banner")->with($data);
    }

    public function send(Request $request){
        $url = 'images';
        DB::beginTransaction();
          try {
            if($request->hasFile('publicity')){
                $imageName = 'publicity' . time() . '.' . $request->publicity->getClientOriginalExtension();
                $request->publicity->move( base_path() . '/public/' . $url , $imageName );
               
                $imagen = new Image();
                $imagen->url = $url . '/' . $imageName;
                $imagen->save();

                $banner = new Banner();
                $banner->imagen_id =  $imagen->id;
                $banner->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect('banner');
    }
}
