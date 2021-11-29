<div id="main_principal" class="bg-gray-200 flex items-center justify-center w-screen h-screen">
  <form method="POST" action="index.php?accion=registrar" class="bg-white m-auto p-4 shadow-xl rounded-xl flex flex-col gap-3">
    <h2 class="text-2xl">Añadir vehiculo</h2>
    <div class="flex flex-col gap-3">
      <input class="border border-gray-200 py-1 px-3 rounded-md" type="text" name="marca" id="marca" placeholder="Marca">
      <input class="border border-gray-200 py-1 px-3 rounded-md" type="text" name="modelo" id="modelo" placeholder="Modelo">
      <input class="border border-gray-200 py-1 px-3 rounded-md" type="number" name="anio" min="1969" max="2022" id="año" placeholder="Año">
      <input class="border border-gray-200 py-1 px-3 rounded-md" type="number" name="precio" id="precio" placeholder="Precio">
    </div>
    <div>
      <button type="submit" name="submit" class="bg-blue-600 border border-blue-500 text-white py-2 px-5 rounded-xl text-lg">
        Añadir
      </button>
    </div>
  </form>
</div>