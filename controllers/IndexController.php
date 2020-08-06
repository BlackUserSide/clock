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
        $this->pageData['title'] = 'Home || LampClock';
        $this->pageData['dataClock'] = $this->model->getData();
        $this->pageData['reviewData'] = array_reverse($this->model->getReviewData());
        $this->pageData['reviewData'] = array_slice($this->pageData['reviewData'], 0, 5);
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function addReview()
    {
        if (!empty($_POST)) {
            $text = $_POST['textReview'];
            $name = $_POST['name'];
            $position = $_POST['position'];
            $this->model->addReview($text, $name, $position);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}