<?php


class controller_services extends Controller
{
    function action_index()
    {
        $this->view->generate('services_view.php', 'template_view.php', '', 'Услуги');
    }
}