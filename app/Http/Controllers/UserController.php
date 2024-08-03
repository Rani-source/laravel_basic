<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function showUsers()  
    {
        $users = DB::table('users')
       // ->select("name","email as userEmail")
    //    ->select('city')
    //    ->distinct()
    
        //  ->where('age','<>','20')
        //  ->orwhere('city','delhi')
        //->whereBetween('age',[18,20])
       // ->whereNotBetween('age',[17,19])
      // ->whereIn('id',['3','7','9'])
     //  ->whereNotIn('city',['mumbai','delhi'])
     //->whereNull('email')
    // ->whereNotNull('email')
    // ->whereDate('created_at','2024-05-29')
    // ->orwhereMonth('created_at','4')
   // ->whereDay('created_at','16')
   // ->whereYear('created_at','2024')
   // ->whereTime('created_at','02:31:10')
        //  ->where([
        //     ['age','<>','20'],
        //  ['city','delhi']])
//@@@@ order by
        //->orderBy('name')
       // ->orderBy('age','desc')

      //->take(2) //== ->limit(3)
     // ->skip(4) //== ->offset(5)
     // ->get();
     //@@@  for pagination
     ->orderBy('name')
    // ->simplePaginate(3);
   //  ->Paginate(3) mostly used
   // 2nd param to select the column , 3rd to chnage se default query string page name , 4th (not work)  start page no.
  // ->Paginate(3,['*'],'pa');

  //to add data in query string
 // ->appends(['sort'=>'name','test'=>123]);

 //add # value in query string or page url
 ///->fragment('test');

 // cursorPaginate is with lagrde data and order by caluse
 ->orderBy('id')
 ->cursorPaginate(2);
  return view('allusers',["data"=> $users]);

        //### get first, latest, old inRandomOrder  array
        //->latest()
        // ->oldest()
       // ->inRandomOrder() // use to get any random row from multiple
        // 3 function always used with first
 // ->first() ;

    //### laravel function pluck return an single column array or key value pair array,if we use pluck the no need to use get method
//->pluck('name','email');a
//->count();
//->max('age');
//->min('age');
//->avg('age');
// ->sum('age');
//      return $users;

       // dd($users);// dd k bad ka code nhi chalega dd means debug /**
       //  dump($users); // dump k bad ka code bhi chalta rahega
    //    foreach ($users as $key => $value) {
    //     echo  $value->name."  <br>  ";
    //    }
 
    }
    public function singleUser(string $id){
        $user = DB::table('users')->where('id',$id)->get();
        return view('user',['data'=>$user]);
    }
    public function addUser(Request $req)
    {
        $user = DB::table('users')
        // ->insertOrIgnore([
        //     "name"=>"Nita",
        //     "email"=>"nita@gmail.com",
        //     "age"=>"19",
        //     "city"=>"Pune",
        //     "created_at"=>now(),
        //     "updated_at"=>now()
        // ]);

        // upsert is used to update row by unique column other wise insert new record
    //     ->upsert([
    //         "name"=>"Audiphi",
    //         "email"=>"Audiphi@gmail.com",
    //         "age"=>"21",
    //         "city"=>"Indore",
    //         "created_at"=>now(),
    //         "updated_at"=>now()
    //     ],
    //     ['email'],// name of unique column
    //     ['city'] /// 3rd parameter is for update only that column which is used in 3rd params
    // );
        ->insertGetId([
            "name"=>$req->username,
            "email"=>$req->useremail,
            "age"=>$req->userage,
            "city"=>$req->usercity,
            "created_at"=>now(),
            "updated_at"=>now()
        ]

     );
        
   
        if($user){
            
            return redirect()->route('userHome');
           // echo "<h3> User Added Successfully and inserted id is ".$user."</h3>";
           // echo "<h3> User Added Successfully a</h3>";
        }
        else{
            echo "<h3> User not added </h3>";
        }
    }
    public function updatePage(string $id)
    {
        $user = DB::table('users')->find($id);
        return view('updateuser',['data'=>$user]);
    }
    public function updateUser(Request $req,$id)
    {
            $user = DB::table('users')
           ->where("id",$id)
            ->update([
                "name"=>$req->username,
                "email"=>$req->useremail,
                "age"=>$req->userage,
                "city"=>$req->usercity
            ]);


            // if first array column match then updatee second array column value in that row 
            // ->updateOrInsert(
            //     [
            //       "name"=>"xyz",
            //       "email"=>"xyz@gmail.com"
            //     ],
            //     [
            //      "city"=>"RajKot",
            //       "age"=>"21"
            //     ]

            // );

            // To increase any integer value by default 1 or  by any given number
          //  ->where("id","16")
            //->increment("age");
          //  ->increment("age","5",["city" => "mumbai"]);
              // To increase any integer value by default 1 or  by any given number
              // ->decrement("age");
              // ->decrement("age","3",["city" => "goa"]);



//to increase or decrease multiple column together
             //    ->incrementEach([
            //     "age" => 3,
            //     "votes"=> 4
            //    ]);
            //    ->decrementEach([
            //     "age" => 3,
            //     "votes"=> 1
            //    ]);
            if($user){
                return redirect()->route('userHome');
                //echo "<h3> User updated Successfully </h3>";
               // echo "<h3> User Added Successfully a</h3>";
            }
            else{
                echo "<h3> User not updated </h3>";
            }
    }
    
    public function deleteUser(string $id)
    {
        $user = DB::table('users')
        ->where("id" ,$id)
        ->delete();
        if($user)
        {
            return redirect()->route('userHome');
        }
        else {
            echo "<h3> User not deleted </h3>";
        }
    }
    
}
