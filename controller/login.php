<?php
//Buraya login ile ilgili işlemlerin php kodlarını yazacağız. Login sayfasını gösterirken de, verileri post ettikten sonra işlem yaparken de aynı sayfayı kullanabiliriz. Aşağıda nasıl olduğu ile ilgili ufak bir gösterim mevcut. Bu sayfada html, css, js kodları olmayacak.

//Bu sayfanın view tarafında form içerisinde hidden tipinde bir input daha ekledik. Post verisi geldi mi yoksa form mu gösterilecek kararını bu veriye göre vereceğiz. 
if(isset($_POST['action']) && $_POST['action']=='login') {
    // POST olarak action verisi geldiğine göre login için forma veri girilip post edilmiş. O zaman login işlemlerini yapıyoruz. 
    if($login_islemi_onaylandı){//kullanıcının girdiği verileri veritabanı ile karşılaştırıp eşleşiyor mu kontrol ediyoruz. Bunun sonucunuda eşleşiyorsa bu ifin içini true ile dolduracağız. Eşleşmiyorsa else kısmına düşmesini sağlayacağız.
        //Bu komut artık login işlemi gerçekleştiği için kullanıcı listesi sayfasına yönlendiriyor.
        header("Location: users" );
        exit; 
    }
    else{
        //Login işlemi gerçekleşmedi. Şifre ya da kullanıcı adı yanlış girilmiş olabilir. Login sayfasına geri gönderiyoruz. Zaten login sayfasındayız, neden tekrar login sayfasına yönlendiriyoruz diye sorarsan şu anda post verileri istek içerisinde hala mevcut. Login sayfasına tekrar yönlendirerek bir nevi sayfanın yenileyerek post verilerinin temizlenmesini sağlıyoruz.
        header("Location: login" );
        exit; 
    }

}
 //Eğer gelen istekte action adında bir post verisi yok ise henüz kimse veri doldurmamış. Bu sebeple view kısmındaki html kodlarımızı include ederek formun ekranda gözükmesini sağlıyoruz. Buradaki header ve footer kısmı tüm sayfalarda ortak olan html kodlarını tekrar tekrar yazmamak için var.Her controllerda ikisi ortak, login.phtml değişiyor. Mecburi değil fakat işi ciddi oranda kolaylaştıran bir yöntem.
include ('view/header.phtml');
include ('view/login.phtml');
include ('view/footer.phtml');
?>