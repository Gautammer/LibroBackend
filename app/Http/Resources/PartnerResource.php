<?php

namespace App\Http\Resources;

use App\Model\lsCity;
use App\Model\lsPartner;
use App\Model\lsState;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = lsPartner::where('pemail',$this->pemail)->first();
        $state = lsState::find($this->stateid)->statename;
        $city = lsCity::find($this->cityid)->cityname;
        return [
            "partner_id" => $user->pid,
            "name" => ucwords($this->pname),
            "email" => $this->pemail,
            "phone" => $this->pmobileno,
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
