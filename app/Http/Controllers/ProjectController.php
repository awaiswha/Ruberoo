<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Projects;
use App\ProjectImages;
use App\ProjectFiles;
use App\ProjectItems;
use App\ProjectVotes;
use Auth;
use Image;

class ProjectController extends Controller
{
    public function submit_project(Request $request)
    {
        
        $pro = new Projects();

        $pro->user_idFk         = Auth::User()->user_id;
        $pro->cat_idFk          = $request->cat_id;
        $pro->project_title     = $request->project_title;
        $pro->project_desc      = $request->project_desc;
        $pro->project_price     = $request->project_price;
        $pro->project_color     = $request->project_color;
        
        if(!$request->s_cat_id || $request->type){
            $pro->type              = $request->type;
        }else{
            $pro->type              = 'Other';
        }

        $pro->project_status    = '0';

        $pro->save();
        
        

        if($request->project_img_data){

            $data = base64_decode($request->project_img_data);

            $im = imagecreatefromstring($data); 

            $img = Image::make($im);
            $filename = $pro->project_id.'_'.str_random(40).'.png';
            
            $img->save('assets/upload/images/'.$filename);
           
            
            $pro_img = new ProjectImages();


            $pro_img->project_img   = $filename;
            $pro_img->project_idFk  = $pro->project_id;

            $pro_img->save();

            if($request->hasFile('project_img')){

                $filename = 'ruberoo_'.str_random(40);
                $request->file('project_img')->move('assets/upload/images/', $filename);

                $pro_img = new ProjectImages();


                $pro_img->project_img   = $filename;
                $pro_img->project_idFk  = $pro->project_id;

                $pro_img->save();

            }

        }
        
        if($request->s_cat_id){

            foreach ($request->s_cat_id as $key => $value) {
                
                $item = new ProjectItems();

                $item->user_idFk        = Auth::User()->user_id;
                $item->project_idFk     = $pro->project_id;
                $item->s_cat_idFk       = $value;

                $item->save();


            }


        }

        if($request->hasFile('project_file')){

            $pro_file = new ProjectFiles();

            $filename = $pro->project_id.'_'.str_random(40);
            
            $request->file('project_file')->move('assets/upload/audio/', $filename);

            $pro_file->project_file     = $filename;
            $pro_file->project_idFk     = $pro->project_id;

            $pro_file->save();



        }

        
        return redirect('project/preview');
    }

    public function preview(){

        $user = Auth::User();
        $pro = Projects::where('project_status', '0')->orderBy('project_id', 'decs')->get();

        $pro = $pro[0];
        
        return view('seller.preview', compact('pro', 'user'));

    }

    public function update_project(Request $request)
    {

    	$pro = Projects::findOrFail($request->project_id);

    	$pro->cat_idFk			= $request->cat_id;
    	$pro->project_title		= $request->project_title;
    	$pro->project_desc		= $request->project_desc;
    	$pro->project_price		= $request->project_price;
        
        if(!$request->s_cat_id || $request->type){
            $pro->type              = $request->type;
        }else{
            $pro->type              = 'Other';
        }

    	$pro->save();

    	if($request->hasFile('project_img')){

            ProjectImages::where('project_idFk', $request->project_id)->delete();

    		$pro_img = new ProjectImages();

    		$filename = $pro->project_id.'_'.str_random(40);
            
            $request->file('project_img')->move('assets/upload/images/', $filename);

            $pro_img->project_img 	= $filename;
            $pro_img->project_idFk 	= $pro->project_id;

            $pro_img->save();

            Image::make('assets/upload/images/'.$pro_img->project_img)->resize(640, 480)->save();

    	}

    	if($request->hasFile('project_file')){

            ProjectFiles::where('project_idFk', $request->project_id)->delete();

    		$pro_file = new ProjectFiles();

    		$filename = $pro->project_id.'_'.str_random(40);
            
            $request->file('project_file')->move('assets/upload/audio/', $filename);

            $pro_file->project_file 	= $filename;
            $pro_file->project_idFk 	= $pro->project_id;

            $pro_file->save();

    	}

        if($request->s_cat_id){

            ProjectItems::where('project_idFk', $request->project_id)->delete();

            foreach ($request->s_cat_id as $key => $value) {
                
                $item = new ProjectItems();

                $item->user_idFk        = Auth::User()->user_id;
                $item->project_idFk     = $pro->project_id;
                $item->s_cat_idFk       = $value;

                $item->save();


            }


        }


    	return redirect('user/dashboard')->with('success', 'Project Successfuly Updated');

    }

    public function delete_project($project_id)
    {
        $project = Projects::findOrFail($project_id);

        $project->project_status = '0';

        $project->save();

        return redirect('user/dashboard')->with('success', 'Project Successfuly Disabled');
    }

    public function active_project($project_id)
    {
        $project = Projects::findOrFail($project_id);

        $project->project_status = '1';

        $project->save();

        return redirect('user/dashboard')->with('success', 'Project Successfuly Active');
    }

    public function delete_forever($project_id)
    {
        ProjectImages::where('project_idFk', $project_id)->delete();
        ProjectItems::where('project_idFk', $project_id)->delete();
        ProjectFiles::where('project_idFk', $project_id)->delete();
        Projects::where('project_id', $project_id)->delete();

        return redirect('user/dashboard')->with('success', 'Project Successfuly Deleted');
    }

    public function vote_project($project_id)
    {
        $pro = Projects::findOrFail($project_id);
        $vote = new ProjectVotes();

        $vote->project_idFk     = $project_id;
        $vote->user_idFk        = Auth::User()->user_id;
        $vote->project_owner    = $pro->user_idFk;
        $vote->vote_status      = '1';

        $vote->save();

        return '1';

    }

    public function cancel_vote_project($project_id)
    {
        $user_id = Auth::User()->user_id;
        $vote = ProjectVotes::where('project_idFk', $project_id)->where('user_idFk', $user_id)->delete();

        return '1';

    }

}
