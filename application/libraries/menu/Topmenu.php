<?php

class Topmenu
{

    public function get($logined  )
    {

        $menu =
        [
            'user/offers'=>'our_offers',
            'user/apply_un'=>'unsolicited_application_apply',
            'not/'=>'our_recruitment_policy',
            'not/index'=>'gallery_of_professions',
        ];

        if ($logined) {
            $menu['auth/logout'] = 'logout';
        }else {
            $menu['auth/login'] = 'candidate_space';
        }
        return $menu;
    }


}
?>