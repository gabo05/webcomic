<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Welcome to Webcomic App</h1>
        <h2><?php echo $this->model->safe_title; ?></h2>
        <div>
            <img src="<?php echo $this->model->img?>" alt="<?php echo $this->model->alt?>">
        </div>
        <div>
            <p><?php echo $this->model->alt?></p>
        </div>
        <div><a href="#">Previus</a></div>
        <footer>
            <p>&copy;<?php echo $this->model->year?></p>
        </footer>
    </body>
</html>