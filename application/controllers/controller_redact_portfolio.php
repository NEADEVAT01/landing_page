<?php

require_once 'application/models/model_redact_portfolio.php';

class Controller_Redact_Portfolio extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Redact_Portfolio();
    }

    public function action_index()
    {
        $data = $this->model->get_data('portfolio');
        $this->view->generate('redact_portfolio_view.php', 'template_view.php', $data,'Редактирование портфолио');
    }

    public function action_insert_data()
    {
        if (isset($_POST,
            $_POST['year'],
            $_POST['site'],
            $_POST['description']
        ) and $_POST['year'] >= 2000 and $_POST['year'] <= date("Y")) {

            $year = $_POST['year'];
            $site = $_POST['site'];
            $description = strip_tags($_POST['description']);

            if (isset($_POST['create_portfolio']) && filter_var($site, FILTER_VALIDATE_URL) &&
                filter_var($description, FILTER_SANITIZE_STRING) && filter_var($year, FILTER_SANITIZE_NUMBER_INT)) {
                $this->model->insert_data(
                    "portfolio",
                    "year, site, description",
                    "'$year', '$site', '$description'"
                );
                header("Location: /redact_portfolio");
            }
        } else {
            header("Location: /redact_portfolio");
        }
    }

    public function action_del_data()
    {
        if (isset($_POST, $_POST['del_portfolio'])) ;
        $this->model->delete_data('portfolio', $_POST['del_id']);
        header('Location: /redact_portfolio');
    }

    public function action_update_data()
    {
        if (isset($_POST,
            $_POST['update_year'],
            $_POST['update_site'],
            $_POST['update_description'],
            $_POST['update_id']
        )) {

            $update_year = $_POST['update_year'];
            $update_site = $_POST['update_site'];
            $update_description =  strip_tags($_POST['update_description']);
            $update_id = $_POST['update_id'];

            if ($_POST['update_portfolio'] && filter_var($update_site, FILTER_VALIDATE_URL) &&
                filter_var($update_description, FILTER_SANITIZE_STRING) && filter_var($update_year, FILTER_SANITIZE_NUMBER_INT)) {
                $this->model->update_data(
                    "portfolio",
                    "year = '$update_year', site = '$update_site', description = '$update_description' ",
                    $update_id
                );
                header('Location: /redact_portfolio');
            }
        }
    }
}