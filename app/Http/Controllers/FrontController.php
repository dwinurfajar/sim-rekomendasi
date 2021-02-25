<?php

namespace App\Http\Controllers;
use App\tempat;
use App\Rating;
use App\User;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $tempat = DB::table('tempats')
                ->orderBy('rating', 'DESC')
                ->where('konfirmasi', '1')
                ->get();
             
        $kategori = Kategori::latest()->get();
        return view('/frontend/index', compact('tempat', 'kategori'));
    }
    public function detail(tempat $id){
    	$tempat = DB::table('tempats')->where('id', $id->id)->first();
        
        $ratings = DB::table('ratings')
                ->join('users', 'ratings.user_id', '=', 'users.id')
                ->where('ratings.place_id', $id->id)->get();

        $rating = DB::table('ratings')
                ->join('users', 'ratings.user_id', '=', 'users.id')
                ->where('ratings.place_id', $id->id)->avg('ratings.nilai');
    
        $rating = number_format((float)$rating, 1, '.', '');
        $rating = ceil($rating);
        
        $kategori = Kategori::latest()->get();

        $terkait = DB::table('tempats')
                ->where('kategori', '=', $tempat->kategori)
                ->where('id', '!=', $id->id)
                ->orderBy('rating', 'DESC')
                ->get();
        //dd($terkait);
    	return view('frontend/detail', compact('tempat', 'ratings', 'rating', 'kategori', 'terkait'));	
    }
    public function kategori($id){
        //dd($id);
        $tempat = DB::table('tempats')->where('kategori', $id)->get();
        $rating = 30;
        $kategori = Kategori::latest()->get();
        $ktg = DB::table('kategoris')
                ->select('kategori')
                ->where('id', $id)
                ->get();
        $ktg = $ktg[0]->kategori;
        //dd($ktg[0]->kategori);
        return view('/frontend/kategori', compact('tempat', 'rating', 'kategori', 'ktg'));
    }
    public function acs(){
        //get place_id with ratings
        $place = DB::table('ratings')
                ->select('place_id')
                ->get();
        $plc = array();
        for ($i=0; $i < sizeof($place); $i++) { 
            $plc[$i] = $place[$i]->place_id;
        }
        $plc = array_unique($plc);
        $plc = array_values($plc);
        
        //find similarity beetwen a to b
        $increment = 0;
        $sim_table[][] = array();
        for ($i=0; $i < sizeof($plc)-1; $i++) { 
            for ($j=$i+1; $j < sizeof($plc); $j++) { 
                //echo($plc[$i]." to ". $plc[$j]."<br>");
                //find user with rating a and b
                $cos = [1, 4];
                $usr1 =  DB::table('ratings')
                        ->select('user_id')
                        ->where('place_id', $plc[$i])
                        ->get();

                $usr2 =  DB::table('ratings')
                        ->select('user_id')
                        ->where('place_id', $plc[$j])
                        ->get();

                $x = array();
                for ($k=0; $k < sizeof($usr1); $k++) { 
                    $x[$k] = $usr1[$k]->user_id;
                    //echo("x:".$x[$k]);
                }
                $y = array();
                for ($l=0; $l < sizeof($usr2); $l++) { 
                    $y[$l] = $usr2[$l]->user_id;
                    //echo("y".$y[$l]);
                }
                $user = array_intersect($x, $y);
                $user = array_values($user);
                if (sizeof($user) > 0) {
                    //echo("size : ".sizeof($user)."<br>");
                    for ($m=0; $m < sizeof($user); $m++) { 
                        //echo("[".$user[$m]."]");
                    }
                }else{
                    //echo "no data found";
                }
                echo("<br>");

                if (sizeof($user) > 1) {
                    $data[][] = array();
                    for ($k=0; $k < sizeof($user); $k++) { 
                        $avg = DB::table('ratings')
                                ->select('user_id', DB::raw('avg(nilai)  as avg'))
                                ->groupBy('user_id')
                                ->where('user_id', $user[$k])
                                ->get();
                        $val1 =  DB::table('ratings')
                                ->select('nilai')
                                ->where('place_id', $plc[$i])
                                ->where('user_id', $avg[0]->user_id)
                                ->get();
                        $val2 =  DB::table('ratings')
                                ->select('nilai')
                                ->where('place_id', $plc[$j])
                                ->where('user_id', $avg[0]->user_id)
                                ->get();
                        //index data: 0 user_id, 1 average, 2 rating a, 3 rating b
                        $data[$k][0] = $avg[0]->user_id;
                        $data[$k][1] = $avg[0]->avg;
                        $data[$k][2] = $val1[0]->nilai;
                        $data[$k][3] = $val2[0]->nilai;
                        //echo($avg[0]->avg);
                    }
                    //echo("uku: ".sizeof($data)."<br>");
                    for ($k=0; $k < sizeof($user); $k++) { 
                        $top[$k] = ($data[$k][2]-$data[$k][1])*($data[$k][3]-$data[$k][1]);
                        echo("ru,i ".$data[$k][2]." ru ".$data[$k][1]." ru,j ".$data[$k][3]." ru ".$data[$k][1]." hasil ".$top[$k]."<br>");

                        $bot1[$k] = pow($data[$k][2]-$data[$k][1], 2);
                        echo("<br>"."bot 1 ".$bot1[$k])."<br>";
                        $bot2[$k] = pow($data[$k][3]-$data[$k][1], 2);
                        echo("<br>"."bot 2 ".$bot2[$k])."<br>";
                    }
                    $pembilang = 0;
                    $penyebut1 = 0;
                    $penyebut2 = 0;

                    for ($k=0; $k < sizeof($user); $k++) { 
                        $pembilang += $top[$k];
                        $penyebut1 += $bot1[$k];
                        $penyebut2 += $bot2[$k];
                        
                    }
                    echo($pembilang."<br>");
                    echo(sqrt($penyebut1)."x".sqrt($penyebut2)."<br>");

                    $hasil = $pembilang/(sqrt($penyebut1)*sqrt($penyebut2));    
                    $sim_table[$increment][0] = $plc[$i];
                    $sim_table[$increment][1] = $plc[$j];
                    $sim_table[$increment][2] = $hasil;
                    $increment++;
                }   
            }
        }
        //dd($top, $bot1, $bot2);
        dd($sim_table);
    }
}