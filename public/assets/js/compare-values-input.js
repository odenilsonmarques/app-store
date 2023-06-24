document.addEventListener("DOMContentLoaded", function() {
    var quantityInput = document.getElementById("quantity");
    var confirmQuantityInput = document.getElementById("confirm_quantity");
    var minimumQuantityInput = document.getElementById("minimum_quantity");

    var submitButton = document.getElementById("submitBtn");

    submitButton.addEventListener("click", validateAmount);

    function validateAmount(event) {
        var quantityValue = quantityInput.value;
        var confirmQuantityValue = confirmQuantityInput.value;
        var minimumQuantityValue = minimumQuantityInput.value;

        if (quantityValue !== confirmQuantityValue) {
            event.preventDefault(); 
            // alert("Os valores devem ser iguais!");
            swal({
                title: "Ops...",
                text: "Os campos Quantidade e Confirme a Quantidade precisam ter o mesmo valor !", 
            });
        }
        else if( minimumQuantityValue > quantityValue) {
            event.preventDefault(); 
            // alert("A quantidade minima não pode ser maior do que a quantidade geral!");
            swal({
                title: "Ops...",
                text: "A quantidade minima não pode ser maior do que a quantidade !", 
            });
        }
    }
});