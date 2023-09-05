<?php
//Buraya login ile ilgili işlemlerin php kodlarını yazacağız. Login sayfasını gösterirken de, verileri post ettikten sonra işlem yaparken de aynı sayfayı kullanabiliriz. Aşağıda nasıl olduğu ile ilgili ufak bir gösterim mevcut. Bu sayfada html, css, js kodları olmayacak.
//Bu sayfanın view tarafında form içerisinde hidden tipinde bir input daha ekledik. Post verisi geldi mi yoksa form mu gösterilecek kararını bu veriye göre vereceğiz. 
if(isset($_POST['action']) && $_POST['action']=='login') {
    // POST olarak action verisi geldiğine göre login için forma veri girilip post edilmiş. O zaman login işlemlerini yapıyoruz. 
    $loginemail = $_POST["email"];
    $hello = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $hello->bindParam(':email', $loginemail);
    $hello->execute();
    $return = $hello->fetch(PDO::FETCH_ASSOC);
    if (isset($return["id"])) {
        if(md5($_POST["password"])==$return["password"]){
            session_start();
            $_SESSION["id"] = $return["id"];
            $_SESSION["email"] = $return["email"];
            header("Location: user_list");
        }else {
            header("Location: login");
        }
    } else {
        header("Location: login");
    }
}
 //Eğer gelen istekte action adında bir post verisi yok ise henüz kimse veri doldurmamış. Bu sebeple view kısmındaki html kodlarımızı include ederek formun ekranda gözükmesini sağlıyoruz. Buradaki header ve footer kısmı tüm sayfalarda ortak olan html kodlarını tekrar tekrar yazmamak için var.Her controllerda ikisi ortak, login.phtml değişiyor. Mecburi değil fakat işi ciddi oranda kolaylaştıran bir yöntem.
include ('view/login.phtml');
include ('view/footer.phtml');
