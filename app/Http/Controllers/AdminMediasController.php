<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;

class AdminMediasController extends Controller
{
    //
	
	public function index(){
		
		$photos = Photo::all();
		
		return view('admin.media.index', compact('photos'));
	}
	
	
	public function create(){
		
		return view('admin.media.create');
	}
	
	
	public function store(Request $request){
		
		$file = $request->file('file');
		
		$name = time() . $file->getClientOriginalName();
		
		$file->move('images', $name);
		
		Photo::create(['file'=>$name]);
	}
	
	
	public function destroy($id){
		
		$photo = Photo::findOrFail($id);
		
		if(file_exists(public_path() . $photo->file)){

		unlink(public_path() . $photo->file);

		}
		
		$photo->delete();
		
		return redirect('/admin/media');
	}
	
	
	public function deleteMedia(Request $request){
		
		// for deleting single media
		
		if(isset($request->delete_single)){
			
			$this->destroy($request->photo);
			
			return redirect()->back();
		}
		
		
		// for deleting bulk media
		
		if(isset($request->delete_bulk) && !empty($request->checkBoxArray)){
		
			
			$photos = Photo::findOrFail($request->checkBoxArray);

			foreach($photos as $photo){

			if(file_exists(public_path() . $photo->file)){
				
			unlink(public_path() . $photo->file);
				
			}
			
			$photo->delete();
				
			}

			return redirect()->back();
			
		}
		
		
		return redirect()->back();	
	}
	
	
}
