<?php

namespace App\Controller;

class CalendarsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $calendars = $this->Paginator->paginate($this->Calendars->find());
        $this->set(compact('calendars'));
    }
}
