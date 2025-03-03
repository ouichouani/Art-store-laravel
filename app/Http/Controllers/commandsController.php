<?php

namespace App\Http\Controllers;
use App\Models\Commands ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB ;

class commandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = DB::select('SELECT C.*, U.*, P.* , P.img as product_img , U.img as user_img FROM commands C INNER JOIN users U ON U.user_id = C.vendor_id INNER JOIN products P ON P.product_id = C.product_id WHERE C.oner_id = ?', [Auth::user()->user_id]) ;
        return view('commands.commands_page', compact('commands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $command = DB::select('select count(command_id) as count from commands where oner_id = ? and product_id = ? and vendor_id = ?' , [$request->oner , $request->product ,  Auth::user()->user_id]);
        if(!$command[0]->count){
            Commands::create([
                "oner_id" => $request->oner ,
                "product_id" => $request->product ,
                "vendor_id" => Auth::user()->user_id ,
                "confirmed" =>  0 ,
            ]);
    
            return redirect()->back()->with( 'success' , 'the command is send successfuly' ) ;
        }else{
            return redirect()->back()->with( 'error' , 'the command is olrady sended' ) ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function validation(string $id)
    {
        dd('hello') ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
