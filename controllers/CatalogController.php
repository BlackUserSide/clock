<?php 



class CatalogController extends Controller 
{
    private  $pageTpl = '/views/catalog.tpl.php';

    public function __construct()
    {
        $this->model = new CatalogModel();
        $this->view = new View();
    }

    public function index()
    {
        $this->pageData['title'] = 'Catalog || Lamp Clock';
        $this->pageData['dataProduct'] = array_reverse($this->model->getDataProduct());
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function getDataProduct()
    {
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $data = $this->model->getDataProducts($id);
            echo json_encode(array('status' => 'success', 'data' => $data));
        } 
    }
}