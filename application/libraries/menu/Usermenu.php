<?php

class Usermenu
{

    public function get()
    {

        $menu =
        [
            'user/profile'=>'profile',
            'user/offers'=>'offer_list',
            'user/unsolicited/additional' =>'unsolicited_application',
            'user/pnt/additional'=>'pnt_application_tab',
            'user/hr/expirience'=>'hr_application_tab',
            'user/pnc/additional'=>'pnc_application_tab',
            'user/mechanic/additional'=>'mechanic',
            'auth/edit_user'=>'my_password',
            'user/logout'=>'sign_out',
        ];
        return $menu;
    }



}
?>