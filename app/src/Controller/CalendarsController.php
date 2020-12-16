<?php

namespace App\Controller;

class CalendarsController extends AppController
{
    public function index()
    {

    }

    public function get()
    {
        $this->autoRender = false;

        $this->loadComponent('Paginator');
        $calendars = $this->Paginator->paginate($this->Calendars->find());
        $this->set(compact('calendars'));

        echo json_encode($calendars);
    }

    public function add()
    {
        $this->autoRender = false;

        $title = $this->request->getData('title');

        $query = $this->Calendars->query();
        $query->insert(['title', 'created'])
            ->values([
                'title' => $title,
                'created' => date('Y-m-d H:i:s')
            ])
            ->execute();

        echo json_encode('success');
    }

    public function edit()
    {
        $this->autoRender = false;

        $id = $this->request->getData('id');
        $start = $this->request->getData('start');

        $query = $this->Calendars->query();
        $query->update()
            ->set([
                'start' => $start,
                'modified' => date('Y-m-d H:i:s')
            ])
            ->where(['id' => $id])
            ->execute();

        echo json_encode('success');
    }
}
