Subí en la rama 'feature/display-result' los cambios que hicimos para que se muestre el resultado una vez que estén correctas todas las respuestas o se alcance el número máximo de intentos.

No lo hicimos en la rama master porque notamos que al menos el archivo de la pizarra (blackboard.php), no está actualizado con los últimos cambios que realizamos, ya que la versión no corresponde con la del último commit que hicimos con ese archivo (pueden verificarlo viendo el commit: https://github.com/AlejandroFV/pizarra-virtual/commit/d2809ab681c4385ac73813a80bf12e710bd9676e). Como no sabemos si aun tienen cambios que no se hayan subido y por eso en el repositorio no esté actualizado, decidimos hacerlo en otra rama y que cuando estén listos, hagan un merge para implementar esos cambios.

Los archivos que modificamos son:
  application/controller/validator.php
  application/view/blackboard.php
  assets/css/site.css