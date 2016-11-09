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
            ->where('shopID','=',Auth::user()->shopid)
            ->orderBy('created_at','desc')->take(5)->get();

        $sum1 = 0;
        $sum2 = 0;
        $count = 0;
        foreach ($id as $id) {
            $sum1 += ($id->Price) * ($id->Quantity);
            $sum2 += ($id->Cost) * ($id->Quantity);
            $count += 1;
        }

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

        $cat = array(
            'Assessories'  => 0,
            'Beverages' => 0,
            'Book' => 0,
            'Cosmetic' => 0,
            'DairyProduct' => 0,
            'Electronic' => 0,
            'Groceries' => 0,
            'Phamaceuticals' => 0,
            'Snack' => 0,
            'Tobacco' => 0,
            'ToyGames' => 0,
        );

        foreach ($Assessories as $Assessories){
            $cat['Assessories'] += $Assessories->Quantity;
        }
        foreach ($Beverages as $Beverages){
            $cat['Beverages'] += $Beverages->Quantity;
        }
        foreach ($Book as $Book){
            $cat['Book'] += $Book->Quantity;
        }
        foreach ($Cosmetic as $Cosmetic){
            $cat['Cosmetic'] += $Cosmetic->Quantity;
        }
        foreach ($DairyProduct as $DairyProduct){
            $cat['DairyProduct'] += $DairyProduct->Quantity;
        }
        foreach ($Electronic as $Electronic){
            $cat['Electronic'] += $Electronic->Quantity;
        }
        foreach ($Groceries as $Groceries){
            $cat['Groceries'] += $Groceries->Quantity;
        }
        foreach ($Phamaceuticals as $Phamaceuticals){
            $cat['Phamaceuticals'] += $Phamaceuticals->Quantity;
        }
        foreach ($Snack as $Snack){
            $cat['Snack'] += $Snack->Quantity;
        }
        foreach ($Tobacco as $Tobacco){
            $cat['Tobacco'] += $Tobacco->Quantity;
        }
        foreach ($ToyGames as $ToyGames){
            $cat['ToyGames'] += $ToyGames->Quantity;
        }

        $allcat = 0;
        foreach ($cat as $category) {
            if( $category != 0)
                $allcat += 1;
        }

        $profit =  $sum1 - $sum2;
        $cost = $sum2;
        return view('dashboard', ['count' => $count,'allcat' => $allcat,'cat' => $cat,'profit' => $profit,'cost' => $cost,'item' => $item]);
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

        $n = array(
            'Assessories'  => 0,
            'Beverages' => 0,
            'Book' => 0,
            'Cosmetic' => 0,
            'DairyProduct' => 0,
            'Electronic' => 0,
            'Groceries' => 0,
            'Phamaceuticals' => 0,
            'Snack' => 0,
            'Tobacco' => 0,
            'ToyGames' => 0,
        );

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
