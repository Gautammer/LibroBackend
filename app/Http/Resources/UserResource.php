<?php

namespace App\Http\Resources;

use App\Model\lsCity;
use App\Model\lsState;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        $user = User::where('uemail',$this->uemail)->first();
        $state = lsState::find($this->stateid)->statename;
        $city = lsCity::find($this->cityid)->cityname;
        return [
            "user_id" => $user->uid,
            "name" => ucwords($this->uname),
            "email" => $this->uemail,
            "phone" => $this->umobileno,
            "state" => ucfirst($state),
            "city" => ucfirst($city),
            "state_id" => $this->stateid,
            "city_id" => $this->cityid,
            "href" => [
                        "profile_img" => ($this->uprofilepic != null) ? url('/'.$this->uprofilepic) : null,
                        ],
        ];
    }
}
