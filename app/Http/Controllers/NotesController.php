<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Note,UserProfile,User};
use Illuminate\Support\Str;
use Image;
use DB;
use Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $notes = Note::where('user_id',$user_id)->get();
        return view('notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'note'  => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $path ='';
        if($request->has('image')) {
            $image_path = '/uploads/images/'. Str::random(8) .'.'.$request->image->extension();
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $img = \Image::make($file);
            $img->save(public_path($image_path));
        }
        DB::beginTransaction();  

        $user_id = Auth::user()->id;
        $profile_id = UserProfile::where('user_id',$user_id)->first()->id;
        
        $note            =  new Note;
        $note->user_id   =  $user_id;
        $note->userprofile_id = $profile_id;
        $note->note_text =  $request->note;
        $note->image     =  ($request->has('image'))?$image_path:null;
        $note->save();


        DB::commit();
        return redirect()->route('notes.index')->withStatus(__('Note successfully added.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note   = Note::find($id);
        return view('notes.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'note' => 'required',
            'image'=> 'mimes:jpeg,jpg,png',
        ]);

        $path ='';
        if($request->has('image')) {
            $image_path = '/uploads/images/'. Str::random(8) .'.'.$request->image->extension();
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $img = \Image::make($file);
            $img->save(public_path($image_path));
        }

        DB::beginTransaction();  
        
        $note              =  Note::find($id);
        $note->note_text   =  $request->note;
        $note->image = $image_path ?? $employe->image;
        $note->save();

        DB::commit();
        
        return redirect()->route('notes.index')->withStatus(__('Note successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note  = Note::find($id);

        if($note){
            $note->delete();
            return redirect('notes')->with('status','Note Deleted Successfully.');
        }
        else{
          return Redirect::back()->with('error', 'You cannot delete!');
        }
    }
}
