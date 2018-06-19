<?php

class Backmenu
{

    public function get($group)
    {
        $menu = [];



        foreach ($this->_menu() as $key=>$value) {

            switch ($key) {


                case 'Hiring Policy'  :
                case 'Privacystatement' :
                case 'Activity':
                if (in_array($group ,[1,2]))
                $menu[$key] = $value;
                break;




                case 'Offers':
                if (in_array($group ,[1,2,3,4]))
                $menu[$key] = $value;
                break;


                //
                case 'Offers Online':
                if (in_array($group ,[1,2,3,4]))
                $menu[$key] = $value;
                break;

                case 'Applications':
                if (in_array($group ,[1,2])) // admin + hr
                $menu[$key] = $value;
                break;



                case 'Applications_pnc':
                if (in_array($group ,[3]))
                $menu[$key] = $value;
                break;

                case 'Applications_pnc_view':
                if (in_array($group ,[6]))
                $menu[$key] = $value;
                break;


                case 'Applications_pnt':
                if (in_array($group ,[4]))
                $menu[$key] = $value;
                break;

                case 'Offer Vews Only':
                if (in_array($group ,[5,6,7]))
                $menu[$key] = $value;
                break;

                case 'Applications_pnt_view':
                if (in_array($group ,[7]))
                $menu[$key] = $value;
                break;

                case 'Applications_hr_view_only':
                if (in_array($group ,[5]))
                $menu[$key] = $value;
                break;



                case 'Slideshow':
                case 'Emails':
                case 'Manage User':
                case 'Settings':
                if (in_array($group ,[1]))
                $menu[$key] = $value;
                break;

                case 'Logout':
                $menu[$key] = $value;
            }

        }
        return $menu;
    }


    private function _menu()
    {
        return
        [
            // link = ['class'=>'url']
            'Activity'=>[
                'icon-home4'=> 'shared/activity' ],
            'Offers'=>['far fa-newspaper'=>'shared/offer'],
            'Offers Online'=>['far fa-newspaper'=>'shared/online'],
            'Manage User'=>['fas fa-file-alt'=>'back/user'],

            'Hiring Policy'=>['fas fa-envelope'=>'shared/hiringpolicy'],
            'Privacystatement'=>['fas fa-envelope'=>'shared/privacystatement'],
            'Applications'=>[ // admin + hr
                'fas fa-file-alt'=>
                ["Applications management"=>'shared/applications/1'],
                ["PNT's applications management"=>'shared/applications/3'],
                ["PNC's applications management"=>'shared/applications/2'],
                ["Applications in response"=>'shared/applicationsinresponse'],
                ["Applications created manualy"=>'shared/applicationsmanulay'],
                ["Unsolicated application"=>'shared/unsolicatedapplication'],
            ],

            'Applications_hr_view_only'=>[ // hr view only
                'fas fa-file-alt'=>
                ["Applications management"=>'shared/applications/1'],[]
            ],

            'Applications_pnc'=>[  // pnc
                'fas fa-file-alt'=>
                ["PNC's applications management"=>'shared/applications/2'],
                ["Applications created manualy"=>'shared/applicationsmanulay'],

                ["Applications in response"=>'shared/Applicationsinresponse'],

            ],
            'Applications_pnc_view'=>[
                'fas fa-file-alt'=>
                ["PNC's applications management"=>'shared/applications/2'],[]

            ],

            'Applications_pnt'=>[
                'fas fa-file-alt'=>
                ["PNT's applications management"=>'shared/applications/3'],
                ["Applications created manualy"=>'shared/applicationsmanulay'],
                ["Applications in response"=>'shared/Applicationsinresponse'],

            ],
            'Applications_pnt_view'=>[  // pnc
                'fas fa-file-alt'=>
                ["PNT's applications management"=>'shared/applications/3'],[]

            ],

            'Offer Vews Only'=>['fas fa-unlock-alt'=>'shared/Viewoffers'],


            'Layouts'=>[
                'icon-copy'=>
                ['Dashboard'=>'back'],
                ['Manage your offers'=>'back'],
                ['Cv'=>'back'],
                ['Field of activity'=>'back'],
                ['Domains and functions'=>'back'],
            ],

            'Emails'=>['fas fa-envelope'=>

                ['Automatic Email' => 'back/email'],
                []
            ],
            
            'Settings'=>['fas fa-cog'=>

                ['settings_email' => 'back/Settings_email'],
                ['settings_generic' => 'back/Settings_generic'],
                ['settings_keywords' => 'back/Settings_keywords'],
               
            ],

            'Slideshow'=>['fas fa-unlock-alt'=>'back/slideshow'],
            'Logout'=>['fas fa-pencil-alt'=>'auth/logout']];

    }



}
?>