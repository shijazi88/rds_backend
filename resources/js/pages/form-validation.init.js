(function () {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            // Fetch the form we want to apply custom Bootstrap validation styles to
            var form = document.getElementById("product-form");
            // Add the validation listener
            form.addEventListener(
                "submit",
                function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                },
                false
            );
        },
        false
    );
})();
