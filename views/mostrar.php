<div id="main_principal" class="bg-gray-200 flex items-center justify-center w-screen h-screen">
  <?php if ($notify) { ?>
  <div class="fixed inset-x-0 top-20 flex items-center justify-center">
    <div class="py-3 px-5 border border-blue-200 bg-blue-100 text-black rounded-xl shadow-lg">
      <?= $notifyText ?>
    </div>
  </div>
  <?php } ?>
  <div id="main_show_autos_panel" class="bg-white m-auto p-4 shadow-xl rounded-xl flex flex-col gap-2" style="width: 500px;">
    <h2 class="text-2xl font-bold">Ver vehiculos</h2>
    <div id="show_autos_filterbox">
      <form action="index.php" method="GET">
        <input type="hidden" name="accion" value="mostrar">
        <input type="search" id="search" name="query" class="appearance-none border border-gray-200 hover:border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-100 duration-200 focus:outline-none py-1 px-3 rounded-md w-full" placeholder="Buscar por ID de vehículo" value="<?= $searchQuery ?>">
      </form>
    </div>
    <ul id="show_autos_lista" class="rounded-xl border border-gray-100 overflow-y-auto overflow-x-hidden flex flex-col" style="height: 300px;">
      <?php foreach ($autos as $auto) { ?>
      <li class="border-t border-gray-100 py-3 px-6">
        <div class="text-sm text-gray-400">#<?= $auto->getId() ?></div>
        <div class="text-xl font-bold"><?= $auto->getModelo() ?> (<?= $auto->getAnio() ?>)</div>
        <div class="text-gray-600"><?= $auto->getMarca() ?></div>
        <div class="flex items-center justify-between">
          <span><script>document.write(new Intl.NumberFormat("es-AR", {style: 'currency', currency: 'ARS'}).format(<?= $auto->getPrecio() ?>))</script></span>
          <div class="flex gap-x-4">
            <a href="?accion=borrar&id=<?= $auto->getId() ?>" class="inline-flex items-center gap-x-1 bg-red-100 text-red-900 duration-200 hover:bg-red-200 py-2 px-4 text-white rounded font-bold">
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
              <span>Borrar</span>
            </a>
            <a href="?accion=editar&id=<?= $auto->getId() ?>" class="inline-flex items-center gap-x-1 bg-blue-100 text-blue-900 duration-200 hover:bg-blue-200 py-2 px-4 text-white rounded font-bold">
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
              </svg>
              <span>Editar</span>
            </a>
          </div>
        </div>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>