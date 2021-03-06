<?php

namespace App\Http\Controllers;

use App\Models\PackageSetting;
use App\Models\RSVP;
use App\Models\RSVPToken;
use App\ConfirmsRSVP;
use App\Rules\TokenFound;
use App\Rules\Unconfirmed;
use Illuminate\Http\Request;
use App\Http\Requests\RSVPRequest;
use App\Http\Controllers\GenericController as Controller;

class RSVPController extends Controller
{
    protected $confirm;

    public function __construct(ConfirmsRSVP $confirm)
    {
        $this->confirm = $confirm;

        $this->middleware('can:read,App\Models\RSVP')->except(['confirm', 'confirmFromFront']);
        $this->middleware('can:create,App\Models\RSVP')->only(['create', 'store']);
        $this->middleware('can:update,App\Models\RSVP')->only(['edit', 'update', 'remind']);
        $this->middleware('can:delete,App\Models\RSVP')->only('destroy');

        $this->middleware('package.rsvp')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rsvps = RSVP::filtersSearch(request(['search', 'order', 'method']))
                        ->latest()
                        ->get();
        return view('backend.day.rsvps.index', compact('rsvps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.day.rsvps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RSVPRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RSVPRequest $request)
    {
        $rsvp = RSVP::create(
            $request->only(['name', 'email', 'phone', 'table_name', 'total_invitation'])
        );

        $this->confirm->invite($rsvp);

        $this->flash('RSVP is successfully created and an email invitation has been sent!');

        return redirect()->route('rsvps.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RSVP  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function edit(RSVP $rsvp)
    {
        return view('backend.day.rsvps.edit', compact('rsvp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RSVPRequest $request
     * @param  \App\Models\RSVP $rsvp
     * @return \Illuminate\Http\Response
     */
    public function update(RSVPRequest $request, RSVP $rsvp)
    {
        $rsvp->update(
            $request->only(['name', 'email', 'phone', 'table_name', 'total_invitation'])
        );

        $this->flash('RSVP data is updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RSVP  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function destroy(RSVP $rsvp)
    {
        $rsvp->delete();
        $this->flash('RSVP is successfully deleted!');
        return back();
    }

    public function remind(RSVP $rsvp)
    {
        $this->confirm->postRemind($rsvp);

        $this->flash('Sent reminder to RSVP!');

        return back();
    }

    public function confirm(RSVP $rsvp, RSVPToken $token, PackageSetting $setting)
    {
        $this->confirm
            ->persist($token)
            ->reserve($rsvp);

        $vip = $setting->getVip();

        return view("rsvps.reserved", compact('rsvp', 'vip'));
    }

    public function confirmFromFront(Request $request)
    {
        $this->validate($request, [
            'rsvp' => ['bail', 'required', new Unconfirmed, new TokenFound],
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $id = (int) ($request->rsvp);
        $rsvp = RSVP::find($id);
        $token = $rsvp->token;
        $this->confirm
            ->persist($token)
            ->reserve($rsvp);

        return redirect()->route('front.rsvp')->with('rsvp', $rsvp);
    }
}
