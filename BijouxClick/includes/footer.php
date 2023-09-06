<?php
if(isset($_POST['sub']))
  {
   
    $email=$_POST['email'];
 
     
    $query=mysqli_query($con, "insert into tblsubscriber(Email) value('$email')");
    if ($query) {
   echo "<script>alert('Votre inscription a été effectuée avec succès !');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Une erreur s\'est produite. Veuillez réessayer.")</script>';
    }

  
}
  ?>
<footer id="footer">
              <div class="container">
                     <div class="cols">
                            <div class="col">
                                   <h3>Liens utiles</h3>
                                   <ul>
                                          <li><a href="index.php">Accueil</a></li>
                                          <li><a href="category.php">Catégorie</a></li>
                                          <li><a href="contact.php">Contact</a></li>
                                          <li><a href="about.php">À propos</a></li>
                                          <!--<li><a href="admin/index.php">Admin </a></li>-->
                                   </ul>
                            </div>
                            <div class="col media">
                                   <h3>Suivez nous</h3>
                                   <ul class="social">
                                          <li><a href="https://www.facebook.com/IyedSoumriOfficial/"><span class="ico ico-fb"></span>Facebook</a></li>
                                          <li><a href="https://twitter.com/login?lang=fr"><span class="ico ico-tw"></span>Twitter</a></li>
                                          <li><a href="https://accounts.google.com/ServiceLogin?ltmpl=mobNH"><span class="ico ico-gp"></span>Google+</a></li>
                                          <li><a href="https://www.pinterest.fr/"><span class="ico ico-pi"></span>Pinterest</a></li>
                                   </ul>
                            </div>
                            <div class="col contact">
                                   <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                   <h3><?php  echo $row['PageTitle'];?></h3>
                                   <p style="color: white"><?php  echo $row['PageDescription'];?></p>
                                   <p><span class="ico ico-em"></span><?php  echo $row['Email'];?></p>
                                   <p><span class="ico ico-ph"></span><?php  echo $row['MobileNumber'];?></p><?php } ?>
                            </div>
                            <div class="col newsletter">

                                   <h3>NE MANQUEZ RIEN !</h3>
                                   <p>Abonnez-vous maintenant et recevez une offre de bijoux chaque semaine dans votre boîte de réception.</p>
                                   <form action="#" method="post">
                                         <input type="email" name="email" placeholder="Votre adresse e-mail">
                                          <button type="submit" name="sub"></button>
                                   </form>
                            </div>
                     </div>
                     <p class="copy">&copy; Copyright <?= date('Y'); ?> Par <span style="color:#FFFFFF">Iyed Soumri</span> | Tous droits réservés.</p>
              </div>
              <!-- / container -->
       </footer>
       <!-- / footer -->