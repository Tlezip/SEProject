<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function dashStatus(Request $request)
    {
        $id = \DB::table('itemkeep')
            ->where('shopID','=',Auth::user()->shopid)

            ->get();

        $item = \DB::table('itemkeep')
            ->orderBy('created_at','desc')->take(5)->get();

        $sum1 = 0;
        $sum2 = 0;

        foreach ($id as $id) {
            $sum1 += ($id->Price) * ($id->Quantity);
            $sum2 += ($id->Cost) * ($id->Quantity);
        }

        $category = $this->calcat();
        $allcat = 0;
        foreach ($category as $category) {
            if( $category != 0)
                $allcat += 1;
        }

        $count = COUNT($id);
        $profit =  $sum1 - $sum2;
        $cost = $sum2;
        return view('dashboard', ['count' => $count,'allcat' => $allcat,'category' => $category,'profit' => $profit,'cost' => $cost,'item' => $item]);
    }

    public function calcat(){
        $Assessories  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Assessories')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Beverages  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Beverages')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Book  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Book')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Cosmetic = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Cosmetic')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $DairyProduct  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','DairyProduct')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Electronic  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Electronic')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Groceries  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Groceries')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Phamaceuticals  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Phamaceuticals')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Snack  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Snack')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();
        $Tobacco  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','Tobacco')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();

        $ToyGames  = \DB::table('itemkeep')
            ->select('shopID','Quantity','shopID')
            ->where('Category','=','ToyGames')
            ->where('shopID','=',Auth::user()->shopid)
            ->get();

        $n['Assessories'] = 0;
        $n['Beverages'] = 0;
        $n['Book'] = 0;
        $n['Cosmetic'] = 0;
        $n['DairyProduct'] = 0;
        $n['Electronic'] = 0;
        $n['Groceries'] = 0;
        $n['Phamaceuticals'] = 0;
        $n['Snack'] = 0;
        $n['Tobacco'] = 0;
        $n['ToyGames'] = 0;

        foreach ($Assessories as $Assessories){
            $n['Assessories'] += $Assessories->Quantity;
        }
        foreach ($Beverages as $Beverages){
            $n['Beverages'] += $Beverages->Quantity;
        }
        foreach ($Book as $Book){
            $n['Book'] += $Book->Quantity;
        }
        foreach ($Cosmetic as $Cosmetic){
            $n['Cosmetic'] += $Cosmetic->Quantity;
        }
        foreach ($DairyProduct as $DairyProduct){
            $n['DairyProduct'] += $DairyProduct->Quantity;
        }
        foreach ($Electronic as $Electronic){
            $n['Electronic'] += $Electronic->Quantity;
        }
        foreach ($Groceries as $Groceries){
            $n['Groceries'] += $Groceries->Quantity;
        }
        foreach ($Phamaceuticals as $Phamaceuticals){
            $n['Phamaceuticals'] += $Phamaceuticals->Quantity;
        }
        foreach ($Snack as $Snack){
            $n['Snack'] += $Snack->Quantity;
        }
        foreach ($Tobacco as $Tobacco){
            $n['Tobacco'] += $Tobacco->Quantity;
        }
        foreach ($ToyGames as $ToyGames){
            $n['ToyGames'] += $ToyGames->Quantity;
        }

        return $n;
    }
}
