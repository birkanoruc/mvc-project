document.addEventListener('DOMContentLoaded', function () {
    "use strict";

    var exampleModal = document.getElementById('formmodal');
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var recipient = button.getAttribute('data-bs-whatever');
            var modalTitle = exampleModal.querySelector('.modal-title');
            var modalBodyInput = exampleModal.querySelector('.modal-body input');
            modalTitle.textContent = 'New message to ' + recipient;
            modalBodyInput.value = recipient;
        });
    }

    // Animated modals
    /* showing modal effects */
    document.querySelectorAll(".modal-effect").forEach(e => {
        e.addEventListener('click', function (e) {
            e.preventDefault();
            let effect = this.getAttribute('data-bs-effect');
            let modalDemo = document.querySelector("#modaldemo8");
            if (modalDemo) {
                modalDemo.classList.add(effect);
            }
        });
    });
    /* hide modal effects */
    var modalDemo8 = document.getElementById("modaldemo8");
    if (modalDemo8) {
        modalDemo8.addEventListener('hidden.bs.modal', function (e) {
            let removeClass = this.classList.value.match(/(^|\s)effect-\S+/g);
            if (removeClass) {
                removeClass = removeClass[0].trim();
                this.classList.remove(removeClass);
            }
        });
    }
    // Animated modals
});
