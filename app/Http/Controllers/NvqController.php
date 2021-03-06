<?php

namespace App\Http\Controllers;

use App\Nvq;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class NvqController extends Controller
{
    public function getNvqs(){

        $nvqs = Nvq::orderBy('id','asc')->paginate(30);
        return view('academic.nvqs',['nvqs' =>$nvqs]);
    }
    public function getNvqsCreate(){
        return view('academic.nvq');
    }

    public function postCreateNvq(Request $request){
        $this->validate($request,
        ['n_name'=>'required|max:255']
        );
        $nvq = new Nvq();
        $nvq->name = $request['n_name'];
        $message = 'There was an error';
        if($nvq->save()){
           $message = 'NVQ Level successfully created';
        }
        return redirect()->route('nvqs')->with(['message'=>$message]);
    }

    public function postEditNvq(Request $request){
        $this->validate($request,[
            'n_name'=>'required|max:255'
            ]);
            $nvq = Nvq::find($request['n_id']);
            $nvq->name = $request['n_name'];
            $nvq->update();
            return response()->json(['new_name' => $nvq->name], 200);
    }
    public function getDeletenvq($n_id){
        $nvq = Nvq::where('id',$n_id)->first();
        try {
            $nvq->delete();
            $message = "NVQ Level Successfully Deleted!";
        } catch (QueryException  $e) {       
            $message = "NVQ Level was not Deleted, Try Again!";
        } 
        return redirect()->route('nvqs')->with(['message'=>$message]);
    }
}
