<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Name</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <?php
      switch ($route) {
          case "about":
              echo "<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.10/css/all.css\" integrity=\"sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg\" crossorigin=\"anonymous\">";
              break;
          case "contacts":
              echo "<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.10/css/all.css\" integrity=\"sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg\" crossorigin=\"anonymous\">";
              break;
      }
    ?>
    <link href="css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
              <a class="navbar-brand" href="/"><img src="img/brand.jpg" alt="Логотип"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                      <?php
                      switch ($route) {
                          case "":
                              echo "
                              <li class=\"nav-item active\">
                                <a class=\"nav-link\" href=\"/\">Главная</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"shop\">Магазин</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"about\">О нас</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"contacts\">Контакты</a>
                              </li>
                              ";
                              break;
                          case "shop":
                              echo "
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"/\">Главная</a>
                              </li>
                              <li class=\"nav-item active\">
                                <a class=\"nav-link\" href=\"shop\">Магазин</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"about\">О нас</a>
                              </li>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"contacts\">Контакты</a>
                              </li>
                              ";
                              break;
                          case "about":
                              echo "
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"/\">Главная</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"shop\">Магазин</a>
                              </li>
                              <li class=\"nav-item active\">
                                <a class=\"nav-link\" href=\"about\">О нас</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"contacts\">Контакты</a>
                              </li>
                              ";
                              break;
                          case "contacts":
                              echo "
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"/\">Главная</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"shop\">Магазин</a>
                              </li>
                              <li class=\"nav-item\">
                                <a class=\"nav-link\" href=\"about\">О нас</a>
                              </li>
                              <li class=\"nav-item active\">
                                <a class=\"nav-link\" href=\"contacts\">Контакты</a>
                              </li>
                              ";
                              break;
                      }
                      ?>
                  </ul>
                  <div data-toggle="modal" data-target=".cart-modal">
                      <a class="nav-link" href="#cartModal" data-toggle="modal">
                          <i class="fab fa-opencart fa-spin" aria-hidden="true"></i>
                          Cart<span id="cart-badge" class="badge badge-light"></span>
                      </a>
                  </div>
              </div>
          </div>
      </nav>
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <h1 class="my-4">Shop Name</h1>
                  <div class="list-group">
                      <a href="#" class="list-group-item">Мужские</a>
                      <a href="#" class="list-group-item">Женские</a>
                      <a href="#" class="list-group-item">Unisex</a>
                      <a href="#" class="list-group-item">Dior</a>
                      <a href="#" class="list-group-item">Ray Ban</a>
                  </div>
              </div>