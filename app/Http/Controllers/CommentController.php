<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function changestatus($table,$id,$newstatus)
    {
        $modelcontent = Comment::findOrfail($id);
        $modelcontent->status = $newstatus;
        if($modelcontent->save()){return true;}else{return false;}
    }
}
