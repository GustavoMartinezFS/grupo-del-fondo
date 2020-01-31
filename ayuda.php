<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>
  <?php include_once("header.php"); ?>

<!-- Main -->
  <main role="main" style="margin-top: 40px;">
    <section class="text-center container">
      <h1 id="contact" class="mt-2">Preguntas Frecuentes</h1>
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header bg-new" id="headingOne">
            <h2 class="mb-0">
              <button class="btn text-white" type="button" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                NOSOTROS
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <h3>Quienes somos?</h3>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus suscipit id odio quasi ab dicta eaque ducimus. Quaerat nisi necessitatibus, est iure cupiditate quis, alias voluptates consequatur voluptate non, aspernatur.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-new" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn  text-white collapsed" type="button" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                PRODUCTOS
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <h3>Garantias de los Productos?</h3>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus suscipit id odio quasi ab dicta eaque ducimus. Quaerat nisi necessitatibus, est iure cupiditate quis, alias voluptates consequatur voluptate non, aspernatur.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-new" id="headingThree">
            <h2 class="mb-0">
              <button class="btn text-white collapsed" type="button" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                COMPRAS
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <h3>Como compro?</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus suscipit id odio quasi ab dicta eaque ducimus. Quaerat nisi necessitatibus, est iure cupiditate quis, alias voluptates consequatur voluptate non, aspernatur.
  </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-new" id="headingOne">
            <h2 class="mb-0">
              <button class="btn  text-white" type="button" data-toggle="collapse"
                data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                PAGOS
              </button>
            </h2>
          </div>

          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
              <h3>Metodos de pagos?</h3>

                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus suscipit id odio quasi ab dicta eaque ducimus. Quaerat nisi necessitatibus, est iure cupiditate quis, alias voluptates consequatur voluptate non, aspernatur.
  </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-new" id="headingOne">
            <h2 class="mb-0">
              <button class="btn text-white" type="button" data-toggle="collapse"
                data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                ENVIOS
              </button>
            </h2>
          </div>

          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
              <h3>Modos de envios?</h3>

                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus suscipit id odio quasi ab dicta eaque ducimus. Quaerat nisi necessitatibus, est iure cupiditate quis, alias voluptates consequatur voluptate non, aspernatur.
</div>
          </div>
        </div>
      </div>
      <h4>Te sivió la información?</h4>
      <form action="index.php">
        <fieldset class="form-group">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                <label class="form-check-label" for="gridRadios1">
                  SI
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                <label class="form-check-label" for="gridRadios2">
                  NO
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <div class="form-group row">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary bg-new">ENVIAR</button>
          </div>
        </div>
      </form>
    </section>
  </main>
  <?php include_once("footer.php"); ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
