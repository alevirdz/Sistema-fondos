<?php 
require './Sesiones.php';
?>
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="font-weight-bold">Donaciones</h1>
                <p class="lead text-muted" id="subtitle-donations">Registro para las donaciones</p>
            </div>

            <?php if ($rolUser == 1): ?>
                <div class="col-sm-6 col-lg-5 d-flex">
                    <button class="btn btn btn-primary white w-100 align-self-center" id="actionDonations" onclick="showDonation()">Ver Donaciones</button>
                    <a href="../Excel_Donations.php" class="btn btn btn-primary white w-100 align-self-center">Descargar registros</a>
                </div>
            <?php else:?>
                <div class="col-sm-6 col-lg-5 d-flex">
                    
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">

               <div class="content" id="table-donations">
                    <form class="form-donation" id="formG">
                        <h2 class="text-center">A Donar</h2>
                        <div class="mb-3">
                            <label for="user" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres" required>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" required>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">Presupuesto de la donación</label>
                            <input class="form-control" name="donacion" id="donacion" placeholder="$0.00" required>
                        </div>

                        <div class="d-grid gap-2">
                            <a type="button" class="btn btn-dark" name="btn-donation" id="btn-donation" onclick="donations()">¡Donar!</a>
                        </div>
                    </form>

                </div> 


            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalDonations" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" id="activeCenter">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="genericoTitle">Editar Registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div id="contentEdit"></div>

      </div>
    </div>
  </div>
</div>
</div>