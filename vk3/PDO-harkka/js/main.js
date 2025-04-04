'use strict';

// edit buttons ja modaali
const editButtons = document.querySelectorAll('.btn-edit')
const updateModal  = document.querySelector('#update-modal')

editButtons.forEach((button) => {
    button.addEventListener('click', async () => {
        const mediaId = button.dataset.media_id;
        console.log(`Klikattu edit btn w/ media id: ${mediaId}`);

        const response = await fetch(`./inc/update-form.php?media_id=${mediaId}`);
        // tyhjennetään
        const html = await response.text();
        updateModal.innerHTML = "";
        updateModal.insertAdjacentHTML('afterbegin', html);
        updateModal.showModal();
    })
})

// const deleteButtons = document.querySelectorAll('.btn-danger');
//
// deleteButtons.forEach((button)=> {
//     button.addEventListener('click', async () => {
//         const mediaId = button.dataset.media_id;
//         console.log(`Klikattu delete btn w/ media id: ${mediaId}`);
//
//
//     })})