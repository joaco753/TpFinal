<div id="main_principal" class="bg-gray-200 flex items-center justify-center w-screen h-screen">
  <form method="POST" action="?accion=borrar" class="bg-white m-auto p-4 shadow-xl rounded-xl flex flex-col gap-3">
    <h2 class="text-2xl font-bold">Borrar vehículo</h2>
    <p>¿Está seguro que quiere borrar este vehículo?</p>
    <div class="flex flex-col gap-3">
      <div class="rounded-xl border border-gray-100 py-3 px-6">
        <div class="text-sm text-gray-400">#<?= $auto->getId() ?></div>
        <div class="text-xl font-bold"><?= $auto->getModelo() ?> (<?= $auto->getAnio() ?>)</div>
        <div class="text-gray-600"><?= $auto->getMarca() ?></div>
        <input type="hidden" hidden name="id" value="<?= $auto->getId() ?>">
      </div>
    </div>
    <div>
      <button type="submit" name="submit" class="text-base bg-red-600 border border-red-500 text-white py-2 px-5 rounded-xl text-lg">
        Borrar
      </button>
    </div>
  </form>
</div>