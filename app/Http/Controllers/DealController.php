<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Deals;
use App\Projects;
use App\DealsItems;
use Illuminate\Support\Facades\Mail;
use App\Mailers\Mailer;
use App\ProjectVotes;
use Auth;

class DealController extends Controller
{
    protected $mailer;
    function __construct(Mailer $mailer){
        
        $this->mailer = $mailer;

    }

    public function add_deal(Request $request)
    {
    	$deal = new Deals();

        $deal->project_idFk     = $request->project_id;
        $deal->buyer_idFk       = Auth::User()->user_id;
        $deal->seller_idFk      = $request->user_id;
        $deal->address          = $request->address;
        $deal->phone_no         = $request->phone_no;
        $deal->total_price      = $request->total_price;
        $deal->total_items      = $request->items;

        $deal->save();

        $project = Projects::findOrFail($request->project_id);

        $view = 'mail.mail';
        $subject = 'Place Order';  
        $data['reason'] = 'Order Request Please Check Yours Orders!';
        
        $this->mailer->sendTo($project->user->email, $subject, $view, $data);

    	return redirect('buyer/dashboard')->with('success', 'Order Successfuly Added');


    }

    public function delete_deal($deal_id)
    {
        $deal = Deals::findOrFail($deal_id);

        $deal->delete();

        return redirect('buyer/dashboard')->with('success', 'Order Successfuly Deleted');

    }

    public function accepted_deal($deal_id)
    {
        $deal = Deals::findOrFail($deal_id);

        $deal->deal_status = 'Active';

        $deal->save();

        $view = 'mail.mail';
        $subject = 'Accept Order';  
        $data['reason'] = 'Order Is Accpeted!';
        
        $this->mailer->sendTo($deal->buyer->email, $subject, $view, $data);

        return redirect('user/dashboard')->with('success', 'Order Successfuly Accepted');

    }

    public function rejected_deal(Request $request)
    {
    	$deal = Deals::findOrFail($request->deal_id);

    	$deal->deal_status = 'Canceled';

        $deal->save();

        $view = 'mail.mail';
        $subject = 'Cancele Order';  
        $data['reason'] = $request->reason;
        
        $this->mailer->sendTo($deal->buyer->email, $subject, $view, $data);

    	return redirect('user/dashboard')->with('success', 'Order Successfuly Rejected');

    }

}
