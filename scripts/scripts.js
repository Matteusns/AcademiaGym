document.addEventListener('DOMContentLoaded', function () {
    // do something here ...
  }, false);

function name(params) {
    
}
document.getElementsByClassName("fecharModal").addEventListener("click", function() {
    // Encontre a modal pelo ID e feche-a
    var modal = document.getElementById("myModal");
    var modalInstance = new bootstrap.Modal(modal);
    modalInstance.hide();
});