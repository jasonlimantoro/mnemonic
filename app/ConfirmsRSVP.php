<?php

namespace App;
use App\RSVP;
use App\RSVPToken;
use Illuminate\Http\Request;

class ConfirmsRSVP 
{
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function invite()
	{
		$this->createToken()
			 ->send();
	}
		
	protected function createToken()
	{
		$rsvp = RSVP::byEmail($this->request->email);	
		return RSVPToken::generateFor($rsvp);
	}
}
