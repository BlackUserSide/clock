<?php



class IndexController extends Controller 
{
    private $pageTpl = '/views/index.tpl.php';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }
    public function index()
    {
        $this->pageData['title'] = 'FirstPage';
        $this->pageData['dataClock'] = $this->model->getData();
        $this->pageData['reviewData'] = array_reverse($this->model->getReviewData());
        $this->view->render($this->pageTpl, $this->pageData);
    }
}