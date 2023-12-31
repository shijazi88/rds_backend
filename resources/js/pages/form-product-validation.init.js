(function () {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll("#product-form");
            // Loop over them and prevent submission
            if (forms) {
                var validation = Array.prototype.filter.call(
                    forms,
                    function (form) {
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
                    }
                );

                // Add validation to all form inputs
                Array.prototype.forEach.call(forms, function (form) {
                    Array.prototype.forEach.call(
                        form.querySelectorAll(".form-control"),
                        function (input) {
                            input.addEventListener(
                                "blur",
                                function (event) {
                                    if (input.checkValidity()) {
                                        input.classList.remove("is-invalid");
                                        input.classList.add("is-valid");
                                    } else {
                                        input.classList.remove("is-valid");
                                        input.classList.add("is-invalid");
                                    }
                                },
                                false
                            );
                        }
                    );
                });
            }
        },
        false
    );
})();
