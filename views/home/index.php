<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Comic #<?php echo $this->model->real_id ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="<?php echo $this->getBase() ?>/template/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="<?php echo $this->getBase() ?>/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="<?php echo $this->getBase() ?>/template/css/argon.css?v=1.0.1" rel="stylesheet">
        <!-- Docs CSS -->
        <!-- <link type="text/css" href="./assets/css/docs.min.css" rel="stylesheet"> -->
    </head>
    <body>
        <main>
        <section class="section section-lg section-shaped">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container py-md">
                <div class="row row-grid justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <h3 class="display-3 text-white"><?php echo $this->model->safe_title; ?>
                        </h3>
                        <p class="lead text-white"><?php echo $this->model->alt ?></p>
                        <div class="btn-wrapper">
                            <?php if($this->model->num > 1) {?>
                                <a class="btn btn-white" href="<?php echo $this->getBase() ?>/comic/<?php echo ($this->model->num - 1) ?>">Previus</a>
                            <?php } ?>
                            <?php if($this->model->num < $this->model->last) {?>
                                <a class="btn btn-white" href="<?php echo $this->getBase() ?>/comic/<?php echo ($this->model->num + 1)?>">Next</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-lg-auto">
                        <img src="<?php echo $this->model->img?>" alt="<?php echo $this->model->alt?>">
                    </div>
                </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            </section>
        </main>
        <footer class="footer has-cards">
            <div class="container">
                <div class="row align-items-center justify-content-md-between">
                    <div class="col-md-6">
                        <div class="copyright">
                            &copy; <?php echo $this->model->year?>
                            <a href="/" target="_blank">WebComic</a>.
                        </div>
                    </div>
                </div>
            </div>
        <footer>
        <?php if($this->model->change_url){?>
            <input type="hidden" id="cid" value="<?php echo $this->model->real_id ?>">
            <script>
                var id = document.getElementById('cid').value;
                var current = location.href.split('/');
                current[current.length - 1] = id;
                var newurl = current.join('/');
                window.history.pushState('object', 'Comic #'+id, newurl);
            </script>
        <?php } ?>
    </body>
</html>