<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="container">
    <div class="fixed">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#index">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contacts">Contacts</a>
            </li>
        </ul>
        <div class="alert alert-info" role="alert">
            Запись добавлена
        </div>
        <div class="alert alert-danger" role="alert">
            Повторите попытку
        </div>
    </div>
    <div class="header" id="index">
    </div>
    <div class="index">
        <h1>index</h1>
    </div>
    <div class="header" id="shop">
    </div>
    <div class="shop">
        <div class="goods-out"></div>
        <label for="gname">Название: </label>
        <input type="text" id="gname"><br><br>
        <label for="gcost">Стоимость: </label>
        <input type="text" id="gcost"><br><br>
        <label for="gdescr">Описание: </label>
        <textarea id="gdescr" cols="30" rows="10"></textarea><br><br>
        <label for="gorder">Порядок: </label>
        <input type="text" id="gorder"><br><br>
        <label for="gimg">Изображение: </label>
        <input type="text" id="gimg"><br><br>
        <input type="hidden" id="gid">
        <input type="submit" value="Обновить" class="add-to-db">
    </div>
    <div class="header" id="about">

    </div>
    <div class="about">
        <h1>about</h1>
    </div>
    <div class="header" id="contacts">
    </div>
    <div class="contacts">
        <h1>contacts</h1>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/admin.js"></script>
</body>
</html>