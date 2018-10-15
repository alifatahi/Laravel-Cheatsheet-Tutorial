<?php

namespace Modules\LaravelNewsletter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
//Model Comes with Our Package
use Newsletter;

class LaravelNewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('laravelnewsletter::index');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribePending($request->email);
            return redirect('laravelnewsletter')->with('success', 'Thanks For Subscribe');
        }
        return redirect('laravelnewsletter')->with('failure', 'Sorry! You have already subscribed ');
    }
}
