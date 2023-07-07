$(document).ready(function() {
    let userEditButtons = document.querySelectorAll(".user-edit-button")
    let userEditModal = document.querySelector('#user-edit-modal')
    let closeModal = $("#user-edit-modal .close-modal")

    userEditButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault()
            console.log(e.target.dataset.userid)
            // $.ajax({
            //     type: 'POST',
            //     url: 'admin/edit',
            //
            // })
            userEditModal.showModal();
        })
    })

    closeModal.on('click', function() {
        userEditModal.close();
    })
})