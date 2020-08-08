<?php



class OrderController extends Controller
{
    private $pageTpl = '/views/order.tpl.php';
    
    public function __construct()
    {
        $this->model = new OrderModel();
        $this->view = new View();
    }
    public function index()
    {
        $this->pageData['title'] = 'Order Page || Lamp Clock';
        $this->view->render($this->pageTpl, $this->pageData);
    }
    public function addOrder()
    {
        if (!empty($_POST)) {
            $email = $_POST['e-mail'];
            $fullName = $_POST['fullName'];
            $country = $_POST['country'];
            $postal = $_POST['postal'];
            $address = $_POST['address'];
            $apartment = $_POST['apartment'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $discount = $_POST['discount'];
            $price = $_POST['price'];
            $numberOrder = mt_rand(0, 9999999999);
            $idProd = $_POST['idProduct'];
            $qnt = $_POST['col'];
            $this->model->addOrderItem($idProd, $qnt, $numberOrder);
            $this->model->addOrder($email, $fullName, $country, $postal, $address, $apartment, $city, $phone, $numberOrder, $discount, $price);
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}