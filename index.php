<title>Herbland | Homepage</title>
<?php 
    session_start();
    include 'includes/header.php';
    if(isset($_SESSION['id']))
    {
      include 'includes/nav_active.php';
    }
    else
    {
      include 'includes/nav.php';
    }
   
?>
    <section class="landingpage">
      <div class="container">
        <div class="wrapper">
          <div class="landingContainer">
            <h3>
              Want To <br />
              Paint Your Life <span>Green ?</span>
            </h3>
            <p>
              together we can <br />
              transform the way to live.
            </p>
            <button>Shop Now</button>
          </div>

          <div class="img">
            <img src="image/2.png" />
          </div>
        </div>
      </div>
    </section>

    <section class="missionSection">
      <div class="container">
        <h4 class="smallheading">Our mission</h4>
        <div class="missionDiv">
          <div class="missionDesc">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
              et minima ipsum consectetur temporibus quidem! Eum, optio deleniti
              dolor natus necessitatibus dolores reprehenderit, modi fuga
              molestiae accusantium velit? Facilis, alias accusantium. Eaque
              tempore enim provident unde consequuntur magni, animi impedit
              laudantium aliquid rerum, itaque deleniti!
            </p>
          </div>

          <div class="missionImg">
            <img src="image/3.png" />
          </div>
        </div>
      </div>
    </section>

    <div class="productSection">
      <div class="container">
        <h4 class="smallheading">Our Products</h4>
      </div>
    </div>
  </body>

  <footer>
    <div class="container">
      <div class="footerContainer">
        <div class="footerheadings">
          <p>Herbland</p>
        </div>

        <div class="footerheadings">
          <p>#Gogreen</p>
        </div>

        <div class="footerheadings">
          <p>Copyright &copy; Herbland | 2021</p>
        </div>
      </div>
    </div>
  </footer>
</html>
