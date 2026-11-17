
<?php
 require "../../autoload.php";

 $daoTreino = new TreinoDAO();
 $daoExercicio = new ExercicioDAO();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Astro v5.13.2" />
    <title>Cadastrar Treino_has_Exercicio</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/" />
    <script src="../../js/color-modes.js"></script>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <meta name="theme-color" content="#712cf9" />
    <link href="../../css/dashboard.css" rel="stylesheet" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
      }

      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>
  </head>

  <body>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow"
      data-bs-theme="dark">

      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white"
        href="#">Company name</a>

      <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
          <button class="nav-link px-3 text-white" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <svg class="bi" aria-hidden="true">
              <use xlink:href="#list"></use>
            </svg>
          </button>
        </li>
      </ul>
    </header>

    <div class="container-fluid">
      <div class="row">

        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">

          <div class="offcanvas-md offcanvas-end bg-body-tertiary"
            tabindex="-1" id="sidebarMenu"
            aria-labelledby="sidebarMenuLabel">

            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="sidebarMenuLabel">
                Company name
              </h5>

              <button type="button" class="btn-close"
                data-bs-dismiss="offcanvas"
                data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
            </div>

            <?php include "../menu/navbar.php" ?>

          </div>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h1 class="h2">Cadastrar Treino_has_Exercicio</h1>

          </div>

          <div class="table-responsive small">

            <form action="insert.php" method="post">

              <div class="form-group">
                <label for="Series">Séries</label>
                <input type="number" name="Series" id="Series"
                  class="form-control" required>
              </div>

              <div class="form-group">
                <label for="Repeticao">Repetições</label>
                <input type="number" name="Repeticao" id="Repeticao"
                  class="form-control" required>
              </div>

              <div class="form-group">
                <label for="Treino_idTreino">Treino</label>

                <select name="Treino_idTreino" id="Treino_idTreino"
                  class="form-control" required>

                  <?php foreach($daoTreino->read() as $treino) : ?>
                    <option value="<?= $treino->getId() ?>">
                      <?= $treino->getDescricao() ?>
                    </option>
                  <?php endforeach ?>

                </select>
              </div>

              <div class="form-group">
                <label for="Exercicio_idExercicio">Exercício</label>

                <select name="Exercicio_idExercicio" id="Exercicio_idExercicio"
                  class="form-control" required>

                  <?php foreach($daoExercicio->read() as $exercicio) : ?>
                    <option value="<?= $exercicio->getId() ?>">
                      <?= $exercicio->getDescricao() ?>
                    </option>
                  <?php endforeach ?>

                </select>
              </div>

              <br>

              <div class="form-group">
                <input type="reset" value="Limpar" class="btn">
                <input type="submit" value="Salvar" class="btn btn-success">
              </div>

            </form>

          </div>

        </main>
      </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"></script>
    <script src="../../js/dashboard.js"></script>

  </body>
</html>
